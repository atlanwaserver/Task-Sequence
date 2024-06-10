<?php

namespace App\Filament\Resources\WeldGun1Resource\Pages;

use App\Filament\Resources\WeldGun1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeldGun1 extends EditRecord
{
    protected static string $resource = WeldGun1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
