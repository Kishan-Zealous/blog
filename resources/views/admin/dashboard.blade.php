<x-layout>
    <x-header />

    <section class="max-w-4xl mx-auto flex  border mt-10 rounded-md">
        <div class="flex flex-col gap-3 bg-gray-200 p-10 flex-shrink-0">
            <h2 class='font-bold'>Links</h2>
            <a href="/dashboard" class="{{ request()->is('dashboard') ? 'text-blue-600' : '' }}">View All Posts</a>
            <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-600' : '' }}">Add new post</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="/posts/{{ $post->id }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/posts/{{ $post->id }}/edit"
                                class="text-blue-500 hover:text-blue-600">Edit</a>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                @csrf
                                @method('DELETE')

                                <button class="text-xs text-gray-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="max-w-4xl mx-auto mt-10">
        {{ $posts->links() }}
    </section>
    <x-footer />
</x-layout>
