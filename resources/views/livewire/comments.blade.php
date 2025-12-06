{{-- <div class="bg-white dark:bg-gray-900 py-8 antialiased"> --}}
    <div class="max-w-2xl mx-auto px-4">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                Comments ({{ $this->commentsCount }})</h2>
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


        @if(count($this->chunks))
            @for ($chunk = 0; $chunk < $page;$chunk++)
                <div wire:key="chunk-{{ $chunk }}">
                    <livewire:comment-chunk :ids="$chunks[$chunk]" wire:key="chunk-{{
                    md5(json_encode($this->chunks[$chunk]) )}}"/>  
                </div>
            @endfor
            @if ($this->hasMorePages())
                <div class="mt-8 flex items-center justify-center">
                    <x-secondary-button wire:click='loadMore'>
                        Load More
                    </x-secondary-button>
                </div>
            @endif
        @endif
    </div>
    
{{-- </div> --}}
