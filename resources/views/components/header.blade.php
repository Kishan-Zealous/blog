<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex gap-8 items-center">

        @guest
        <a href="/register" class="text-xs font-bold uppercase">Register</a>
        <a href="/login" class="text-xs font-bold uppercase">Log in</a>   
        @endguest

        @auth
        <form action="/logout" method="GET">
            @csrf
            <input type="submit" value="Logout">
        </form>
        @endauth
        <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscrib
        </a>
    </div>
</nav>

<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>

    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing the popular Laravel series with new content.
        I'm going to keep you guys up to speed with what's going on!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8 flex">
        <!--  Category -->
       
            <x-dropdown 
                :options="$categories"
                :selectedOption="$currentCategory ?? null"
                path="category"
                optionName="Category"
                />

                <x-dropdown 
                :options="$authors"
                :selectedOption="$currentAuthor ?? null"
                path="author"
                optionName="Author"
                />

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/?search={{ request('search') }}&{{ http_build_query(request()->except('search','page')) }}">
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm" value="{{ request('search') }}">
            </form>
        </div>
    </div>
    <script>
        function handlechange(e,prevQuery,newQuery) {
            let requestedPath = `/?${newQuery}=${e.target.value}&${prevQuery}`
            window.location.replace(requestedPath)
        }
    </script>
</header>
