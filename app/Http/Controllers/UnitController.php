<?php

namespace App\Http\Controllers;

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
        return view ('unit.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view ('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $requestdata= $request->all();
       if($request->hasFile('image_url')){
    $fileName = time().'_' .$request->image_url->getClientOriginalName();
    $request->image_url->move(public_path('uploadsun'),$fileName);
    $requestdata['imahe_url']=$fileName;
    }
       unit::create($requestdata);
       return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(unit $unit)
    {
        return view ('unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, unit $unit)
    {
     $unit ->update($request->all());
     return redirect()->route('unit.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unit $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index');
    }
}
