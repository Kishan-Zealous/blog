<x-layout>
    <x-header />

    <section class="max-w-4xl mx-auto flex  border mt-10 rounded-md">
        <div class="flex flex-col gap-3 bg-gray-200 p-10 flex-shrink-0">
            <h2 class='font-bold'>Links</h2>
            <a href="/dashboard" class="{{ request()->is('dashboard') ? 'text-blue-600' : '' }}">View All Posts</a>
            <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-600' : '' }}">Add new post</a>
        </div>

        <form action="/admin/posts" method="POST" class="border rounded-xl  p-10 bg-gray-300 mx-10 my-10 w-full" enctype="multipart/form-data">
            @csrf
            <div class="font-bold text-center text-3xl">Add New Post</div>
            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="title">
                    {{ __('title') }}

                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="text" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="slug">
                    {{ __('slug') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="text" id="slug" name="slug"
                    value="{{ old('slug') }}">
                @error('slug')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="body">
                    {{ __('body') }}
                </label>
                <textarea class="w-full p-2 border border-gray-400 rounded" type="text" id="body" name="body"
                    >{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="excerpt">
                    {{ __('excerpt') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="text" id="excerpt" name="excerpt"
                    value="{{ old('excerpt') }}">
                @error('excerpt')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-6">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="thumbnail">
                    {{ __('thumbnail') }}
                </label>
                <input class="w-full p-2 border border-gray-400 rounded" type="file" id="thumbnail" name="thumbnail">
                @error('thumbnail')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            @php
                $options = \App\Models\Category::all();
                $optionName='Categories'
            @endphp
             <div class="my-6">
           <select  name='category_id'
           class="flex-1 appearance-none py-2 pl-3 pr-9 text-sm font-semibold w-full p-2 border border-gray-400 rounded" 
           >
               <option value="{{ $optionName }}" disabled selected>{{ $optionName }}
               </option>
               @foreach ($options as $option)
                   <option 
                   value="{{ $option->id }}" 
                   {{ isset($selectedOption) && $selectedOption->id===$option->id ? 'selected' : '' }}
                       class="{{ isset($selectedOption) && $selectedOption->id===$option->id ? 'bg-blue-500' : ''  }}" >{{ $option->name }}</option>    
               @endforeach
           </select>
        </div>
            <div class="my-6 mx-auto w-40">

                <input class="w-full p-2 border bg-black text-white border-gray-600 rounded hover:bg-slate-900"
                    type="submit" id="submit" name="submit" value="Submit">
            </div>
        </form>
    </section>
    <section class="max-w-4xl mx-auto mt-10">

    </section>
    <x-footer />
</x-layout>
