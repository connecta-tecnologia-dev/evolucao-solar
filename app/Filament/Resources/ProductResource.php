<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Actions\ActionGroup;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        Forms\Components\TextInput::make('name')
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                        ->required(),

                        Forms\Components\TextInput::make('slug')
                        ->maxLength(255)
                        ->required()
                        ->disabled()
                        ->dehydrated()
                        ->unique(Product::class,'slug',ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('description')
                        ->columnSpan('full')
                        ->fileAttachmentsDirectory('products')
                        ->required(),
                    ])->columnSpan(2),

                    Section::make('Product Images')->schema([
                        Forms\Components\FileUpload::make('image')->image()
                        ->multiple()
                        ->maxFiles(5)
                        ->directory('products')
                        ->reorderable()
                        // ->required(),
                    ])->columnSpan(2),

                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Price')->schema([
                        Forms\Components\TextInput::make('price')
                        ->inputMode('decimal')
                        ->prefix('R$')
                        ->required()
                        ->rule('regex:/^\d{1,3}(\.\d{3})*(,\d{1,2})?$|^\d+(,\d{1,2})?$|^\d+(\.\d{1,2})?$/')
                        ->dehydrateStateUsing(fn ($state) => $state === null ? null : str_replace(['.', ','], ['', '.'], $state))
                        ->rule(function () {
                            return function (string $attribute, $value, \Closure $fail) {
                                if ($value === null || $value === '') return;
                                $normalized = (float) str_replace(['.', ','], ['', '.'], $value);
                                if ($normalized < 0.01) {
                                    $fail('The price must be at least 0,01.');
                                }
                            };
                        }),
                    ])->columnSpan(1),

                    Section::make('Assosiation')->schema([
                        Forms\Components\Select::make('category_id')
                        ->relationship('category', 'name')
                        ->preload()
                        ->searchable()
                        ->required(),
                        
                        Forms\Components\Select::make('brand_id')
                        ->relationship('brand', 'name')
                        ->preload()
                        ->searchable()
                        ->required(),

                    ]),

                    Section::make('Status')->schema([
                        Forms\Components\TextInput::make('stock')
                        ->numeric()
                        ->minValue(0)
                        ->required(),

                        Forms\Components\Toggle::make('in_stock')
                        ->default(true)
                        ->required(),

                        Forms\Components\Toggle::make('is_active')
                        ->default(true)
                        ->required(),

                        Forms\Components\Toggle::make('is_featured')
                        ->required(),

                        Forms\Components\Toggle::make('on_sale')
                        ->required(),
                    ])
                    
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                
                Tables\Columns\TextColumn::make('category.name', 'category.name')
                ->sortable()
                ->searchable(),
                
                Tables\Columns\TextColumn::make('brand.name', 'brand.name')
                ->sortable()
                ->searchable(),

                Tables\Columns\TextColumn::make('price')
                ->money('BRL')
                ->sortable(),

                Tables\Columns\IconColumn::make('in_stock')
                ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                ->boolean(),
                
                Tables\Columns\IconColumn::make('is_featured')
                ->boolean(),
                
                Tables\Columns\IconColumn::make('on_sale')
                ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),

                Tables\Filters\SelectFilter::make('brand')
                    ->relationship('brand', 'name'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
