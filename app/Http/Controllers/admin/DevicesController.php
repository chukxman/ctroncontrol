<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Eventlog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



use PhpParser\Node\Expr\PostDec;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isparent');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //The code below is to retrieve deleted device to be placed in deleteddeviceController
        // $devices = Device::withTrashed('id', 'asc')->paginate(10);
        // return view('admin.index')->with('devices', $devices);
        //Ends here

        //This is for restoring deleted device
        // $device = Device::withTrashed($id);
        // $device->restore();
        // return redirect()->route('admin.index')->with('success', 'Device Restored');
        //Ends here

        //This deletes device completely
        // $device = Device::withTrashed->find($id);
        // $device->forceDelete();
        // return redirect()->route('admin.index')->with('success', 'Device Deleted Completely');
        //Ends Here

        // $arr['devices'] = Device::all();
        // return view('admin.index')->with($arr);

        //Retrieve all devices
        $devices = Device::paginate(10);
        return view('admin.index')->with('devices', $devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Eventlog $eventlog)
    {
        $device = Device::factory(\App\Models\Device::class)->create([
            'device_serialnumber' => $request->input('device_serialnumber'),
            'mac_address' => $request->input('mac_address'),
        ]);

        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ('Device Created');
        $eventlog->save();
        return redirect()->route('admin.index')->with('success', 'Device Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device =  Device::find($id);
        return view('admin.show')->with('devices', $device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        return view('admin.edit')->with('device', $device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Eventlog $eventlog)
    {

        //Update device
        $device = Device::find($id);
        $device->device_name = $request->input('device_name');
        $device->device_serialnumber = $request->input('device_serialnumber');
        $device->organization_name = $request->input('organization_name');
        $device->location = $request->input('location');
        $device->user_id = $request->input('user_id');
        $device->engineer_id = $request->input('engineer_id');

        $device->save();

        $eventlog->user_id = Auth::user()->id;
        $eventlog->device_id = $device->id;
        $eventlog->datalog = ('Device Updated');
        $eventlog->save();

        return redirect()->route('admin.admineditlist')->with('success', 'Device Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Eventlog $eventlog)
    {
        //deleting device instance
        $device = Device::find($id);
        $device->delete();

        $eventlog = Eventlog::where('device_id', $id)->first();
        $oldeventlog = json_decode($eventlog->datalog);-
        $eventlog->datalog = json_encode([Carbon::now() => 'Device Deleted By ' . Auth::user()->name . ', '] . $oldeventlog);
        $eventlog->save();;

        return redirect()->route('admin.admindeletelist')->with('success', 'Device Deleted');
    }

    public function admineditlist()
    {
        $devices = Device::paginate(10);
        return view('admin.admineditlist')->with('devices', $devices);
    }

    public function admindeletelist()
    {
        $devices = Device::paginate(10);
        return view('admin.admindeletelist')->with('devices', $devices);
    }

   
}
