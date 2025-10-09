<?php

namespace App\Http\Controllers;

use App\Models\maintenance_request;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {               
        $data = maintenance_request::all();
        return view('main_req.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main_req.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        maintenance_request::create($request->all());
        return redirect()->route('mainreq.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(maintenance_request $maintenance_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(maintenance_request $maintenance_request)
    {
        return view('main_req.edit', compact('maintenance_request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, maintenance_request $maintenance_request)
    {
        $maintenance_request->update($request->all());
        return redirect()->route('mainreq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(maintenance_request $maintenance_request)
    {
        //
    }
}
