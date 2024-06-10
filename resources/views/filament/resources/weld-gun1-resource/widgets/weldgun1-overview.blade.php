<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <h2 class="text-xl font-bold mb-4">Personal Details</h2>

            <div class="space-y-2">
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <span class="text-gray-700 font-bold">ID Number&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['id'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold">Shift No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['shift_no'] }}</span>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="flex items-center">
                        <span class="text-gray-700 font-bold w-24 inline-block">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>
                        <span> {{ $this->getData()['name'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold w-24 inline-block">In Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>
                        <span> {{ $this->getData()['in_time'] }}</span>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="flex items-center">
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold w-24 inline-block">Time Delay&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>
                        <span> {{ $this->getData()['time_delay'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-4"></h2>
            <h2 class="text-xl font-bold mb-4">Weld Gun 1</h2>

            <div class="space-y-2">
                <div class="flex justify-between">
                    <div class="flex items-center" style="width: 33%;">
                        <span class="text-gray-700 font-bold">Program No&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['program_no'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold">Weld Current&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['weld_current'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold">Weld Count&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['weld_count'] }}</span>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-center" style="width: 33%;">
                        <span class="text-gray-700 font-bold">Cycle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>
                        <span>{{ $this->getData()['cycle'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold">Spot Count&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['spot_count'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 30%;">
                        <span class="text-gray-700 font-bold">Job&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['job'] }}</span>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <span class="text-gray-700 font-bold">Angle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>
                        <span>{{ $this->getData()['angle'] }}</span>
                    </div>
                    <div class="flex items-center" style="width: 63.5%;">
                        <span class="text-gray-700 font-bold">Force&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</span>
                        <span>{{ $this->getData()['force'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
