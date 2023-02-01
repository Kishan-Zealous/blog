<x-layout>
    <x-header />
    <main class="max-w-2xl  mx-auto mt-6 lg:mt-20 space-y-6">
        <form action="/login" method="POST"
            class=" bg-gray-500 p-10 flex flex-col justify-items-center items-center rounded-xl ">
            <h1 class="font-bold text-3xl">Login</h1>

            @csrf
            <div class="mb-6 w-full">
                <label class="block mb-2 text-xs font-bold text-white uppercase" for="email">
                    {{ __('email') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="text" id="email" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 w-full">
                <label class="block mb-2 text-xs font-bold text-white uppercase" for="password">
                    {{ __('password') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="password" id="password" name="password"
                    value="{{ old('password') }}">
                @error('password')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            @error('invalid')
                <p class="text-red-500 font-bold">{{ $message }}</p>
            @enderror
            <div class="my-6 mx-auto w-40">

                <input class="w-full p-2 border bg-black text-white border-gray-600 rounded hover:bg-slate-900"
                    type="submit" id="submit" name="submit" value="Submit">
            </div>


        </form>
    </main>
    <x-footer />
</x-layout>
