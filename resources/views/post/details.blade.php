<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-14">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex place-content-between"><p>Post by : <a href="/wall/{{$post->user_id}}" class="text-blue-600 visited:text-purple-600">{{ $post->user->name }}</a></p> <p>{{ $post->created_at }}</p></div>
                <br>
                <div class="flex justify-center"><img src="{{ $post->image }}" class="h-[300px] w-auto rounded-xl" /></div>
                <br>
                <h1 class="sm:text-2xl font-semibold">{{ $post->title }}</h1>
                <br>
                <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>