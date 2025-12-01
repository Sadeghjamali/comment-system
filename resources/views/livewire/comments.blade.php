<section class="bg-white dark:bg-gray-900 py-8 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        @auth
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments ({{$comments->count()}})</h2>
            </div>
            <form wire:submit="createComment" class="mb-6">
                <x-input-label for="comment" class="sr-only">Your comment</x-input-label>
                <x-textarea wire:model="form.body" class="w-full" rows="4"
                            placeholder="Write a comment..."></x-textarea>
                <x-input-error :messages="$errors->get('form.body')"/>

                <x-primary-button class="mt-2">
                    Post comment
                </x-primary-button>
            </form>
        @endauth
    </div>
    @if($comments->count())
        @foreach($comments as $comment)
            <livewire:comment-item :comment="$comment" :key="$comment->id"/>
        @endforeach
    @endif
    {{--<div class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
        <header class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                        alt="Michael Gough">Michael Gough</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <time pubdate datetime="2022-02-08"
                          title="February 8th, 2022">Feb. 8, 2022
                    </time>
                </p>
            </div>
        </header>
        <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
        <div class="flex items-center mt-4 space-x-4">
            <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                Edit
            </button>
            <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                Delete
            </button>
        </div>
    </div>--}}
</section>
