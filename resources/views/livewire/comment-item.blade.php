<div>
    @if (!$deleted)
    <div class="border-b-2 border-gray-200 last:border-b-0 "
            x-data="{replying:false , editing:false}"
            x-on:replied.window="replying = false" 
            x-on:edited.window="editing = false">

        <div wire:key="{{$comment->id}}" class="p-6 text-base dark:bg-gray-900">
            <header class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                        <img class="mr-2 w-6 h-6 rounded-full" src="{{$comment->user->avatar()}}"
                            alt="{{ $comment->user->name }}">{{ $comment->user->name }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time pubdate x-human-date datetime="{{ $comment->created_at->toDateTimeString() }}"
                            title="{{ $comment->created_at }}">
                            {{ $comment->created_at->diffForHumans() }}
                        </time>
                    </p>
                </div>
            </header>
            <p class="text-gray-500 dark:text-gray-400">{{$comment->body}}</p>

            <div class="flex items-center mt-4 space-x-4">
                @can('reply',$comment)
                <button type="button" x-on:click=" replying= true"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                    Reply
                </button>
                @endcan

                @can('edit',$comment)
                <button type="button" x-on:click="editing = true"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                    Edit
                </button>
                @endcan

                @can('delete',$comment)
                <button type="button" x-on:click="if(window.confirm('are you sure?')){
                        $wire.delete()
                    }" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                    Delete
                </button>
                @endcan

            </div>

            <template x-if="replying">
                @auth
                <form wire:submit="reply" class="mb-6 mt-2">
                    <x-input-label for="reply" class="sr-only">Your reply</x-input-label>
                    <x-textarea wire:model="replyForm.body" class="w-full" rows="3" placeholder="Write a reply...">
                    </x-textarea>
                    <x-input-error :messages="$errors->get('replyForm.body')" />

                    <div class="flex items-center space-x-2 mt-2">
                        <x-primary-button>
                            Reply
                        </x-primary-button>

                        <button x-on:click="replying = false">Cancel</button>
                    </div>
                </form>
                @endauth
            </template>

            <template x-if="editing">
                <form wire:submit="edit" class="mb-6 mt-2">
                    <x-input-label for="edit" class="sr-only">Your edit</x-input-label>
                    <x-textarea wire:model="editForm.body" class="w-full" rows="3" placeholder="Write a edit...">
                    </x-textarea>
                    <x-input-error :messages="$errors->get('editForm.body')" />

                    <div class="flex items-center space-x-2 mt-2">
                        <x-primary-button>
                            Edit
                        </x-primary-button>

                        <button x-on:click="editing = false">Cancel</button>
                    </div>
                </form>
            </template>


        </div>

        <div class="ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
            @if(is_null($comment->parent_id) && $comment->children()->count())
            @foreach($comment->children as $child)
            <livewire:commen-titem :comment="$child" :key="$child->id" />
            @endforeach
            @endif
        </div>
    </div>
    @endif
</div>