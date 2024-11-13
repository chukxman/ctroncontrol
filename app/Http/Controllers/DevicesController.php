<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Eventlog;
use Illuminate\Support\Facades\Input;
use App\Mail\AppEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use SplTempFileObject;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('issiteengineer')->only(['edit'], ['UpdateDevice'], ['destroy']);
    }

    public function index()
    {
        if (Auth::user()->role_id == "2") {
            $device = Device::where('user_id', Auth::user()->id)->paginate(10);
        } elseif (Auth::user()->role_id == 3) {
            $device = Device::where([['engineer_id', Auth::user()->id], ['user_id', Auth::user()->parent_id]])->orderBy('id', 'asc')->paginate(10);
        }
        return view('user.index')->with('devices', $device);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Device $device)
    {
        // if ($request->user()->can('view', $device)) {
        $device =  Device::find($id);
        
        if($device->device_type == "sms")
        {
            return view('user.showdevice')->with('devices', $device);
        }
        else {
            return view('user.show')->with('devices', $device);
        }
        
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $device = Device::find($id);
        if($device->device_type == "sms")
        {
            return view('user.editdevice')->with('devices', $device);
        }
        else{
            return view('user.edit')->with('devices', $device);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update device
        $device = Device::find($id);
        $device->device_name = 'ctron device';
        $device->organization_name = 'ctron';
        $device->location = 'ctron location';
        $device->user_id = '0';
        $device->engineer_id = '0';
        $device->save();

        return redirect()->route('user.index')->with('success', 'Device Deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, Eventlog $eventlog)
    {
        $device = Device::find($id);
        $device->device_name = 'ctron device';
        $device->organization_name = 'ctron';
        $device->location = 'ctron location';
        $device->user_id = '0';
        $device->engineer_id = '0';
        $device->newUpdateDetails = '1';
        $device->save();

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ('Device Deleted');
        $eventlog->save();


        return redirect()->route('deletelist')->with('success', 'Device Deleted');
    }

    public function updateChannel1State(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->channel1state = (int) $request->has('channel1state') ? 1 : 0;
        $device->channel1controlsource = 2;
        $device->lastchannel1state = Carbon::now();
        $device->channel1statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;
        $device->save();

        
        
        if($device->device_type == "sms")
        {
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $device_state = $device->channel1state == 1 ? "on" : "off";
            $message = $rand." D1 ".$device_state." *".$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $device->save();
        }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel1) . ' turned ' . ($device->channel1state == 1 ? 'on' : 'off');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel1 State Updated ');
    }

    public function updateChannel2State(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->channel2state = (int) $request->has('channel2state') ? 1 : 0;
        $device->channel2controlsource = 2;
        $device->lastchannel2state = Carbon::now();
        $device->channel2statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;
        $device->save();

        if($device->device_type == "sms")
        {
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $device_state = $device->channel2state == 1 ? "on" : "off";
            $message = $rand." D2 ".$device_state." *" .$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $device->save();
        }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel2) . ' turned ' . ($device->channel2state == 1 ? 'on' : 'off');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel2 State Updated');
    }

    public function updateChannel3State(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->channel3state = (int) $request->has('channel3state') ? 1 : 0;
        $device->channel3controlsource = 2;
        $device->lastchannel3state = Carbon::now();
        $device->channel3statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;
        $device->save();

        if($device->device_type == "sms")
        {
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $device_state = $device->channel3state == 1 ? "on" : "off";
            $message = $rand." D3 ".$device_state." *" .$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $device->save();
        }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel3) . ' turned ' . ($device->channel3state == 1 ? 'on' : 'off');
        $eventlog->save();


        return redirect()->route('user.show', $device->id)->with('success', 'Channel3 State Updated');
    }

    public function updateChannel4State(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->channel4state = (int) $request->has('channel4state') ? 1 : 0;
        $device->channel4controlsource = 2;
        $device->lastchannel4state = Carbon::now();
        $device->channel4statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;
        $device->save();

        if($device->device_type == "sms")
        {
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $device_state = $device->channel4state == 1 ? "on" : "off";
            $message = $rand." D4 ".$device_state." *" .$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $device->save();
        }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel4) . ' turned ' . ($device->channel4state == 1 ? 'on' : 'off');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel4 State Updated');
    }

    //Update counter
    public function updateChannel1Counter(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->c1counter = $request->input('c1counter');
        $device->channel1controlsource = 2;
        $device->lastchannel1state = Carbon::now();
        $device->channel1statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;

        // counter variable

        $device->channel1state = $request->input('c1counter_setting');
        $counter_time = $device->c1counter;
        $timer = explode(':', $counter_time);
        $hour = (int)$timer[0];
        $minutes = (int)$timer[1];
        $seconds = (int)$timer[2];

        

        // Sending sms
        if($device->device_type == "sms")
        {        
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $device_state = $device->channel1state == 1 ? "on" : "off";
            $message = ($rand. " D1 ".$device_state ." ". $hour."H ". $minutes."M ".$seconds."S *".$device->devicekey);
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $device->save();
        }

        $device->save();

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel1) . ' Counter ' . ($device->channel1state == 1 ? 'on' : 'off'.' for '. $hour.'H '. $minutes.'M '.$seconds.'S');
        $eventlog->save();


        return redirect()->route('user.show', $device->id)->with('success', 'Channel1 Counter Set');
    }

    public function updateChannel2Counter(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->c2counter = $request->input('c2counter');
        $device->channel2controlsource = 2;
        $device->lastchannel2state = Carbon::now();
        $device->channel2statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;

        // Sms variables
        $device->channel2State = $request->input('c2counter_setting');
        $counter_time = $device->c2counter;
        $timer = explode(':', $counter_time);
        $hour = (int)$timer[0];
        $minutes = (int)$timer[1];
        $seconds = (int)$timer[2];


         // Sending sms
         if($device->device_type == "sms")
         {
            
             $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
 
             $device_state = $device->channel2state == 1 ? "on" : "off";
             $message = ($rand." D2 ".$device_state ." ". $hour."H ". $minutes."M ".$seconds."S *".$device->devicekey);
             $smsresponse = $this->sendsms($id,$message);
             $device->sms = $message;
             $device->save();
         }


        $device->save();

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel2) . ' Counter ' . ($device->channel2state == 1 ? 'on' : 'off'.' for '. $hour.'H '. $minutes.'M '.$seconds.'S');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel2 Counter Set');
    }

    public function updateChannel3Counter(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->c3counter = $request->input('c3counter');
        $device->channel3controlsource = 2;
        $device->lastchannel3state = Carbon::now();
        $device->channel3statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;

        // sms variables
        $device->channel3State = $request->input('c3counter_setting');
             $counter_time = $device->c3counter;
             $timer = explode(':', $counter_time);
             $hour = (int)$timer[0];
             $minutes = (int)$timer[1];
             $seconds = (int)$timer[2];

         // Sending sms
         if($device->device_type == "sms")
         {
             
             $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
 
             $device_state = $device->channel3state == 1 ? "on" : "off";
             $message = ($rand." D3 ".$device_state ." ". $hour."H ". $minutes."M ".$seconds."S *".$device->devicekey);
             $smsresponse = $this->sendsms($id,$message);
             $device->sms = $message;
             $device->save();
         }


        $device->save();

        // Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel3) . ' Counter ' . ($device->channel3state == 1 ? 'on' : 'off'.' for '. $hour.'H '. $minutes.'M '.$seconds.'S');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel3 Counter Set');
    }

    public function updateChannel4Counter(Request $request, $id, Eventlog $eventlog)
    {
        $device = Device::findOrFail($id);
        $device->c4counter = $request->input('c4counter');
        $device->channel4controlsource = 2;
        $device->lastchannel4state = Carbon::now();
        $device->channel4statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->activatedevice = 1;

        // Sms Variable
        $device->channel4State = $request->input('c4counter_setting');
             $counter_time = $device->c4counter;
             $timer = explode(':', $counter_time);
             $hour = (int)$timer[0];
             $minutes = (int)$timer[1];
             $seconds = (int)$timer[2];

         // Sending sms
         if($device->device_type == "sms")
         {
             
             $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
 
             $device_state = $device->channel4state == 1 ? "on" : "off";
             $message = ($rand." D4 ".$device_state ." ". $hour."H ". $minutes."M ".$seconds."S *".$device->devicekey);

             $smsresponse = $this->sendsms($id,$message);
             $device->sms = $message;
            $device->save();
         }


        $device->save();

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ($device->channel4) . ' Counter ' . ($device->channel4state == 1 ? 'on' : 'off'.' for '. $hour.'H '. $minutes.'M '.$seconds.'S');
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel4 Counter Set');
    }

    //Update schedule
    public function updateChannel1Schedule(request $request, $id, Eventlog $eventlog)
    {
        // Channel 1
        $message = "";
        $device = Device::find($id);
        if($device->device_type !== "sms")
        {
            $device->c1Mon_On = $request->input('c1Mon_On');
            // $device->c1Mon_Off = $request->input('c1Mon_Off');
            $device->c1Tue_On = $request->input('c1Tue_On');
            $device->c1Tue_Off = $request->input('c1Tue_Off');
            $device->c1Wed_On = $request->input('c1Wed_On');
            $device->c1Wed_Off = $request->input('c1Wed_Off');
            $device->c1Thur_On = $request->input('c1Thur_On');
            $device->c1Thur_Off = $request->input('c1Thur_Off');
            $device->c1Fri_On = $request->input('c1Fri_On');
            $device->c1Fri_Off = $request->input('c1Fri_Off');
            $device->c1Sat_On = $request->input('c1Sat_On');
            $device->c1Sat_Off = $request->input('c1Sat_Off');
            $device->c1Sun_On = $request->input('c1Sun_On');
            $device->c1Sun_Off = $request->input('c1Sun_Off');
            $device->newRequestC1 = $request->input('newRequestC1');
            $device->lastchannel1schedule = Carbon::now();
            $device->channel1schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;

            $eventlog->datalog = $device->channel1." Schedule set";

            $device->save();
        }elseif($device->device_type == "sms")
        {
            $switch = $request->input('schedule_setting');
            $time = $request->input('schedule_time');
            $mon = "";
            $tue = "";
            $wed = "";
            $thur = "";
            $fri = "";
            $sat = "";
            $sun = "";

            
            if($switch == 1)
            {
                if($request->has('monday'))
                {
                    $device->c1Mon_On = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c1Tue_On = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c1Wed_On = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c1Thur_On = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c1Fri_On = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c1Sat_On = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c1Sun_On = $time;
                    $sun = "su";
                }
                $power = "On";
                
            }
            else{
                if($request->has('monday'))
                {
                    $device->c1Mon_Off = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c1Tue_Off = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c1Wed_Off = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c1Thur_Off = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c1Fri_Off = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c1Sat_Off = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c1Sun_Off = $time;
                    $sun = "su";
                }
                $power = "Off";
                
            }
            
            $device->newRequestC1 = $request->input('newRequestC1');
            $device->lastchannel1schedule = Carbon::now();
            $device->channel1schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);


           
            // sms code
            $message = $rand. " Prog ". $power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun." *".$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            
            $device->save();
            $eventlog->datalog = $device->channel1." Schedule set to ".$power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun ;
            
        }
        

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', $device->channel1 . ' Schedule Updated');
        
    }
    

    public function updateChannel2Schedule(Request $request, $id, Eventlog $eventlog)
    {
        // Channel 1
        $message = "";
        $device = Device::find($id);
        if($device->device_type !== "sms")
        {
            $device->c2Mon_On = $request->input('c2Mon_On');
            $device->c2Mon_Off = $request->input('c2Mon_Off');
            $device->c2Tue_On = $request->input('c2Tue_On');
            $device->c2Tue_Off = $request->input('c2Tue_Off');
            $device->c2Wed_On = $request->input('c2Wed_On');
            $device->c2Wed_Off = $request->input('c2Wed_Off');
            $device->c2Thur_On = $request->input('c2Thur_On');
            $device->c2Thur_Off = $request->input('c2Thur_Off');
            $device->c2Fri_On = $request->input('c2Fri_On');
            $device->c2Fri_Off = $request->input('c2Fri_Off');
            $device->c2Sat_On = $request->input('c2Sat_On');
            $device->c2Sat_Off = $request->input('c2Sat_Off');
            $device->c2Sun_On = $request->input('c2Sun_On');
            $device->c2Sun_Off = $request->input('c2Sun_Off');
            $device->newRequestC2 = $request->input('newRequestC2');
            $device->lastchannel2schedule = Carbon::now();
            $device->channel2schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;

            $device->save();
            $eventlog->datalog = $device->channel2." Schedule set";
        }elseif($device->device_type == "sms")
        {
            $switch = $request->input('schedule_setting');
            $time = $request->input('schedule_time');
            $mon = "";
            $tue = "";
            $wed = "";
            $thur = "";
            $fri = "";
            $sat = "";
            $sun = "";

            
            if($switch == 1)
            {
                if($request->has('monday'))
                {
                    $device->c2Mon_On = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c2Tue_On = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c2Wed_On = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c2Thur_On = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c2Fri_On = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c2Sat_On = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c2Sun_On = $time;
                    $sun = "su";
                }
                $power = "On";
                
            }
            else{
                if($request->has('monday'))
                {
                    $device->c2Mon_Off = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c2Tue_Off = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c2Wed_Off = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c2Thur_Off = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c2Fri_Off = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c2Sat_Off = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c2Sun_Off = $time;
                    $sun = "su";
                }
                $power = "Off";
                
            }
            
            $device->newRequestC2 = $request->input('newRequestC2');
            $device->lastchannel2schedule = Carbon::now();
            $device->channel2schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

           
            // sms code
            $message = $rand." Prog2 ". $power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun." *".$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $eventlog->datalog = $device->channel2." Schedule set to ".$power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun ;

            
            $device->save();
        }
        

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', $device->channel2 . ' Schedule Updated');
        
    }

    public function updateChannel3Schedule(Request $request, $id, Eventlog $eventlog)
    {
        // Channel 1
        $message = "";
        $device = Device::find($id);
        if($device->device_type !== "sms")
        {
            $device->c3Mon_On = $request->input('c3Mon_On');
            $device->c3Mon_Off = $request->input('c3Mon_Off');
            $device->c3Tue_On = $request->input('c3Tue_On');
            $device->c3Tue_Off = $request->input('c3Tue_Off');
            $device->c3Wed_On = $request->input('c3Wed_On');
            $device->c3Wed_Off = $request->input('c3Wed_Off');
            $device->c3Thur_On = $request->input('c3Thur_On');
            $device->c3Thur_Off = $request->input('c3Thur_Off');
            $device->c3Fri_On = $request->input('c3Fri_On');
            $device->c3Fri_Off = $request->input('c3Fri_Off');
            $device->c3Sat_On = $request->input('c3Sat_On');
            $device->c3Sat_Off = $request->input('c3Sat_Off');
            $device->c3Sun_On = $request->input('c3Sun_On');
            $device->c3Sun_Off = $request->input('c3Sun_Off');
            $device->newRequestC3 = $request->input('newRequestC3');
            $device->lastchannel3schedule = Carbon::now();
            $device->channel3schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;

            $device->save();
            $eventlog->datalog = $device->channel3." Schedule set";

        }elseif($device->device_type == "sms")
        {
            $switch = $request->input('schedule_setting');
            $time = $request->input('schedule_time');
            $mon = "";
            $tue = "";
            $wed = "";
            $thur = "";
            $fri = "";
            $sat = "";
            $sun = "";

            
            if($switch == 1)
            {
                if($request->has('monday'))
                {
                    $device->c3Mon_On = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c3Tue_On = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c3Wed_On = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c3Thur_On = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c3Fri_On = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c3Sat_On = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c3Sun_On = $time;
                    $sun = "su";
                }
                $power = "On";
                
            }
            else{
                if($request->has('monday'))
                {
                    $device->c3Mon_Off = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c3Tue_Off = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c3Wed_Off = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c3Thur_Off = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c3Fri_Off = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c3Sat_Off = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c3Sun_Off = $time;
                    $sun = "su";
                }
                $power = "Off";
                
            }
            
            $device->newRequestC3 = $request->input('newRequestC3');
            $device->lastchannel3schedule = Carbon::now();
            $device->channel3schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

           
            // sms code
            $message = $rand." Prog3 ". $power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun." *".$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
            $eventlog->datalog = $device->channel3." Schedule set to ".$power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun ;

            
            $device->save();
        }
        

        //Event Log
        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', $device->channel3 . ' Schedule Updated ');
        
    }

    public function updateChannel4Schedule(Request $request, $id, Eventlog $eventlog)
    {
        // Channel 1
        $message = "";
        $device = Device::find($id);
        if($device->device_type !== "sms")
        {
            $device->c4Mon_On = $request->input('c4Mon_On');
            $device->c4Mon_Off = $request->input('c4Mon_Off');
            $device->c4Tue_On = $request->input('c4Tue_On');
            $device->c4Tue_Off = $request->input('c4Tue_Off');
            $device->c4Wed_On = $request->input('c4Wed_On');
            $device->c4Wed_Off = $request->input('c4Wed_Off');
            $device->c4Thur_On = $request->input('c4Thur_On');
            $device->c4Thur_Off = $request->input('c4Thur_Off');
            $device->c4Fri_On = $request->input('c4Fri_On');
            $device->c4Fri_Off = $request->input('c4Fri_Off');
            $device->c4Sat_On = $request->input('c4Sat_On');
            $device->c4Sat_Off = $request->input('c4Sat_Off');
            $device->c4Sun_On = $request->input('c4Sun_On');
            $device->c4Sun_Off = $request->input('c4Sun_Off');
            $device->newRequestC4 = $request->input('newRequestC4');
            $device->lastchannel4schedule = Carbon::now();
            $device->channel4schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;

            $device->save();

            $eventlog->datalog = $device->channel1." Schedule set";

        }elseif($device->device_type == "sms")
        {
            $switch = $request->input('schedule_setting');
            $time = $request->input('schedule_time');
            $mon = "";
            $tue = "";
            $wed = "";
            $thur = "";
            $fri = "";
            $sat = "";
            $sun = "";

            
            if($switch == 1)
            {
                if($request->has('monday'))
                {
                    $device->c4Mon_On = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c4Tue_On = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c4Wed_On = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c4Thur_On = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c4Fri_On = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c4Sat_On = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c4Sun_On = $time;
                    $sun = "su";
                }
                $power = "On";
                
            }
            else{
                if($request->has('monday'))
                {
                    $device->c4Mon_Off = $time;
                    $mon = "mo";
                }
                if($request->has('tuesday'))
                {
                    $device->c4Tue_Off = $time;
                    $tue = "tu";
                }
                if($request->has('wednesday'))
                {
                    $device->c4Wed_Off = $time;
                    $wed = "we";
                }
                if($request->has('thursday'))
                {
                    $device->c4Thur_Off = $time;
                    $thur = "th";
                }
                if($request->has('friday'))
                {
                    $device->c4Fri_Off = $time;
                    $fri = "fr";
                }
                if($request->has('saturday'))
                {
                    $device->c4Sat_Off = $time;
                    $sat = "sa";
                }
                if($request->has('sunday'))
                {
                    $device->c4Sun_Off = $time;
                    $sun = "su";
                }
                $power = "Off";
                
            }
            
            $device->newRequestC4 = $request->input('newRequestC4');
            $device->lastchannel4schedule = Carbon::now();
            $device->channel4schedulesetby = Auth::user()->name . Auth::user()->engineer_name;
            $device->activatedevice = 1;
            $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

           
            // sms code
            $message = $rand." Prog4 ". $power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun." *".$device->devicekey;
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;

            $eventlog->datalog = $device->channel4." Schedule set to ".$power ." ". $time." ". $mon. " " .$tue." ".$wed." ".$thur." ".$fri." ".$sat." ".$sun ;

            
            $device->save();
        }
        

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->save();

        return redirect()->route('user.show', $device->id)->with('success', $device->channel4 . ' Schedule Updated ');
        
    }

    public function updateDevice(Request $request, $id, Eventlog $eventlog)
    {
        
        $this->validate($request, [
            'channel1' => ['max:10'],
            'channel2' => ['max:10'],
            'channel3' => ['max:10'],
            'channel4' => ['max:10']
        ]);

        if(!empty($id) && $id !== "device_id")
        {
            $device = Device::find($id);

        }else{
            $serial_number = $request->input('device_serialnumber');
            $device = Device::Where('device_serialnumber', $serial_number)->first();
        }

        $user = Auth::user()->id;

        $oldkey = $device->devicekey;
        $oldreport = $device->reportto;
        $oldmanual = $device->manualoverride;

        $device->device_name = $request->input('device_name');
        $device->mac_address = $request->input('mac_address');

        $device->user_id = $user;
        $device->device_type = "sms";


        if(!empty($serial_number))
        {
            $device->device_serialnumber = $request->input('device_serialnumber');

        }
        if(!empty($request->input('location')))
        {
            $device->location = $request->input('location');
        }
        
        if(!empty($request->input('engineer_id')))
        {
            $device->engineer_id = $request->input('engineer_id');
        }
        if(!empty($request->input('timezone')))
        {
            $device->timezone = $request->input('timezone');
        }
        if(empty($request->input('timezone')))
        {
            $device->timezone = 60;
        }
        if(!empty($request->input('poweronstate')))
        {
            $device->poweronstate = $request->input('poweronstate');
        }

        if(!empty($request->input('channel1')))
        {
            $device->channel1 = $request->input('channel1');
        }
        if(!empty($request->input('channel2')))
        {
            $device->channel2 = $request->input('channel2');
        }
        if(!empty($request->input('channel3')))
        {
            $device->channel3 = $request->input('channel3');
        }
        if(!empty($request->input('channel4')))
        {
            $device->channel4 = $request->input('channel4');
        }
        if(!empty($request->input('reportto')))
        {
            $device->reportto = $request->input('reportto');
        }
        if(!empty($request->input('reportemail')))
        {
            $device->reportemail = $request->input('reportemail');
        }
        if(!empty($request->input('devicekey')))
        {
            $device->devicekey = $request->input('devicekey');
        }
        if(!empty($request->input('organization_name')))
        {
            $device->organization_name = $request->input('organization_name');
        }
        
        $device->manualoverride = $request->input('manualoverride');
        
        
        $device->newUpdateDetails = 1;
        $device->activatedevice = 1;
        $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);


  
        if($device->manualoverride != $oldmanual)
        {
           
            $id = ($id == "") ? $device->id : $id;
           
            $message = ($rand." Tamper " . ($device->manualoverride == 1 ? "on *" : "off *") . $device->devicekey);
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
        }

        if($device->devicekey != $oldkey)
        {
           
            $id = ($id == "") ? $device->id : $id;
           
            $message = ($rand." key *" . $device->devicekey);
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
        }

        if($device->reportto != $oldreport)
        {
            
            $id = ($id == "") ? $device->id : $id;
            
            $message = ($rand." Report to " . $device->reportto . " *" . $device->devicekey);
            $smsresponse = $this->sendsms($id,$message);
            $device->sms = $message;
        }
        
        $device->timezone = ($device->timezone != 60) ? 60 :  $device->timezone;

        $device->save();


        // // Send email
        // if($device->save())
        // {
        //     $details = [
        //         'title' => 'Mail from ctron timer',
        //         'body' => 'This is a test email.'
        //     ];
    
        //     Mail::to('pat4allgen@gmail.com')->send(new AppEmail($details,$filePath,$subject));
        //     $email = response()->json(['message' => 'Email sent successfully.']);
        // }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Settings updated";

        $eventlog->save();

        return redirect()->route('editlist')->with('success', 'Device details updated');
    }

    public function editdevices()
    {
        $device = Device::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.editlist')->with('devices', $device);
    }

    public function deletedevices()
    {
        $device = Device::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.deletelist')->with('devices', $device);
    }

    public function downloadfirmware($id, Eventlog $eventlog)
    {
        $device = Device::find($id);
        $file = File::all()->last();
        if ($device->firmware_version !== $file->version_number) {
            $device->newUpdateDetails = 1;
            $device->activatedevice = 1;
            $device->save();
            return redirect()->route('user.show', $device->id)->with('success', 'New Firmware Update sent to device');
        } else {
            return redirect()->route('user.show', $device->id)->with('success', 'Latest Firmware already running on device');
        }

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Device firmware updated";

        $eventlog->save();
    }

    public function eventlog($id)
    {
        $eventlog = Eventlog::where('device_id', $id)->orderBy('created_at', 'desc')->paginate(20);
        $device = Device::find($id);
        $total_event = Eventlog::where('device_id', $id)->count();
        
        return view('user.eventlog')->with(['eventlogs' => $eventlog,'devices' => $device,'total_event' => $total_event]);
    }

    public function exporteventlog($id)
    {
        $eventlog = Eventlog::where('device_id', $id)->orderBy('created_at', 'desc')->get();
        $device = Device::find($id);
        // $eventlog->user_id = $eventlog->user->name;
        // $eventlog->devce_id = $eventlog->device->device_name;

        $details = [
            'title' => 'Eventlog for ' . $device->device_name,
            'body' => 'Please find attached the eventlog for the above device.'
        ];

        function transformObject($object,$index) {
            return [
                'S/N' => $index + 1,
                'Device name' => Device::find($object->device_id)->device_name, // Example transformation: make email uppercase
                'Done by' => ($object->user_id == 0 || strlen($object->user_id) > 10) ? $object->user_id : User::find($object->user_id)->name,
                'Operation' => $object->datalog,
                'Time' => Carbon::parse($object->created_at)->addMinutes(Device::find($object->device_id)->timezone)
            ];
        }

        $subject = "Ctron Event log report";

        // Creating the csv file
        $csv = Writer::createFromFileObject(new SplTempFileObject());

        // Optional: Insert header row if needed
        $header = ['S/N', 'Device name', 'Done by', 'Operation', 'Time'];
        $csv->insertOne($header);

        
        // Convert objects to arrays and insert into CSV
        foreach ($eventlog as $index => $object) {
            $transformedRow = transformObject($object,$index); // Transform the object
            // $row = $object->toArray(); // Convert object to array
            $csv->insertOne($transformedRow);
        }


        // Store the CSV file
        $fileName = 'report.csv';
        Storage::put($fileName, $csv->toString());

        // Get the file path
        $filePath = storage_path('app/' . $fileName);

        Mail::to($device->reportemail)->send(new AppEmail($details, $filePath, $subject));
        // $email = response()->json(['message' => 'Email sent successfully.']);

        // Make the file available for download
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function create_device()
    {
        return view('user.create_device');
    }

    public function cleartamper($id, Eventlog $eventlog)
    {
        $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $device = Device::find($id);
        $message = $rand . " Tamper clear *" . $device->devicekey;
        $smsresponse = $this->sendsms($id,$message);
        $device->sms = $message;
        $device->save();

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Device Tamper cleared";

        $eventlog->save();

        return redirect()->route('user.show', $device->id);
    }

    public function updatetime($id)
    {
        $rand = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $device = Device::find($id);
        $time = Carbon::now();
        $message = $rand . " " . $time . " *" . $device->devicekey;
        $smsresponse = $this->sendsms($id,$message);
        $device->sms = $message;
        return redirect()->route('user.show', $device->id);
    }

    public function store_device(Request $request, Eventlog $eventlog)
    {
        $user = Auth::user()->id;
        $device = Device::factory(\App\Models\Device::class)->create([
            'device_serialnumber' => $request->input('device_serialnumber'),
            'mac_address' => $request->input('mac_address'),
            'user_id' => $user,
            'organization_name' => $request->input('organization_name'),
            'device_name' => $request->input('device_name'),
        ]);

        //Event Log
        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = "Device Created";

        $eventlog->save();

        return redirect()->route('user.index')->with('success', 'Device Created');
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'title' => 'Mail from ctron timer',
            'body' => 'This is a test email.'
        ];

        // Mail::to('pat4allgen@gmail.com')->send(new AppEmail($details));

        return response()->json(['message' => 'Email sent successfully.']);
    }

    function sendsms($id,$message)
    {
        $device = Device::find($id);
        $phone = $device->mac_address;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.smartsmssolutions.com/io/api/client/v1/sms/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('token' => 'WLSsdfZwBREO6Om7eluLeAVJgccVcSpQOxIoNxEN27R6FOKwNC','sender' => 'CtronTimer','to' => $phone,'message' => $message,'type' => 0,'routing' => 2),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        echo $response;
        
        return json_decode($response);
    }
}
