<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = unit::all();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $requestdata= $request->all();
       unit::create($requestdata);
       return response()->json(['message'=>'Unit created successfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(unit $unit)
    {
        return response()->json($unit, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, unit $unit)
    {
        $unit ->update($request->all());
        return response()->json(['message'=>'Unit updated successfully'],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unit $unit)
    {
        $unit->delete();
        return response()->json(['message'=>'Unit deleted successfully'],200);
    }
}
