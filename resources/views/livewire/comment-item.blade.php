<div
    x-data="{replying : false}"
    x-on:replied.window="replying = false">

    <article wire:key="{{$comment->id}}"
             class="border-b border-gray-200 last:border-b-0 p-6 text-base bg-white rounded-lg dark:bg-gray-900">
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
            @can('reply',$comment)
                <button type="button" x-on:click=" replying= true"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                Reply
            </button>
            @endcan
            
            <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                Edit
            </button>
            <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                Delete
            </button>
        </div>

        <template x-if="replying">
            <form wire:submit="reply" class="mb-6 mt-2">
                <x-input-label for="reply" class="sr-only">Your reply</x-input-label>
                <x-textarea wire:model="replyForm.body" class="w-full" rows="3"
                            placeholder="Write a reply..."></x-textarea>
                <x-input-error :messages="$errors->get('replyForm.body')"/>

                <div class="flex items-center space-x-2 mt-2">
                    <x-primary-button>
                        Reply
                    </x-primary-button>

                    <button x-on:click="replying = false">Cancel</button>
                </div>
            </form>
        </template>

        <div class="ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
            @if(is_null($comment->parent_id) && $comment->children()->count())
                @foreach($comment->children as $child)
                    <livewire:commen-titem :comment="$child" :key="$child->id"/>
                    {{--<div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                            Edit
                        </button>
                        <button type="button"
                                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                            Delete
                        </button>
                    </div>--}}
                @endforeach
            @endif
        </div>
    </article>


</div>
