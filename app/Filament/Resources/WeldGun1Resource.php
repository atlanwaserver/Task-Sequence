<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeldGun1Resource\Pages;
use App\Filament\Resources\WeldGun1Resource\RelationManagers;
use App\Models\WeldGun1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeldGun1Resource extends Resource
{
    protected static ?string $model = WeldGun1::class;

    protected static ?string $pluralModelLabel = 'Weld Gun 1';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pulse')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cycle')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('current_value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('angle')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pulse')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cycle')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_value')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('angle')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListWeldGun1s::route('/'),
            'create' => Pages\CreateWeldGun1::route('/create'),
            'view' => Pages\ViewWeldGun1::route('/{record}'),
            'edit' => Pages\EditWeldGun1::route('/{record}/edit'),
        ];
    }
}
