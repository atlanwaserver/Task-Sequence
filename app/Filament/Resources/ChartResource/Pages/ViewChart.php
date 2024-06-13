<?php

namespace App\Filament\Resources\ChartResource\Pages;

use App\Filament\Resources\ChartResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChart extends ViewRecord
{
    protected static string $resource = ChartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
