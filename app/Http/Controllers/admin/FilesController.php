<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('issiteengineer');
        $this->middleware('isparent');
    }

    public function index()
    {
        return view('admin.uploadfirmware');
    }

    public function uploadfile(Request $request, File $file)
    {
        $name = $request->file('firmware')->getClientOriginalName();
        $path = $request->file('firmware')->storeAs('public', $name);

        $file->name = $name;
        $file->version_number = $request->input('version_number');
        $file->path = $path;

        $file->save();
        return redirect()->route('admin.index')
            ->with('success', 'Firmware has been uploaded successfully')
            ->with('file', $name);
    }
}
