<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
            @foreach ($posts as $post)
                <div class="bg-white dark:bg-gray-800 shadow-md sm:basis-1/2 md:basis-1/4 sm:rounded-lg w-full flex flex-col">
                    <div class="relative h-16 align-middle">
                        <h3
                            class="font-semibold text-xl w-full overflow-hidden  text-ellipsis whitespace-nowrap hover:overflow-visible hover:whitespace-normal hover:absolute hover:top-0 bg-white sm:rounded-t-lg p-3">
                            {{ $post->title }}
                        </h3>
                    </div>

                    <a href="/posts/{{ $post->id }}">
                        <img src={{ $post->image }} alt="" class="w-full"></a>
                    <div class="p-2 w-full grow flex flex-col">
                        <p class="grow mb-2">
                            {{$post->content}}
                        </p>
                        <div>
                            Par : <a href="/wall"
                                class="text-blue-600 visited:text-purple-600">{{ $post->user->name }}</a>
                        </div>
                        <p class="text-right">{{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
