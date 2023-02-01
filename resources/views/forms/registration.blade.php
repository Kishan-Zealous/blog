<x-layout>
    <x-header/>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
      

        
        <form action="/register" method="POST" class="border rounded-xl max-w-xl mx-auto p-10 bg-gray-300">
            @csrf
            <div class="font-bold text-center text-3xl">Registration</div>
            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="name">
                    {{ __('name') }}
                    
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       >
                       @error('name')
                           <p class="text-red-500 font-bold">{{ $message }}</p>
                       @enderror
            </div>
            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                       for="username">
                    {{ __('username') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded"
                       type="text"
                       id="username"
                       name="username"
                       value="{{ old('username') }}"
                       >
                       @error('username')
                           <p class="text-red-500 font-bold">{{ $message }}</p>
                       @enderror
            </div>
                <div class="my-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="email">
                        {{ __('email') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded"
                           type="text"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           >
                           @error('email')
                               <p class="text-red-500 font-bold">{{ $message  }}</p>
                           @enderror
                </div>

                <div class="my-6">
                    <label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                           for="password">
                        {{ __('password') }}
                    </label>
                    <input class="w-full p-2 border border-gray-400 rounded"
                           type="password"
                           id="password"
                           name="password"
                           >
                           @error('password')
                               <p class="text-red-500 font-bold">{{ $message }}</p>
                           @enderror
                </div>
                <div class="my-6 mx-auto w-40">
                    
                    <input class="w-full p-2 border bg-black text-white border-gray-600 rounded hover:bg-slate-900"
                           type="submit"
                           id="submit"
                           name="submit"
                           value="Submit"
                           >
                </div>
        </form>
    </main>
    <x-footer/>
</x-layout>
