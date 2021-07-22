<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;

class Schedule extends Model
{
    use HasFactory;
    // Table Name
    protected $table = "schedules";
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function schedules()
    {
        $this->belongsTo('App\Models\Device');
    }

}
