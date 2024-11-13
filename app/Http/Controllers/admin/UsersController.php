<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('issiteengineer');
        $this->middleware('isparent');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.users.index')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => ['required', 'unique:users', 'max:255'],
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $user = User::factory(\App\Models\User::class)->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('aluserslist')->with('users', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::Find($id);
        return view('admin.users.index')->with('usersdata', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('users', $user);
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->name = $request->input('name');

        return redirect()->route('aluserslist')->with('users', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::Find($id);
        $user->delete();
        return redirect()->route('deleteuserslist')->with('success', 'user deleted');
    }

    public function deleteuserslist()
    {
        $arr['users'] = User::all();
        return view('admin.users.deleteuserslist')->with($arr);
    }

    public function edituserslist()
    {
        $arr['users'] = User::all();
        return view('admin.users.edituserslist')->with($arr);
    }

    public function alluserslist()
    {
        $user = User::all();
        return view('admin.users.index')->with('users', $user);
    }
}
