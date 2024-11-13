<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->query('term');
        $devices = Device::query()
            ->when($term, fn ($query) => $query->where('organization_name', 'like', "%{$term}%")
                ->orwhere('device_name', 'like', "%{$term}%"))
            ->paginate(10);

        return view('user.searchresult', [
            'devices' => $devices,
            'term' => $term
        ]);
    }
}
