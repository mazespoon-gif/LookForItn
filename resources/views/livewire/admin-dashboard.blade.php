<div wire:poll.5000ms>
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Admin Dashboard</flux:heading>
            <flux:text>System overview and user management.</flux:text>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm">
                <div class="text-sm text-gray-500 dark:text-zinc-400 mb-1">Total Lost Items</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['lostItems'] }}</div>
            </div>
            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm">
                <div class="text-sm text-gray-500 dark:text-zinc-400 mb-1">Total Found Items</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['foundItems'] }}</div>
            </div>
            <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm">
                <div class="text-sm text-gray-500 dark:text-zinc-400 mb-1">Total Users</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['totalUsers'] }}</div>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-md p-4 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <flux:heading size="md">Users</flux:heading>
                <div class="w-64">
                    <flux:input 
                        wire:model.live="search" 
                        placeholder="Search by name or email..." 
                        icon="magnifying-glass"
                    />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-zinc-700">
                            <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600 dark:text-zinc-400">Name</th>
                            <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600 dark:text-zinc-400">Email</th>
                            <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600 dark:text-zinc-400">Date Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="border-b border-gray-100 dark:border-zinc-700/50">
                            <td class="py-3 px-2 text-gray-900 dark:text-white">{{ $user->name }}</td>
                            <td class="py-3 px-2 text-gray-600 dark:text-zinc-400">{{ $user->email }}</td>
                            <td class="py-3 px-2 text-gray-500 dark:text-zinc-400 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-8 text-center text-gray-500 dark:text-zinc-400">
                                No users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
