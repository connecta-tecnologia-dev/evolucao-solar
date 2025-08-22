<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Set;
use Filament\Forms\Get;
use App\Models\Product;
use Illuminate\Support\Str;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;   
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

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
                       ->preload()
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

                       ToggleButtons::make('Payment_status')
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

                      ToggleButtons::make('Status')
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
                        ->afterStateUpdated(fn ($state, Set $set) => $set('unit_amount', Product::find($state)?->price??0))
                        ->afterStateUpdated(fn ($state, Set $set) => $set('total_amount', Product::find($state)?->price??0))
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
                        ->columnSpan(2)
                        ->dehydrated()
                        ->disabled(),

                        TextInput::make('total_amount')
                        ->numeric()
                        ->required()
                        ->dehydrated()
                        ->columnSpan(3),
                      ])->columns(12)
                    ])
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                ->label('Customer'),

                TextColumn::make('payment_method')
                ->label('Payment Method'),

                TextColumn::make('Payment_status')
                ->label('Payment Status'),

                TextColumn::make('Status')
                ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
