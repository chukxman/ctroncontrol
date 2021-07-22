<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Device extends Model
{
    use HasFactory;
    // Table Name
    protected $table = "devices";
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function devices()
    {
        return $this->BelongsTo('App\Models\User');

    }
}
