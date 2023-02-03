@props(['comment'])

<article class='flex bg-gray-300 p-10 rounded-xl border border-gray-400  space-x-4'>
    <div>
        <img src="https://i.pravatar.cc/100?u={{ $comment->user->id }}" alt="user" class='flex-shrink-0 rounded-full' />
    </div>
    <div>
        <h3 class='font-bold'>{{ $comment->user->name }}</h3>
        <p>{{ $comment->body }}</p>
    </div>
</article>