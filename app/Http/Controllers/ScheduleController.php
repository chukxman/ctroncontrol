<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
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
        $arr['schedule'] = Schedule::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.show')->with($arr);
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
        $schedule =  Schedule::find($id);
        return view('user.show')->with('schedules', $schedule);
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
        $this->validate($request, [
            'c1Mon_On' => 'required',
            'c1Mon_Off' => 'required',
            'c1Tue_On' => 'required',
            'c1Tue_Off' => 'required',
            'c1Wed_On' => 'required',
            'c1Wed_Off' => 'required',
            'c1Thur_On' => 'required',
            'c1Thur_Off' => 'required',
            'c1Fri_On' => 'required',
            'c1Fri_Off' => 'required',
            'c1Sat_On' => 'required',
            'c1Sat_Off' => 'required',
            'c1Sun_On' => 'required',
            'c1Sun_Off' => 'required',
            'c2Mon_On' => 'required',
            'c2Mon_Off' => 'required',
            'c2Tue_On' => 'required',
            'c2Tue_Off' => 'required',
            'c2Wed_On' => 'required',
            'c2Wed_Off' => 'required',
            'c2Thur_On' => 'required',
            'c2Thur_Off' => 'required',
            'c2Fri_On' => 'required',
            'c2Fri_Off' => 'required',
            'c2Sat_On' => 'required',
            'c2Sat_Off' => 'required',
            'c2Sun_On' => 'required',
            'c2Sun_Off' => 'required',
            'c3Mon_On' => 'required',
            'c3Mon_Off' => 'required',
            'c3Tue_On' => 'required',
            'c3Tue_Off' => 'required',
            'c3Wed_On' => 'required',
            'c3Wed_Off' => 'required',
            'c3Thur_On' => 'required',
            'c3Thur_Off' => 'required',
            'c3Fri_On' => 'required',
            'c3Fri_Off' => 'required',
            'c3Sat_On' => 'required',
            'c3Sat_Off' => 'required',
            'c3Sun_On' => 'required',
            'c3Sun_Off' => 'required',
            'c4Mon_On' => 'required',
            'c4Mon_Off' => 'required',
            'c4Tue_On' => 'required',
            'c4Tue_Off' => 'required',
            'c4Wed_On' => 'required',
            'c4Wed_Off' => 'required',
            'c4Thur_On' => 'required',
            'c4Thur_Off' => 'required',
            'c4Fri_On' => 'required',
            'c4Fri_Off' => 'required',
            'c4Sat_On' => 'required',
            'c4Sat_Off' => 'required',
            'c4Sun_On' => 'required',
            'c4Sun_Off' => 'required',
        ]);

        //Create device
        $schedule = Schedule::find($id);
        $schedule->c1Mon_On = $request->input('c1Mon_On');
        $schedule->c1Mon_Off = $request->input('c1Mon_Off');
        $schedule->c1Tue_On = $request->input('c1Tue_On');
        $schedule->c1Tue_Off = $request->input('c1Tue_Off');
        $schedule->c1Wed_On = $request->input('c1Wed_On');
        $schedule->c1Wed_Off = $request->input('c1Wed_Off');
        $schedule->c1Thur_On = $request->input('c1Thur_On');
        $schedule->c1Thur_Off = $request->input('c1Thur_Off');
        $schedule->c1Fri_On = $request->input('c1Fri_On');
        $schedule->c1Fri_Off = $request->input('c1Fri_Off');
        $schedule->c1Sat_On = $request->input('c1Sat_On');
        $schedule->c1Sat_Off = $request->input('c1Sat_Off');
        $schedule->c1Sun_On = $request->input('c1Sun_On');
        $schedule->c1Sun_Off = $request->input('c1Sun_Off');
        //Channel2
        $schedule->c2Mon_On = $request->input('c2Mon_On');
        $schedule->c2Mon_Off = $request->input('c2Mon_Off');
        $schedule->c2Tue_On = $request->input('c2Tue_On');
        $schedule->c2Tue_Off = $request->input('c2Tue_Off');
        $schedule->c2Wed_On = $request->input('c2Wed_On');
        $schedule->c2Wed_Off = $request->input('c2Wed_Off');
        $schedule->c2Thur_On = $request->input('c2Thur_On');
        $schedule->c2Thur_Off = $request->input('c2Thur_Off');
        $schedule->c2Fri_On = $request->input('c2Fri_On');
        $schedule->c2Fri_Off = $request->input('c2Fri_Off');
        $schedule->c2Sat_On = $request->input('c2Sat_On');
        $schedule->c2Sat_Off = $request->input('c2Sat_Off');
        $schedule->c2Sun_On = $request->input('c2Sun_On');
        $schedule->c2Sun_Off = $request->input('c2Sun_Off');
        //Channel3
        $schedule->c3Mon_On = $request->input('c3Mon_On');
        $schedule->c3Mon_Off = $request->input('c3Mon_Off');
        $schedule->c3Tue_On = $request->input('c3Tue_On');
        $schedule->c3Tue_Off = $request->input('c3Tue_Off');
        $schedule->c3Wed_On = $request->input('c3Wed_On');
        $schedule->c3Wed_Off = $request->input('c3Wed_Off');
        $schedule->c3Thur_On = $request->input('c3Thur_On');
        $schedule->c3Thur_Off = $request->input('c3Thur_Off');
        $schedule->c3Fri_On = $request->input('c3Fri_On');
        $schedule->c3Fri_Off = $request->input('c3Fri_Off');
        $schedule->c3Sat_On = $request->input('c3Sat_On');
        $schedule->c3Sat_Off = $request->input('c3Sat_Off');
        $schedule->c3Sun_On = $request->input('c3Sun_On');
        $schedule->c3Sun_Off = $request->input('c3Sun_Off');
        //Channel4
        $schedule->c4Mon_On = $request->input('c4Mon_On');
        $schedule->c4Mon_Off = $request->input('c4Mon_Off');
        $schedule->c4Tue_On = $request->input('c4Tue_On');
        $schedule->c4Tue_Off = $request->input('c4Tue_Off');
        $schedule->c4Wed_On = $request->input('c4Wed_On');
        $schedule->c4Wed_Off = $request->input('c4Wed_Off');
        $schedule->c4Thur_On = $request->input('c4Thur_On');
        $schedule->c4Thur_Off = $request->input('c4Thur_Off');
        $schedule->c4Fri_On = $request->input('c4Fri_On');
        $schedule->c4Fri_Off = $request->input('c4Fri_Off');
        $schedule->c4Sat_On = $request->input('c4Sat_On');
        $schedule->c4Sat_Off = $request->input('c4Sat_Off');
        $schedule->c4Sun_On = $request->input('c4Sun_On');
        $schedule->c4Sun_Off = $request->input('c4Sun_Off');
        $schedule->save();

        return redirect()->route('admin.index')->with('success', 'Device Updated');
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
