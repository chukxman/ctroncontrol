<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class SubusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('isadmin');
        $this->middleware('issiteengineer');
    }

    public function index()
    {
        $subuser = User::where('parent_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.subuser.index')->with('subusers', $subuser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.subuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'engineer_name' => ['required', 'unique:users', 'max:255'],
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $subuser = User::factory(\App\Models\User::class)->create([
            'engineer_name' => $request->input('engineer_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('subuser.index')->with('subusers', $subuser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.subuser.show')->with('users', $user);
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('subuser.subuserslist')->with('success', 'Engineer Deleted');
    }

    public function subuserslist()
    {
        $subuser = User::where('parent_id', Auth::user()->id)->orderBy('id', 'asc')->get();
        return view('user.subuser.subuserslist')->with('subusers', $subuser);
    }

    public function devices($id)
    {
        $devices = Device::where('engineer_id', $id)->orderBy('id', 'asc')->get();
        return view('user.subuser.devices')->with('devices', $devices);
    }

    public function showdevice($id)
    {
        $devices = Device::find($id);
        return view('user.subuser.showdevice')->with('devices', $devices);
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
}
