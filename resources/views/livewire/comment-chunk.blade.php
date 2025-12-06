<div>
    @foreach($comments as $comment)
        <livewire:comment-item :comment="$comment" :key="$comment->id"/>
    @endforeach 
</div>
