<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;

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
        $arr['devices'] = Device::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.index')->with($arr);

        //Side nav menu

        // $result = Device::where('user_id', 'Auth::user()->id')->get();
        // return view::share('devicedata', $result);

        // $dev = Device::orderBy('id', 'asc')->get();
        // return view('user/index')->with('devices', $dev);
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
    public function show($id)
    {
        $device =  Device::find($id);
        return view('user.show')->with('devices', $device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device  = Device::find('$id');
        return view('user.channel');
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
        // $this->validate($request, [
        //     'device_name' => 'required',
        //     'device_serialnumber' => 'required',
        //     'organization_name' => 'required',
        //     'location' => 'required',
        //     'user_id' => 'required'
        // ]);

        //Update device
        $device = Device::find($id);
        $device->device_name = "timmerxdevice";
        $device->organization_name = "timmerxOrganization name";
        $device->location = "timmerxlocation";
        $device->user_id = 0;
        $device->save();

        return redirect()->route('user.index')->with('success', 'Device Deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
