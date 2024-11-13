<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTimeZone;
use Carbon\Traits\Date;
use DateTime;
use Carbon\CarbonTimeZone;

class Device extends Model
{

    use HasFactory;
    // Table Name
    protected $table = "devices";
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    //Soft delete
    use SoftDeletes;

    protected $fillable = ['mac_address'];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->BelongsTo('App\Models\User');
    }

    public function eventlog()
    {
        return $this->hasMany('App\Models\Eventlog');
    }
    // Function to Convert time to minutes
    public function hourToMinute($value)
    {
        $timer = explode(':', $value);
        $tim =  ($timer[0] * 60) + ($timer[1]);
        return $tim;
    }

    // Function to convert time to seconds
    public function hourToSeconds($value)
    {
        $timer = explode(':', $value);
        $tim =  ($timer[0] * 60 * 60) + ($timer[1] * 60) + ($timer[2]);
        return $tim;
    }

    // Accessor for c1counter
    public function getC1counterAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->toTimeString('second');
    }

    // Accessor for c2counter
    public function getC2counterAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->toTimeString('second');
    }

    // Accessor for c3counter
    public function getC3counterAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->toTimeString('second');
    }

    // Accessor for c1counter
    public function getC4counterAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->toTimeString('second');
    }

    // Mutator for c1counter
    public function setC1counterAttribute($value)
    {
        $this->attributes['c1counter'] = $this->hourToSeconds($value);
    }

    // Mutator for c2counter
    public function setC2counterAttribute($value)
    {
        $this->attributes['c2counter'] = $this->hourToSeconds($value);
    }

    // Mutator for c3counter
    public function setC3counterAttribute($value)
    {
        $this->attributes['c3counter'] = $this->hourToSeconds($value);
    }

    // Mutator for c4counter
    public function setC4counterAttribute($value)
    {
        $this->attributes['c4counter'] = $this->hourToSeconds($value);
    }

    // Accessor for Channel 1 schedule
    public function getC1monOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1monOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1tueOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1tueOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1wedOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1wedOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1thurOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1thurOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1friOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1friOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1satOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1satOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1sunOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC1sunOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }
    // End of Accessor for Channel 1 schedule

    //Begining of Channel 1 Schedule Mutator
    public function setC1monOnAttribute($value)
    {
        $this->attributes['c1Mon_On'] = $this->hourToMinute($value);
    }

    public function setC1monOffAttribute($value)
    {
        $this->attributes['c1Mon_Off'] = $this->hourToMinute($value);
    }

    public function setC1tueOnAttribute($value)
    {
        $this->attributes['c1Tue_On'] = $this->hourToMinute($value);
    }

    public function setC1tueOffAttribute($value)
    {
        $this->attributes['c1Tue_Off'] = $this->hourToMinute($value);
    }

    public function setC1wedOnAttribute($value)
    {
        $this->attributes['c1Wed_On'] = $this->hourToMinute($value);
    }

    public function setC1wedOffAttribute($value)
    {
        $this->attributes['c1Wed_Off'] = $this->hourToMinute($value);
    }

    public function setC1thurOnAttribute($value)
    {
        $this->attributes['c1Thur_On'] = $this->hourToMinute($value);
    }

    public function setC1thurOffAttribute($value)
    {
        $this->attributes['c1Thur_Off'] = $this->hourToMinute($value);
    }

    public function setC1friOnAttribute($value)
    {
        $this->attributes['c1Fri_On'] = $this->hourToMinute($value);
    }

    public function setC1friOffAttribute($value)
    {
        $this->attributes['c1Fri_Off'] = $this->hourToMinute($value);
    }

    public function setC1satOnAttribute($value)
    {
        $this->attributes['c1Sat_On'] = $this->hourToMinute($value);
    }

    public function setC1satOffAttribute($value)
    {
        $this->attributes['c1Sat_Off'] = $this->hourToMinute($value);
    }

    public function setC1sunOnAttribute($value)
    {
        $this->attributes['c1Sun_On'] = $this->hourToMinute($value);
    }

    public function setC1sunOffAttribute($value)
    {
        $this->attributes['c1Sun_Off'] = $this->hourToMinute($value);
    }
    //End of Channel 1 Schedule Mutator

    // Accessor for Channel 2 schedule
    public function getC2monOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2monOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2tueOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2tueOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2wedOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2wedOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2thurOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2thurOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2friOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2friOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2satOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2satOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2sunOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC2sunOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }
    // End of Accessor for Channel 2 schedule

    //Begining of Channel 2 Schedule Mutator
    public function setC2monOnAttribute($value)
    {
        $this->attributes['c2Mon_On'] = $this->hourToMinute($value);
    }

    public function setC2monOffAttribute($value)
    {
        $this->attributes['c2Mon_Off'] = $this->hourToMinute($value);
    }

    public function setC2tueOnAttribute($value)
    {
        $this->attributes['c2Tue_On'] = $this->hourToMinute($value);
    }

    public function setC2tueOffAttribute($value)
    {
        $this->attributes['c2Tue_Off'] = $this->hourToMinute($value);
    }

    public function setC2wedOnAttribute($value)
    {
        $this->attributes['c2Wed_On'] = $this->hourToMinute($value);
    }

    public function setC2wedOffAttribute($value)
    {
        $this->attributes['c2Wed_Off'] = $this->hourToMinute($value);
    }

    public function setC2thurOnAttribute($value)
    {
        $this->attributes['c2Thur_On'] = $this->hourToMinute($value);
    }

    public function setC2thurOffAttribute($value)
    {
        $this->attributes['c2Thur_Off'] = $this->hourToMinute($value);
    }

    public function setC2friOnAttribute($value)
    {
        $this->attributes['c2Fri_On'] = $this->hourToMinute($value);
    }

    public function setC2friOffAttribute($value)
    {
        $this->attributes['c2Fri_Off'] = $this->hourToMinute($value);
    }

    public function setC2satOnAttribute($value)
    {
        $this->attributes['c2Sat_On'] = $this->hourToMinute($value);
    }

    public function setC2satOffAttribute($value)
    {
        $this->attributes['c2Sat_Off'] = $this->hourToMinute($value);
    }

    public function setC2sunOnAttribute($value)
    {
        $this->attributes['c2Sun_On'] = $this->hourToMinute($value);
    }

    public function setC2sunOffAttribute($value)
    {
        $this->attributes['c2Sun_Off'] = $this->hourToMinute($value);
    }
    //End of Channel 2 Schedule Mutator

    // Accessor for Channel 3 schedule
    public function getC3monOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3monOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3tueOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3tueOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3wedOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3wedOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3thurOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3thurOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3friOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3friOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3satOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3satOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3sunOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC3sunOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }
    // End of Accessor for Channel 3 schedule

    //Begining of Channel 3 Schedule Mutator
    public function setC3monOnAttribute($value)
    {
        $this->attributes['c3Mon_On'] = $this->hourToMinute($value);
    }

    public function setC3monOffAttribute($value)
    {
        $this->attributes['c3Mon_Off'] = $this->hourToMinute($value);
    }

    public function setC3tueOnAttribute($value)
    {
        $this->attributes['c3Tue_On'] = $this->hourToMinute($value);
    }

    public function setC3tueOffAttribute($value)
    {
        $this->attributes['c3Tue_Off'] = $this->hourToMinute($value);
    }

    public function setC3wedOnAttribute($value)
    {
        $this->attributes['c3Wed_On'] = $this->hourToMinute($value);
    }

    public function setC3wedOffAttribute($value)
    {
        $this->attributes['c3Wed_Off'] = $this->hourToMinute($value);
    }

    public function setC3thurOnAttribute($value)
    {
        $this->attributes['c3Thur_On'] = $this->hourToMinute($value);
    }

    public function setC3thurOffAttribute($value)
    {
        $this->attributes['c3Thur_Off'] = $this->hourToMinute($value);
    }

    public function setC3friOnAttribute($value)
    {
        $this->attributes['c3Fri_On'] = $this->hourToMinute($value);
    }

    public function setC3friOffAttribute($value)
    {
        $this->attributes['c3Fri_Off'] = $this->hourToMinute($value);
    }

    public function setC3satOnAttribute($value)
    {
        $this->attributes['c3Sat_On'] = $this->hourToMinute($value);
    }

    public function setC3satOffAttribute($value)
    {
        $this->attributes['c3Sat_Off'] = $this->hourToMinute($value);
    }

    public function setC3sunOnAttribute($value)
    {
        $this->attributes['c3Sun_On'] = $this->hourToMinute($value);
    }

    public function setC3sunOffAttribute($value)
    {
        $this->attributes['c3Sun_Off'] = $this->hourToMinute($value);
    }
    //End of Channel 3 Schedule Mutator

    // Accessor for Channel 4 schedule
    public function getC4monOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4monOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4tueOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4tueOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4wedOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4wedOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4thurOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4thurOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4friOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4friOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4satOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4satOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4sunOnAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }

    public function getC4sunOffAttribute($value)
    {
        return Carbon::createFromTimestamp($value * 60)->toTimeString('minute');
    }
    // End of Accessor for Channel 4 schedule

    //Begining of Channel 4 Schedule Mutator
    public function setC4monOnAttribute($value)
    {
        $this->attributes['c4Mon_On'] = $this->hourToMinute($value);
    }

    public function setC4monOffAttribute($value)
    {
        $this->attributes['c4Mon_Off'] = $this->hourToMinute($value);
    }

    public function setC4tueOnAttribute($value)
    {
        $this->attributes['c4Tue_On'] = $this->hourToMinute($value);
    }

    public function setC4tueOffAttribute($value)
    {
        $this->attributes['c4Tue_Off'] = $this->hourToMinute($value);
    }

    public function setC4wedOnAttribute($value)
    {
        $this->attributes['c4Wed_On'] = $this->hourToMinute($value);
    }

    public function setC4wedOffAttribute($value)
    {
        $this->attributes['c4Wed_Off'] = $this->hourToMinute($value);
    }

    public function setC4thurOnAttribute($value)
    {
        $this->attributes['c4Thur_On'] = $this->hourToMinute($value);
    }

    public function setC4thurOffAttribute($value)
    {
        $this->attributes['c4Thur_Off'] = $this->hourToMinute($value);
    }

    public function setC4friOnAttribute($value)
    {
        $this->attributes['c4Fri_On'] = $this->hourToMinute($value);
    }

    public function setC4friOffAttribute($value)
    {
        $this->attributes['c4Fri_Off'] = $this->hourToMinute($value);
    }

    public function setC4satOnAttribute($value)
    {
        $this->attributes['c4Sat_On'] = $this->hourToMinute($value);
    }

    public function setC4satOffAttribute($value)
    {
        $this->attributes['c4Sat_Off'] = $this->hourToMinute($value);
    }

    public function setC4sunOnAttribute($value)
    {
        $this->attributes['c4Sun_On'] = $this->hourToMinute($value);
    }

    public function setC4sunOffAttribute($value)
    {
        $this->attributes['c4Sun_Off'] = $this->hourToMinute($value);
    }
    //End of Channel 4 Schedule Mutator
}
