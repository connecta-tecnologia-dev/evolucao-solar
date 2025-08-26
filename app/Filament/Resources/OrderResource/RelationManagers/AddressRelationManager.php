<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('last_name')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(12)
                    ->required(),
                TextInput::make('state')
                    ->maxLength(2)
                    ->required(),
                TextInput::make('city')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('zip_code')
                    ->maxLength(20)
                    ->numeric()
                    ->required(),
                Textarea::make('street_address')
                    ->maxLength(99)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('fullname')
                    ->label('Full Name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('state')
                    ->label('State')
                    ->searchable(),
                TextColumn::make('city')
                    ->label('City')
                    ->searchable(),
                TextColumn::make('zip_code')
                    ->label('Zip Code')
                    ->searchable(),
                TextColumn::make('street_address')
                    ->label('Street Address')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
