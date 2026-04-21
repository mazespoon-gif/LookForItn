<x-layouts::app :title="__('Manage Claims')">
    <div class="space-y-6">
        <flux:heading size="lg">Pending Claims</flux:heading>
        <flux:text>Review and verify claims for your lost items.</flux:text>
    </div>

    @forelse($claims as $claim)
    <div
        class="w-full px-3 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-200 mb-4"
    >
        <div class="flex items-start justify-between mb-3">
            <div class="flex items-center space-x-3">
                <flux:avatar :name="$claim->user->name" class="flex-shrink-0" />
                <div class="min-w-0 flex-1">
                    <div class="flex items-center space-x-1">
                        <p class="font-bold text-gray-900 dark:text-white">
                            {{ $claim->user->name }}
                        </p>
                    </div>
                    <p class="text-gray-500 dark:text-zinc-400 text-sm">
                        {{ $claim->user->email }}
                    </p>
                </div>
            </div>
            @php
                $statusColor = match($claim->status) {
                    'pending' => 'yellow',
                    'approved' => 'green',
                    'rejected' => 'red',
                    default => 'gray'
                };
            @endphp
            <flux:badge color="{{ $statusColor }}" class="text-xs">
                {{ ucfirst($claim->status) }}
            </flux:badge>
        </div>

        <div class="mb-2">
            <h2 class="font-bold text-gray-900 dark:text-white">
                Claiming: {{ $claim->post->title }}
            </h2>
        </div>

        <div class="mb-2">
            <flux:badge color="lime">
                <flux:icon.map-pin class="size-4" />
                {{ $claim->post->location }}
            </flux:badge>
        </div>

        <div class="mb-3 p-3 bg-gray-50 dark:bg-zinc-700 rounded-md">
            <p class="text-sm font-semibold text-gray-700 dark:text-zinc-300 mb-2">Claim Answers:</p>
            <p class="text-gray-600 dark:text-zinc-400 whitespace-pre-wrap">{{ $claim->answers }}</p>
        </div>

        <div class="text-gray-500 dark:text-zinc-400 text-xs mb-3">
            Submitted: {{ $claim->created_at->format('g:i A · M d, Y') }}
        </div>

        @if($claim->status === 'pending')
        <div class="flex gap-2">
            <flux:button variant="primary" color="green">
                Pending Owner Review
            </flux:button>
        </div>
        @endif
    </div>
    @empty
    <div class="text-center py-8 text-gray-500 dark:text-zinc-400">
        No pending claims for your posts.
    </div>
    @endforelse
</x-layouts::app>
