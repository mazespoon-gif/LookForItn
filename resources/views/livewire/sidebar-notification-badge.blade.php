<span wire:poll.5000ms="loadUnreadCount">
    @if($unreadCount > 0)
    <span class="ml-auto text-xs font-bold text-red-500">
        {{ $unreadCount }}
    </span>
    @endif
</span>
