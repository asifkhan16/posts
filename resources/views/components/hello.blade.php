@props([
    'post' => null,
])

<div class="desplay-post border border-secondry mb-3 p-3 rounded">
    <a href="{{ route('users.posts',$post->user) }}" class="text-bold text-decoration-none">{{ $post->user->name }}</a>
    <span>{{ $post->created_at->diffForHumans() }}</span>
    <p>{{ $post->body }}</p>
    <span>likes</span>
    <div>
         @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn ms-2 p-0 like-btn text-primary">delete</button>
            </form>
        @endcan 

        <div class="d-flex like-section align-item-center"> 
            @auth
                @if (!$post->likedby(Auth::user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        <button type="submit" class="btn p-0 me-1 like-btn text-primary">
                        <i class="fa-regular fa-heart "></i></button>
                    </form>
                @else
                    <form action="{{ route('posts.unlike',$post->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn p-0 like-btn text-primary">
                        <i class="fa-solid fa-heart unlike"></i></button>
                    </form>
                @endif
            @endauth
                <span class="ms-2">{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span>
        </div>
    </div>
</div>