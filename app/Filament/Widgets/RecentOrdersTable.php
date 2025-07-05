<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Transaction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentOrdersTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Transaction::query()
            ->with(['user'])
            ->latest()
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label('Order ID'),
            Tables\Columns\TextColumn::make('customer.name')
                ->label('Customer'),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'pending' => 'warning',
                    'processing' => 'info',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                }),
            Tables\Columns\TextColumn::make('amount')
                ->money('USD'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->url(fn(Transaction $record): string => route('filament.admin.resources.transactions.index', $record)),
        ];
    }
}
