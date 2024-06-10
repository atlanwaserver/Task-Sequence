<?php

namespace App\Filament\Resources\WeldGun1Resource\Pages;

use App\Filament\Resources\WeldGun1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWeldGun1 extends ViewRecord
{
    protected static string $resource = WeldGun1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
