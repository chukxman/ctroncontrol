<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'device_name' => 'ctron device',
            'device_serialnumber' => 'CTR000001',
            'organization_name' => 'christek',
            'location' => 'ctron location',
            'mac_address' => '12321231dsswddd',
        ];
    }
}
