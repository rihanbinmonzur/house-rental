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
        $requestData = $request->all();

          if($request->hasFIle('image_url')){
            $fileName = time().'.'.$request->image_url->extension();
            $request->image_url->move(public_path('uploadsmr'),$fileName);
            $requestData['image_url'] = $fileName;
          }

        maintenance_request::create($requestData);
        return redirect()->route('mainreq.index');
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
    public function edit(maintenance_request $mainreq)
    {
        return view('main_req.edit', compact('mainreq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, maintenance_request $mainreq)
    {
        $mainreq->update($request->all());
        if($request->hasFile('image_url')){

            if($mainreq->image_url && file_exists(public_path('uploadsmr/'.$mainreq->image_url))){
                unlink(public_path('uploadsmr/'.$mainreq->image_url));
            }
            $fileName = time(). '_'.$request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->move(public_path('uploadsmr'),$fileName);
            $mainreq->image_url = $fileName;
        }
        $mainreq->save();

        return redirect()->route('mainreq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(maintenance_request $mainreq)
    {
        $mainreq->delete();
        return redirect()->route('mainreq.index');
    }
}
