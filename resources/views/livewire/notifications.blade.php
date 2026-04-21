<div wire:poll.5000ms="loadNotifications">
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="lg">Notifications</flux:heading>
                <flux:text>View your claim status updates.</flux:text>
            </div>
            @if($unreadCount > 0)
            <flux:button wire:click="markAllAsRead" variant="filled" size="sm">
                Mark all as read
            </flux:button>
            @endif
        </div>

        @forelse($notifications as $notification)
        <div
            class="w-full px-3 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-200 mb-4 {{ $notification->read_at ? 'opacity-60' : '' }}"
        >
            <div class="flex items-start justify-between mb-2">
                <div class="flex-1">
                    <p class="text-gray-900 dark:text-white font-medium mb-1">
                        {{ $notification->message }}
                    </p>
                    @if($notification->post)
                    <p class="text-sm text-gray-500 dark:text-zinc-400">
                        Item: <span class="font-semibold">{{ $notification->post->title }}</span>
                    </p>
                    @if($notification->type === 'claim_approved')
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $notification->post->user->email }}" target="_blank" class="text-blue-500 hover:underline text-sm">
                        Contact Owner →
                    </a>
                    @endif
                    @endif
                </div>
                <div class="flex items-center gap-2">
                    @if(!$notification->read_at)
                    <flux:badge color="blue" class="text-xs">New</flux:badge>
                    @endif
                    <flux:button wire:click="deleteNotification({{ $notification->id }})" variant="ghost" size="xs" class="text-red-500 hover:text-red-400" title="Delete">
                        <flux:icon.trash class="w-4 h-4" />
                    </flux:button>
                </div>
            </div>
            <div class="text-gray-500 dark:text-zinc-400 text-xs">
                {{ $notification->created_at->diffForHumans() }}
            </div>
        </div>
        @empty
        <div class="text-center py-8 text-gray-500 dark:text-zinc-400">
            No notifications yet.
        </div>
        @endforelse
    </div>
</div>
