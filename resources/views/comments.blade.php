<x-layouts::app :title="__('Comments - ' . $post->title)">
    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <flux:button href="{{ route('dashboard') }}" wire:navigate variant="ghost">
                <flux:icon.arrow-left class="size-4" />
                Back to Dashboard
            </flux:button>
        </div>

        <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm mb-4">
            <h2 class="font-bold text-xl text-gray-900 dark:text-white mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700 dark:text-zinc-300">{{ $post->description }}</p>
            <div class="mt-2 flex items-center gap-2 text-sm text-gray-500">
                <flux:badge color="lime">
                    <flux:icon.map-pin class="size-4 mr-1" />
                    {{ $post->location }}
                </flux:badge>
                <flux:badge color="{{ $post->status === 'found' ? 'blue' : 'red' }}">
                    {{ ucfirst($post->status) }}
                </flux:badge>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm">
            <flux:heading size="lg" class="mb-4">Comments {{ $comments->total() }}</flux:heading>

            <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-6 space-y-3" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
                @csrf
                <flux:textarea name="body" rows="3" placeholder="Write a comment..."  />
                <flux:button type="submit" variant="filled">Post Comment</flux:button>
            </form>

            <div class="space-y-4">
                @forelse($comments as $comment)
                <div class="flex gap-3 p-3 bg-gray-50 dark:bg-zinc-700 rounded-lg">
                    <flux:avatar :name="$comment->user->name" class="flex-shrink-0" />
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-sm">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            @if(Auth::id() === $comment->user_id)
                            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <flux:button type="submit" variant="ghost" size="xs" class="text-red-500 hover:text-red-400">
                                    <flux:icon.trash class="size-4" />
                                </flux:button>
                            </form>
                            @endif
                        </div>
                        <p class="text-sm text-gray-700 dark:text-zinc-300 mt-1">{{ $comment->body }}</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No comments yet. Be the first to comment!</p>
                @endforelse
            </div>

            <div class="mt-4">{{ $comments->links() }}</div>
        </div>
    </div>
</x-layouts::app>
