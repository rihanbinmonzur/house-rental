<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Landlord::all();
        return view ('land_lord.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('land_lord.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $requestdata = $request->all();
       landlord::create($requestdata);
       return redirect()->route('landlord.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Landlord $landlord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Landlord $landlord)
    {
       return view ('land_lord.edit',compact('landlord'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Landlord $landlord)
    {
        $landlord->update($request->all());
        return redirect()->route('landlord.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Landlord $landlord)
    {
        $landlord->delete();
        return redirect()->route('landlord.index');
    }
}
