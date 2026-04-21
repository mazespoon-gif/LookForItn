<div wire:poll.5000ms>
<div class="flex gap-2 mb-4">
    <flux:button wire:click="setFilter('all')" variant="{{ $filter === 'all' ? 'primary' : 'ghost' }}" size="sm">All</flux:button>
    <flux:button wire:click="setFilter('lost')" variant="{{ $filter === 'lost' ? 'primary' : 'ghost' }}" size="sm">Lost</flux:button>
    <flux:button wire:click="setFilter('found')" variant="{{ $filter === 'found' ? 'primary' : 'ghost' }}" size="sm">Found</flux:button>
</div>
@forelse($posts as $post)
<div
    class="w-full px-3 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm hover:shadow-md transition-shadow duration-200 mb-4"
>
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center space-x-3">
            <flux:avatar :name="$post->user->name" class="flex-shrink-0" />
            <div class="min-w-0 flex-1">
                <div class="flex items-center space-x-1">
                    <p
                        class="font-bold text-gray-900 dark:text-white hover:underline truncate"
                    >
                        {{ $post->user->name }}
                    </p>
                    <svg
                        class="w-4 h-4 text-blue-500 flex-shrink-0"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"
                        />
                    </svg>
                </div>
                <p class="text-gray-500 dark:text-zinc-400 text-sm">
                    {{ $post->user->email }}
                </p>
            </div>
        </div>
        <flux:dropdown offset="-15" gap="2">
            <flux:button
                icon="ellipsis-horizontal"
                variant="ghost"
                size="sm"
                class="text-blue-400 hover:text-blue-600"
            />

            <flux:menu>
                @if(Auth::check() && Auth::id() === $post->user_id)
                <flux:menu.item
                    icon="pencil"
                    :href="route('posts.edit', $post)"
                    wire:navigate
                >
                    Edit
                </flux:menu.item>
                <flux:modal.trigger name="delete-post-{{ $post->id }}">
                    <flux:menu.item
                        icon="trash"
                        class="w-full cursor-pointer text-red-500 hover:text-red-400"
                    >
                        Delete
                    </flux:menu.item>
                </flux:modal.trigger>
                @else
                <flux:menu.item icon="eye" disabled>
                    View Only
                </flux:menu.item>
                @endif
            </flux:menu>
        </flux:dropdown>
    </div>

    <div class="mb-2">
        <h2 class="font-bold text-gray-900 dark:text-white">
            {{ $post->title }}
        </h2>
    </div>
    <div class="mb-2 flex">
        <flux:badge color="lime">
        <flux:icon.map-pin class="size-4" />
        <h3>
            {{ $post->location }}
        </h3>
        </flux:badge>
    </div>

    <div class="mb-3">
        <p class="text-gray-700 dark:text-zinc-300">
            {{ $post->description }}
        </p>
    </div>

    @if($post->image)
    <div class="mb-3">
        <div
            class="rounded-xl overflow-hidden border border-gray-200 dark:border-zinc-600"
        >
            <img
                src="{{ 'https://uchrsyhiaafsioyhvypx.supabase.co/storage/v1/object/public/lookforit/' . $post->image }}"
                alt="{{ $post->title }}"
                class="w-full h-auto object-cover"
                onerror="this.style.display='none'"
            />
        </div>
    </div>
    @endif
    <hr>
    <div class="w-full flex justify-between items-center mt-1">
        <div class="text-gray-500 dark:text-zinc-400 text-xs p-1">
            {{ $post->created_at->format('g:i A · M d, Y') }}
        </div>
        <div>
            @php
                $statusColor = match($post->status) {
                    'lost' => 'red',
                    'found' => 'blue',
                    'pending' => 'yellow',
                    'returned' => 'green',
                    default => 'gray'
                };
            @endphp
            <flux:badge color="{{ $statusColor }}" class="text-xs">
                {{ ucfirst($post->status) }}
            </flux:badge>
        </div>
    </div>
    <div class="w-full mt-2">
        @if($post->status === 'lost')
            <flux:button variant="primary" class="w-full" color="rose" href="{{ route('comments.index', $post) }}" wire:navigate>
                <flux:icon.chat-bubble-bottom-center-text class="w-4 h-4 mr-1" />Comment {{ $post->comments_count }}
            </flux:button>
        @elseif($post->status === 'found')
            @auth
                @if(Auth::id() !== $post->user_id && !$post->pendingClaim)
                    <flux:modal.trigger name="claim-item-{{ $post->id }}">
                        <flux:button variant="primary" class="w-full" color="blue">
                            <flux:icon.hand-raised class="w-4 h-4 mr-1" />Claim Item
                        </flux:button>
                    </flux:modal.trigger>
                @elseif($post->pendingClaim)
                    <flux:button variant="primary" class="w-full" color="yellow" disabled>
                        <flux:icon.clock class="w-4 h-4 mr-1" />Claim Pending
                    </flux:button>
                @endif
            @endauth
        @elseif(in_array($post->status, ['pending', 'returned']))
            <flux:button variant="primary" class="w-full" color="gray" disabled>
                <flux:icon.check-circle class="w-4 h-4 mr-1" /> {{ $post->status === 'returned' ? 'Returned' : 'Processing' }}
            </flux:button>
        @endif
    </div>

    @if(Auth::check() && Auth::id() === $post->user_id && $post->claims->count() > 0)
    <div class="mt-3 pt-3 border-t border-gray-200 dark:border-zinc-700">
        <div x-data="{ expanded: false }">
            <button
                type="button"
                x-on:click="expanded = !expanded"
                class="flex items-center justify-between w-full text-sm font-medium text-gray-600 dark:text-zinc-400 hover:text-gray-900 dark:hover:text-white"
            >
                <span>Claims {{ $post->claims->count() }}</span>
                <flux:icon.chevron-down x-show="!expanded" class="w-4 h-4" />
                <flux:icon.chevron-up x-show="expanded" x-cloak class="w-4 h-4" />
            </button>
            <div x-show="expanded" x-cloak class="mt-2 space-y-2">
                @foreach($post->claims as $claim)
                <div class="p-2 bg-gray-50 dark:bg-zinc-700 rounded-md text-sm">
                    <div class="flex items-center justify-between mb-1">
                        <span class="font-medium text-gray-900 dark:text-white">{{ $claim->user->name }}</span>
                        @php
                            $claimStatusColor = match($claim->status) {
                                'pending' => 'yellow',
                                'approved' => 'green',
                                'rejected' => 'red',
                                default => 'gray'
                            };
                        @endphp
                        <flux:badge color="{{ $claimStatusColor }}" class="text-xs">{{ ucfirst($claim->status) }}</flux:badge>
                    </div>
                    <p class="text-gray-600 dark:text-zinc-400 text-xs whitespace-pre-wrap">{{ $claim->answers }}</p>
                    @if($claim->status === 'pending')
                    <div class="flex gap-2 mt-2">
                        <flux:button size="xs" variant="primary" color="green" wire:click="approveClaim({{ $claim->id }})">
                            Approve
                        </flux:button>
                        <flux:button size="xs" variant="danger" wire:click="rejectClaim({{ $claim->id }})">
                           Reject
                        </flux:button>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@empty
<div class="text-center py-8 text-gray-500 dark:text-zinc-400">
    No posts yet.
</div>
@endforelse

@foreach($posts as $post)
@if($post->user_id === Auth::id())
<flux:modal name="delete-post-{{ $post->id }}" class="min-w-[22rem]">
    <div x-data="{ loading: false }">
        <form
            method="POST"
            action="{{ route('posts.destroy', $post) }}"
            x-on:submit="loading = true"
        >
            @csrf @method('DELETE')
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete post?</flux:heading>
                    <flux:text class="mt-2"
                        >This action cannot be reversed.</flux:text
                    >
                </div>
                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button
                            variant="ghost"
                            x-bind:disabled="loading"
                            >Cancel</flux:button
                        >
                    </flux:modal.close>
                    <flux:button
                        type="submit"
                        variant="danger"
                        x-bind:disabled="loading"
                        x-bind:class="loading ? 'opacity-50 cursor-not-allowed' : ''"
                    >
                        <span x-show="!loading">Delete</span>
                        <span x-show="loading" x-cloak>Deleting...</span>
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</flux:modal>
@endif

@if($post->status === 'found' && Auth::check() && Auth::id() !== $post->user_id && !$post->pendingClaim)
<flux:modal name="claim-item-{{ $post->id }}" class="min-w-[22rem]">
    <div x-data="{ loading: false }">
        <form
            method="POST"
            action="{{ route('claims.store', $post) }}"
            x-on:submit="loading = true"
        >
            @csrf
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Claim Item</flux:heading>
                    <flux:text class="mt-2">
                        Please provide verification details to claim this item.
                    </flux:text>
                </div>
                <div>
                    <flux:field>
                        <flux:label>Description of Item</flux:label>
                        <flux:textarea
                            name="description"
                            placeholder="Describe the item in detail..."
                            rows="3"
                            required
                        />
                    </flux:field>
                </div>
                <div>
                    <flux:field>
                        <flux:label>Identify</flux:label>
                        <flux:input
                            name="identifiers"
                            placeholder="prove your claim here"
                            required
                        />
                    </flux:field>
                </div>
                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button
                            variant="ghost"
                            x-bind:disabled="loading"
                            >Cancel</flux:button
                        >
                    </flux:modal.close>
                    <flux:button
                        type="submit"
                        variant="primary"
                        color="blue"
                        x-bind:disabled="loading"
                        x-bind:class="loading ? 'opacity-50 cursor-not-allowed' : ''"
                    >
                        <span x-show="!loading">Submit Claim</span>
                        <span x-show="loading" x-cloak>Submitting...</span>
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</flux:modal>
@endif
@endforeach

<div class="mt-4 w-full">

      <flux:pagination :paginator="$posts" />
</div>
</div>
