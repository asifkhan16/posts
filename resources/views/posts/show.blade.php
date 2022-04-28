@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="bg-white w-75 rounded mx-auto mt-4 px-4 py-5">
            
            <h1>Post</h1>
            <x-post post='$post' />
            
        </div>
    </div>
@endsection