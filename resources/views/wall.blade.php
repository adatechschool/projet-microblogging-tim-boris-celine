<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Wall de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-14">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Biography :</h1>
                    <br/>
                    <p>{{ $user->biography }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-2">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mx-auto px-6 sm:px-12 lg:px-14">
        @foreach($posts as $post)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex place-content-between"><p>Post by : {{ $post->user->name }}</p> <p>{{ $post->created_at }}</p></div>
                <br>
                <div class="flex justify-center"><a href="/posts/{{ $post->id }}"><img src="{{ $post->image }}" class="h-[300px] w-auto rounded-xl" /></a></div>
                <br>
                <h1 class="sm:text-2xl font-semibold">{{ $post->title }}</h1>
                <br>
                <p>{{ $post->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</x-app-layout>