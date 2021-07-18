<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsApiController extends Controller
{
    public function index()
    {
        return Division::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:45',
            'level' => 'required',
        ]);
    
        return Division::create([
            'name' => $validated['name'],
            'level' => $validated['level'],
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|max:45',
            'level' => 'required',
        ]);
    
        $success = $division->update([
            'name' => request('name'),
            'level' => request('level'),
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function destroy(Division $division)
    {
        $success = $division->delete();

        return [
            'success' => $success
        ];
    }
}
