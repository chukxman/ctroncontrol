<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function updateChannel1State(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->channel1state = (int) $request->has('channel1state') ? 1 : 0;
        $device->channel1controlsource = 2;
        $device->lastchannel1state = Carbon::now();
        $device->channel1statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel1 State Updated');
    }

    public function updateChannel2State(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->channel2state = (int) $request->has('channel2state') ? 1 : 0;
        $device->channel2controlsource = 2;
        $device->lastchannel2state = Carbon::now();
        $device->channel2statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel2 State Updated');
    }

    public function updateChannel3State(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->channel3state = (int) $request->has('channel3state') ? 1 : 0;
        $device->channel3controlsource = 2;
        $device->lastchannel3state = Carbon::now();
        $device->channel3statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel3 State Updated');
    }

    public function updateChannel4State(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->channel4state = (int) $request->has('channel4state') ? 1 : 0;
        $device->channel4controlsource = 2;
        $device->lastchannel4state = Carbon::now();
        $device->channel4statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel4 State Updated');
    }

    //Update counter
    public function updateChannel1Counter(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->c1counter = $request->input('c1counter');
        $device->channel1controlsource = 2;
        $device->lastchannel1state = Carbon::now();
        $device->channel1statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel1 Counter Set');
    }

    public function updateChannel2Counter(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->c2counter = $request->input('c2counter');
        $device->channel2controlsource = 2;
        $device->lastchannel2state = Carbon::now();
        $device->channel2statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel2 Counter Set');
    }

    public function updateChannel3Counter(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->c3counter = $request->input('c3counter');
        $device->channel2controlsource = 2;
        $device->lastchannel3state = Carbon::now();
        $device->channel3statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel3 Counter Set');
    }

    public function updateChannel4Counter(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->c4counter = $request->input('c4counter');
        $device->channel4controlsource = 2;
        $device->lastchannel4state = Carbon::now();
        $device->channel4statesetby = Auth::user()->name . Auth::user()->engineer_name;
        $device->save();

        return redirect()->route('user.show', $device->id)->with('success', 'Channel4 Counter Set');
    }

    //Update schedule
    public function updateChannel1Schedule(request $request, $id)
    {
        // Channel 1
        $device = Device::find($id);
        $device->c1Mon_On = $request->input('c1Mon_On');
        $device->c1Mon_Off = $request->input('c1Mon_Off');
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

        $device->save();
        return redirect()->route('user.show', $device->id)->with('success', 'Channel1 Schedule Updated');
    }


    public function updateChannel2Schedule(Request $request, $id)
    {
        // Channel 2
        $device = Device::find($id);
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

        $device->save();
        return redirect()->route('user.show', $device->id)->with('success', 'Channel2 Schedule Updated');
    }

    public function updateChannel3Schedule(Request $request, $id)
    {
        // Channel 3
        $device = Device::find($id);
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

        $device->save();
        return redirect()->route('user.show', $device->id)->with('success', 'Channel3 Schedule Updated');
    }

    public function updateChannel4Schedule(Request $request, $id)
    {
        // Channel 4
        $device = Device::find($id);
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

        // Saving Schedule
        $device->save();
        return redirect()->route('user.show', $device->id)->with('success', 'Channel4 Schedule Updated');
    }
}
