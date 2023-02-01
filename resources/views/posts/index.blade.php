<x-layout>
        @include('header')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-post-grid :posts="$posts" />
            {{ $posts->links() }}
            <form action="">
                <input type="text">
                <div class="mb-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="name">
                        {{ __('name') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded"
                           type="text"
                           id="name"
                           name="name"
                           value="dsssd"
                           required>
                </div>
            </form>
        </main>
        @include('footer')
    </x-layout>