@props(['post'=>$post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}"
        class="font-bold">{{ $post->user->name }}</a><span class="text-gray-600 text-sm">
        {{ $post->created_at->diffforhumans() }}</span>
    <p class="mb-2">{{ $post->body }}</p>
    @if (Auth::user() && Auth::user()->id == $post->user->id)
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">
                    Delete</button>
            </form>
        </div>
    @endif
    <div class="flex items-center">
        @if (Auth::user())
            @if (!$post->likedBy(Auth::user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endif
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>
    </div>
</div>
