<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceState;
use Illuminate\Support\Facades\Auth;


class DevicestateController extends Controller
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
        // $arr['states'] = DeviceState::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        // return view('user.show')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $this->validate($request, [
            // 'device_name' => 'required',
            // 'device_serialnumber' => 'required',
            // 'organization_name' => 'required',
            // 'location' => 'required',
            // 'user_id' => 'required'
        ]);

        //Create device
        $device_state = DeviceState::find($id);
        $device_state->channel1state = $request->input('channel1state');
        $device_state->channel2state = $request->input('channel2state');
        $device_state->channel3state = $request->input('channel3state');
        $device_state->channel4state = $request->input('channel4state');
        $device_state->channel1controlsource = $request->input('source');
        $device_state->channel2controlsource = $request->input('user_id');
        $device_state->channel3controlsource = $request->input('user_id');
        $device_state->channel4controlsource = $request->input('user_id');
        $device_state->save();

        return redirect()->route('user.show')->with('success', 'State Changed');
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
