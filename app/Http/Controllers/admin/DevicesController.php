<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Schedule;
use App\Models\DeviceState;
use PhpParser\Node\Expr\PostDec;

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
        
    }

    
    public function index()
    {
        // $arr['devices'] = Device::all();

        // return view('admin.index')->with($arr);

        $devices = Device::orderBy('id', 'asc')->paginate(10);
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
    public function store(Request $request, Device $device)
    {
        $this->validate($request, [
            'device_name' => 'required',
            'device_serialnumber' => 'required',
            'organization_name' => 'required',
            'location' => 'required',
            'user_id' => 'required'

            
        ]);

        //Create device
        $device->device_name = $request->input('device_name');
        $device->device_serialnumber = $request->input('device_serialnumber');
        $device->organization_name = $request->input('organization_name');
        $device->location = $request->input('location');
        $device->user_id = $request->input('user_id');
        $device->save();

        //creating new instance of DeviceState
        $device_state = new DeviceState;
        $device_state->user_id = $request->input('user_id');
        $device_state->device_id = $device->id;
        $device_state->save();

        //creating new instance of 
        $schedule = new Schedule;
        $schedule->user_id = $request->input('user_id');
        $schedule->device_id = $device->id;
        $schedule->save();

        return redirect()->route('admin.index')->with('success','Device Created');
        
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
        return view('admin.edit')->with('device',$device);
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
        $this->validate($request, [
            'device_name' => 'required',
            'device_serialnumber' => 'required',
            'organization_name' => 'required',
            'location' => 'required',
            'user_id' => 'required'
        ]);
        
        //Create device
        $device = Device::find($id);
        $device->device_name = $request->input('device_name');
        $device->device_serialnumber = $request->input('device_serialnumber');
        $device->organization_name = $request->input('organization_name');
        $device->location = $request->input('location');
        $device->user_id = $request->input('user_id');
        $device->save();

        return redirect()->route('admin.index')->with('success','Device Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        $device->delete();
        return redirect()->route('admin.index')->with('success','Device Deleted');
    }
}