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
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-14">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex place-content-between"><p>Post by : {{ $post->user->name }}</p> <p>{{ $post->created_at }}</p></div>
                <br>
                <h1>{{ $post->title }}</h1>
                <br>
                <div class="flex justify-center"><img src="{{ $post->image }}" class="h-[300px] w-auto rounded-xl" /></div>
                <br>
                <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</x-app-layout>