<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventlog extends Model
{
    use HasFactory;
    public $json;

    protected $casts = [
        'datalog' => 'object'
    ];

    public function device()
    {
        return $this->BelongsTo('App\Models\Device');
    }

    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }

    // public function getDatalogAttribute($value)
    // {
    //     return json_decode($value, true);
    // }
}
