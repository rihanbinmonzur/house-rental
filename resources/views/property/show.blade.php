
@extends('layouts.app_property')
@section('pageTitle',"index")

@push('styles')
<style>
    body{
        margin-left:70px;
    }
</style>
    @endpush
    
    @section('content')
    <div class="container">
    <h2>{{$property->name}}</h2>
    <p>price:{{$property->price}}</p>
    <p>description:{{ $property->description }}</p>
    <p>{{$property->property_feature}}</p>
    @if($property->image_url)
    <img src="{{asset('uploads/'.$property->image_url)}}" alt="">
    @endif
    </div>
    
    


 <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>