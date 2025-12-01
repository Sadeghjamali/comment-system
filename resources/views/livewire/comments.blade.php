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
</section>
