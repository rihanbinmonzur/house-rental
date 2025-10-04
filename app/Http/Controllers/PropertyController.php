<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Property::all();
        return view('property.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   


        $requestData = $request->all();

        if($request->hasFile('image_url')){
            $fileName = time().'.'.$request->image_url->extension();  
            $request->image_url->move(public_path('uploads'), $fileName);
            $requestData['image_url']=$fileName;
        }

         // checkbox feature JSON এ convert
        $requestData['property_feature'] = json_encode($request->property_feature ?? []);
       
            // সব ফিল্ড save
        Property::create($requestData);
       return redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return view('property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
       
        return view('property.edit',compact('property'));
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {

        $property->update($request->all());
        if($request->hasFile('image_url')){
      
            if($property->image_url && file_exists(public_path('uploads/'.$property->image_url))){
                unlink(public_path('uploads/'.$property->image_url));
            } 
            $fileName = time(). '_'.$request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->move(public_path('uploads'),$fileName);

            $property->image_url = $fileName;
                }
            $property->save();

            return redirect()->route('property.index');

            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
       $property->delete();
        return redirect()->route('property.index') ;
    }
}
