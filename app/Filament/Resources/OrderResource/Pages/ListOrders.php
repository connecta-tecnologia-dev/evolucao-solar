<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Resources\Components\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Orders'),
            'new' => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('status', 'new')),
            'processing' => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('status', 'processing')),
            'paid' => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('payment_status', 'paid')),
            'delivered' => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('status', 'delivered')),
            'cancelled' => Tab::make()->modifyQueryUsing(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
