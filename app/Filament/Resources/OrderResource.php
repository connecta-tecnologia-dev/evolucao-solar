<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Set;
use Filament\Forms\Get;
use App\Models\Product;
use Illuminate\Support\Str;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Support\Number;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'her

    oicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                       Select::make('user_id')
                       ->label('Customer')
                       ->relationship('user', 'name')
                       ->searchable()
                       ->required(),

                       ToggleButtons::make('payment_method')
                       ->inline()
                       ->default('pix')
                       ->options([
                           'cash' => 'Dinheiro',
                           'card' => 'Cartão',
                           'pix' => 'PIX',
                           'bill' => 'Boleto',
                           'paypal' => 'PayPal',
                       ])
                       ->required()
                       ->icons([
                           'cash' => 'heroicon-m-banknotes',
                           'card' => 'heroicon-m-credit-card',
                           'pix' => 'heroicon-m-qr-code',
                           'bill' => 'heroicon-m-document-text',
                           'paypal' => 'heroicon-m-currency-dollar',
                       ])
                       ->grouped()
                       ->label('Forma de Pagamento'),

                       ToggleButtons::make('payment_status')
                       ->inline()
                       ->default('pending')
                       ->options([
                           'pending' => 'Pendente',
                           'paid' => 'Pago',
                           'failed' => 'Falha',
                       ])
                       ->required()
                       ->icons([
                           'pending' => 'heroicon-m-clock',
                           'paid' => 'heroicon-m-check-circle',
                           'failed' => 'heroicon-m-x-circle',
                       ])
                       ->colors([
                           'pending' => 'warning',
                           'paid' => 'success',
                           'failed' => 'danger',
                       ])
                       ->grouped()
                       ->label('Status do Pagamento'),

                      ToggleButtons::make('status')
                      ->inline()
                      ->default('new')
                      ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                      ])
                      ->required()
                      ->icons([
                        'new' => 'heroicon-m-sparkles',
                        'processing' => 'heroicon-m-document-text',
                        'shipped' => 'heroicon-m-truck',
                        'delivered' => 'heroicon-m-document-text',
                        'cancelled' => 'heroicon-m-x-mark',
                      ])
                      ->colors([
                        'new' => 'success',
                        'processing' => 'warning',
                        'shipped' => 'info',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                      ])
                      ->inlineLabel(false),

                      Select::make('shipping_method')
                      ->options([
                        'sedex' => 'Sedex',
                        'express' => 'Express',
                        'correios' => 'Correios',
                      ])
                      ->required()
                      ->inlineLabel(false),

                      TextArea::make('notes')
                      ->columnSpanFull()
                    ])->columns(2),

                    Section::make('Order Items')->schema([
                      Repeater::make('items')
                      ->relationship('items')
                      ->schema([

                        Select::make('product_id')
                        ->relationship('product','name')
                        ->searchable()
                        ->distinct()
                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                        ->columnSpan(4)
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            $price = Product::query()->whereKey($state)->value('price') ?? 0;
                            $set('unit_amount', $price);
                            $qty = (int) ($get('quantity') ?? 1);
                            $set('total_amount', $qty * $price);
                        })
                        ->required(),

                        TextInput::make('quantity')
                        ->numeric()
                        ->required()
                        ->default(1)
                        ->minValue(1)
                        ->columnSpan(2)
                        ->reactive()
                        ->afterStateUpdated(fn ($state, Set $set, Get $get) => $set('total_amount', $state * $get('unit_amount'))),

                        TextInput::make('unit_amount')
                        ->numeric()
                        ->required()
                        ->disabled()
                        ->dehydrated(false)
                        ->columnSpan(2),

                        TextInput::make('total_amount')
                        ->numeric()
                        ->required()
                        ->dehydrated(false)
                        ->columnSpan(3),
                      ])->columns(12),

                      Placeholder::make('grand_total_placeholder')
                      ->label('Grand Total')
                      ->content(function (Get$get, Set $set){
                        $total = 0;
                        if (!$repeaters = $get('items')) {
                          return $total;
                        }
                        foreach ($repeaters as $key => $repeater) {
                            $total += $get("items.{$key}.total_amount");
                        }
                        $set('grand_total', $total);
                         return Number::currency($total, 'BRL');
                      }),

                      Hidden::make('grand_total')
                      ->default(0),

                      
                    ])
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->sortable()
                ->searchable()
                ->label('Customer'),

                TextColumn::make('grand_total')
                ->sortable()
                ->searchable()
                ->money('BRL')
                ->label('Grand Total'),

                TextColumn::make('payment_method')
                ->sortable()
                ->searchable()
                ->label('Payment Method'),

                TextColumn::make('payment_status')
                ->sortable()
                ->searchable()
                ->label('Payment Status'),

                TextColumn::make('shipping_method')
                ->sortable()
                ->searchable()
                ->label('Shipping Method'),

                SelectColumn::make('status')
                ->options([
                    'new' => 'New',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled',
                ])
                ->searchable()
                ->sortable()
                ->label('Status'),

                TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable()
                ->searchable()
                ->label('Created At'),

                TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable()
                ->searchable()
                ->label('Updated At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }    
    
    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'sucess' : 'success';
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
