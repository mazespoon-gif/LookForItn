<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Theme')] class extends Component {
    //
}; ?>

<section class="w-full ">
    <flux:heading>{{ __('Appearance') }}</flux:heading>
    <flux:subheading>{{ __('Change your theme to light, dark, or system') }}</flux:subheading>

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
    
</section>
