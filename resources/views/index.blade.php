<x-layout>
        <x-header/>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-post-grid :posts="$posts" />
        </main>
        <x-footer/>
</x-layout>
