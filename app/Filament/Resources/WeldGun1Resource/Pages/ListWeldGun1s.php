<?php

namespace App\Filament\Resources\WeldGun1Resource\Pages;

use App\Filament\Resources\WeldGun1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListWeldGun1s extends ListRecords
{
    protected static string $resource = WeldGun1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make() 
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename(fn ($resource) => $resource::getModelLabel() . '-' . date('Y-m-d'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::CSV)
                ]),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            WeldGun1Resource\Widgets\Weldgun1Overview::class,
        ];
    }
}
