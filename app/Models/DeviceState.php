<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;

class DeviceState extends Model
{
    use HasFactory;
    // Table Name
    protected $table = "device_states";
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function device_states()
    {
        $this->belongsTo('App\Models\Device');
    }

}
