    <div class='grid grid-cols-2 sm:grid-cols-3 items-center gap-8 sm:gap-16 mt-7 px-4'>
            <div class='flex items-center gap-2'>
                <div class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"></span>
                    <span class="relative inline-flex size-1.5 rounded-full bg-indigo-50"></span>
                </div>
                <p class="text-sm text-center text-zinc-600">Lost Something on Campus?</p>
            </div>
            <div class='flex items-center gap-2'>
                <div class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"></span>
                    <span class="relative inline-flex size-1.5 rounded-full bg-indigo-50"></span>
                </div>
                <p class="text-sm text-center text-zinc-600">Found an Item? Share It Here</p>
            </div>
            <div class='flex items-center gap-2 col-span-2 sm:col-span-1 justify-center sm:justify-start'>
                <div class="relative flex size-2.5 rounded-full items-center justify-center bg-indigo-600">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-indigo-700 opacity-75 animate-ping duration-300"></span>
                    <span class="relative inline-flex size-1.5 rounded-full bg-indigo-50"></span>
                </div>
                <p class="text-sm text-center text-zinc-600">Helping Each Other Matters</p>
            </div>
    </div>

    the second paragraph
     Designed to help students efficiently report lost belongings, discover found items, and retrieve safe and reliable item recovery across the campus.

     Lost something let this website help you find it


         <h1>Hello</h1>
    <h2>{{ $email }}</h2>
    <p>Please click the button below to verify your email address.</p>
    <a href="{{ $url }}">Verify Email Address</a>

    <div class="mt-6">
        <flux:radio.group x-data variant="cards" x-model="$flux.appearance" class="grid-cols-3">
            <flux:radio value="light" class="flex flex-col items-center gap-3 py-4">
                <div class="w-32 h-24 rounded-lg border-2 border-zinc-200 dark:border-zinc-700 flex items-center justify-center">
                    <flux:icon name="sun" class="w-8 h-8 text-yellow-500" />
                </div>
                <flux:heading size="lg">{{ __('Light') }}</flux:heading>
            </flux:radio>
            <flux:radio value="dark" class="flex flex-col items-center gap-3 py-4">
                <div class="w-32 h-24 rounded-lg border-2 border-zinc-700 flex items-center justify-center">
                    <flux:icon name="moon" class="w-8 h-8 text-zinc-600 dark:text-zinc-300" />
                </div>
                <flux:heading size="lg">{{ __('Dark') }}</flux:heading>
            </flux:radio>
            <flux:radio value="system" class="flex flex-col items-center gap-3 py-4">
                <div class="w-32 h-24 rounded-lg border-2 border-zinc-300 dark:border-zinc-600 flex items-center justify-center">
                    <flux:icon name="computer-desktop" class="w-8 h-8 text-zinc-600 dark:text-zinc-300" />
                </div>
                <flux:heading size="lg">{{ __('System') }}</flux:heading>
            </flux:radio>
        </flux:radio.group>
    </div>

my second note in the theme sidebar hehe
    <div class="mt-6 w-full flex justify-center">
        <flux:radio.group x-data variant="cards" x-model="$flux.appearance" class="grid grid-cols-3 sm:grid-cols-3 gap-3 w-full sm:w-auto">
            <flux:radio value="light" class="flex flex-col items-center gap-3 py-6 justify-center w-full sm:w-64">
                <flux:icon name="sun" class="w-16 h-16 text-yellow-500" />
                <flux:heading size="lg">{{ __('Light') }}</flux:heading>
            </flux:radio>
            <flux:radio value="dark" class="flex flex-col items-center gap-3 py-6 justify-center w-full sm:w-64">
                <flux:icon name="moon" class="w-16 h-16 text-zinc-600 dark:text-zinc-300" />
                <flux:heading size="lg">{{ __('Dark') }}</flux:heading>
            </flux:radio>
            <flux:radio value="system" class="flex flex-col items-center gap-3 py-6 justify-center w-full sm:w-64">
                <flux:icon name="computer-desktop" class="w-16 h-16 text-zinc-600 dark:text-zinc-300" />
                <flux:heading size="lg">{{ __('System') }}</flux:heading>
            </flux:radio>
        </flux:radio.group>
    </div>

<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
    
    
The avatar part area default is here 
                    <a href="#" target="_blank" rel="noopener noreferrer" class="flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=200" alt="" class="w-12 h-12 rounded-full object-cover border border-gray-200 dark:border-zinc-600" />
                    </a>
hello world
<flux:sidebar.item icon="plus"  :href="route('posts.create')" :current="request()->routeIs('posts.create')" wire:navigate>
                        {{ __('Create Post') }}
</flux:sidebar.item>
border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900
