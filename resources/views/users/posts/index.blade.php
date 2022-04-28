@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="w-75 rounded mx-auto mt-4  ">
            
            <div>
                <h1>{{ $user->name }}</h1>
                <p>posted {{ $posts->count() }} {{ Str::plural('post',$posts->count()) }} and
                recived {{ $user->recviedLikes->count() }} {{ Str::plural('like', $user->recviedLikes->count()) }}</p>
            </div>
            <div class="bg-white py-5 px-4">
                @foreach ($posts as $post)
                <x-post :post=$post />
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection