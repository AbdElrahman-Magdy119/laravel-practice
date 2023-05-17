
<div>
    <form wire:submit.prevent="addComment">
        <input type="text" wire:model="comment">
        <button type="submit">Add Comment</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment['body'] }}</li>
        @endforeach
    </ul>
</div>