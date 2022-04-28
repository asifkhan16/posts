@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="bg-white w-75 rounded mx-auto mt-4 px-4 py-5">
            
            <h1>Dashboard</h1>
            <p>{{ Auth::user()->name }}</p>
        </div>
    </div>
@endsection