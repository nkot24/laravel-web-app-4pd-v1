<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All comments') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="post-list">
                       
                        <ul>
                            
                        @foreach ($comments as $comment)
                        <div>
                            <h3>by {{ $comment->user->name }}</h3>
                            <a href="{{ route('posts.show', $comment->post_id) }}">
                                        {{ $comment->content }}
                                    </a>
                                    <div class="min-w-fit min-h-fit my-3">
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post" >
                                            @csrf
                                            @method('delete')
                                            
                                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                        </div>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>