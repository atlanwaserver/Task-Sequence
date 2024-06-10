<?php

namespace App\Filament\Resources\WeldGun1Resource\Widgets;

use Filament\Widgets\Widget;

class Weldgun1Overview extends Widget
{
    protected int | string | array $columnSpan = 'full';
    protected static string $view = 'filament.resources.weld-gun1-resource.widgets.weldgun1-overview';

    public function getData(): array
    {
        return [
            'id'           => 110816104007,
            'name'         => "Arun. AD",
            'shift_no'     => 1,
            'in_time'      => "09:00 Am",
            'time_delay'   => "00",
            'program_no'   => 11,
            'cycle'        => 2,
            'angle'        => 90,
            'weld_current' => 1,
            'spot_count'   => 11,
            'job'          => 1,
            'weld_count'   => 1,
            'force'        => 90,
        ];
    }
}
