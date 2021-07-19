<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionsApiController extends Controller
{
    public function index()
    {
        return Division::with('parent')->get();
    }

    public function show(Division $division)
    {
        return $division;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:divisions|max:45',
            'level' => 'required',
            'parent_id' => 'nullable',
        ]);
    
        return Division::create([
            'name' => $validated['name'],
            'level' => $validated['level'],
            'parent_id' => $validated['parent_id'],
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|unique:divisions|max:45',
            'level' => 'required',
            'parent_id' => 'nullable',
        ]);
    
        $success = $division->update([
            'name' => $validated['name'],
            'level' => $validated['level'],
            'parent_id' => $validated['parent_id'],
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
