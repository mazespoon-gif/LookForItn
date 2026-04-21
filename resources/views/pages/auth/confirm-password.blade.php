<x-layouts::auth :title="__('Confirm password')" :hideLogo="true">
    <div class="flex flex-col gap-6 border border-zinc-200 dark:border-zinc-800 px-4 p-3 rounded-xl bg-white dark:bg-zinc-900 shadow-sm">
        <div class="flex flex-col gap-6">
            <x-auth-header
                :title="__('Confirm password')"
                :description="__('This is a secure area of the application. Please confirm your password before continuing.')"
            />

            <x-auth-session-status class="text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-6">
                @csrf

                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                />

                <flux:button variant="primary" type="submit" class="w-full" data-test="confirm-password-button">
                    {{ __('Confirm') }}
                </flux:button>
                <flux:button :href="route('dashboard')" wire:navigate variant="outline">
                    Cancel
                </flux:button>
            </form>
        </div>
    </div>
</x-layouts::auth>
