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

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'level' => 'required',
        ]);
    
        return Division::create([
            'name' => request('name'),
            'level' => request('level'),
        ]);
    }

    public function update(Division $division)
    {
        request()->validate([
            'name' => 'required',
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
