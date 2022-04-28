@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="bg-white w-75 rounded mx-auto my-5 px-4 py-5">

            <h1>Posts</h1>

            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                  <div class="mb-3">
                    <textarea class="form-control w-75 @error('body') border border-danger @enderror" name="body" id="exampleFormControlTextarea1" rows="5"></textarea>
                    @error('body')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="">
                      <input type="submit" value="Post" class="btn btn-primary">
                  </div>
            </form>
            @foreach ($posts as $post)

               <x-post :post=$post />
            
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@endsection