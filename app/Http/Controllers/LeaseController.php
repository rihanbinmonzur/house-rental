<?php

namespace App\Http\Controllers;

use App\Models\lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=lease::all();
        return view('lease.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('lease.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestda = $request->all();
        lease::create($requestda);
        return redirect()->route('lease.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(lease $lease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lease $lease)
    {
        return view ('lease.edit',compact('lease'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lease $lease)
    {
        $lease -> update($request->all());
        return redirect()->route('lease.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lease $lease)
    {
        $lease->delete();
        return redirect()->route('lease.index');
    }
}
