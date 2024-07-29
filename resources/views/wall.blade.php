<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Wall de {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Biography :</h1>
                    <br/>
                    <p>{{ Auth::user()->biography }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @foreach($posts as $post)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex place-content-between"><p>Post : {{ $post->id }}</p> <p>Le : {{ $post->created_at }}</p></div>
                <p>{{ $post->title }}</p>
                <img src="{{ $post->image }}" class="h-[200px] w-auto" />
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</x-app-layout>