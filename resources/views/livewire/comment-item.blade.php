<article wire:key="{{$comment->id}}" class="border-b border-gray-100 last:border-b-0 p-6 text-base bg-white rounded-lg dark:bg-gray-900">
    <header class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                <img
                    class="mr-2 w-6 h-6 rounded-full"
                    src="{{asset('portfolio_sandroid.jpg')}}"
                    alt="Michael Gough">{{$this->comment->user->name}}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <time pubdate datetime="2022-02-08"
                      title="February 8th, 2022">{{$this->comment->created_at->diffForHumans()}}</time>
            </p>
        </div>
    </header>
    <p class="text-gray-500 dark:text-gray-400">{{$this->comment->body}}</p>


    <div class="flex items-center mt-4 space-x-4">
        <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
            Reply
        </button>
        <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
            Edit
        </button>
        <button type="button"
                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
            Delete
        </button>
    </div>
</article>
