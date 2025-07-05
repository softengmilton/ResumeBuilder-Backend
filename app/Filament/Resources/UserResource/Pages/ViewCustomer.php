<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\ActionSize;

class ViewCustomer extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Delete Customer')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation()
                ->modalHeading('Delete Customer')
                ->modalDescription('Are you sure you want to delete this customer? This action cannot be undone.')
                ->modalSubmitActionLabel('Yes, delete')
                ->successNotificationTitle('Customer deleted')
                ->size(ActionSize::Small)
                ->hidden(fn(User $record): bool => $record->trashed()),
        ];
    }

    // protected function getFormActions(): array
    // {
    //     return [
    //         Action::make('back')
    //             ->label('Back to all customers')
    //             ->icon('heroicon-o-arrow-left')
    //             ->url($this->getResource()::getUrl('index'))
    //             ->color('gray')
    //             ->size(ActionSize::Small),
    //     ];
    // }

    // protected function getRelationManagers(): array
    // {
    //     return []; // Remove relation managers if not needed
    // }

    protected function configureAction(Action $action): void
    {
        $action->disabled(); // Disable all inline edit actions
    }
}
