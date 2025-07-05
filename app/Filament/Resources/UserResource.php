<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Customers'; // Changes sidebar name
    protected static ?string $navigationIcon = 'heroicon-o-users'; // Optional icon change

    // Change model labels (used in breadcrumbs, titles)
    public static function getModelLabel(): string
    {
        return 'Customer';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Customers';
    }

    // Disable creating new records
    public static function canCreate(): bool
    {
        return false;
    }
    // Disable creation

    // Disable editing
    public static function canEdit($record): bool
    {
        return false;
    }
    public static function canView($record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->where('user_type', 'customer')) // Filter customers
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Keep view
                Tables\Actions\DeleteAction::make(), // Keep delete
                // Remove EditAction::make()
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
            'index' => Pages\ListUsers::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
