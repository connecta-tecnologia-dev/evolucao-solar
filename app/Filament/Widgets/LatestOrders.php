<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Filament\Resources\OrderResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class LatestOrders extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                OrderResource::getEloquentQuery()
            )
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                ->searchable()
                ->label('Order ID'),

                TextColumn::make('user.name')
                ->label('Customer')
                ->searchable(),

                TextColumn::make('grand_total')
                ->money('BRL')
                ->sortable(),

                TextColumn::make('status')
                ->badge()
                ->color(fn ($state): string => match ($state) {
                    'new' => 'info',
                    'processing' => 'primary',
                    'shipped' => 'success',
                    'delivered' => 'success',
                    'cancelled' => 'danger',
                })
                ->icon(fn ($state): string => match ($state) {
                    'new' => 'heroicon-o-sparkles',
                    'processing' => 'heroicon-o-arrow-path',
                    'shipped' => 'heroicon-o-truck',
                    'delivered' => 'heroicon-o-check-circle',
                    'cancelled' => 'heroicon-o-x-circle',
                })
                ->sortable(),

                TextColumn::make('payment_method')
                ->searchable()
                ->sortable(),

                TextColumn::make('payment_status')
                ->searchable()
                ->badge()
                ->sortable(),

                TextColumn::make('created_at')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->searchable(),
            ])
            
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (\App\Models\Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye')
                    ->color('info'),
            ]);
    }
}
