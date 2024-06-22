<?php

namespace App\Filament\Resources\ChartResource\Pages;

use App\Filament\Resources\ChartResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChart extends CreateRecord
{
    protected static string $resource = ChartResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return route('custom-view');
    }
}
