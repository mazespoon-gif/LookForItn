<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;
    #[Validate(["required", "string", "max:255"])]
    public string $title = "";

    #[Validate(["required", "string"])]
    public string $description = "";

    #[Validate(["nullable", "string"])]
    public string $location = "";

    #[Validate(["required", "in:lost,found"])]
    public string $status = "lost";

    #[Validate(["nullable", "image", "mimes:jpg,jpeg,png", "max:10240"])]
    public ?TemporaryUploadedFile $image = null;

    public function createPost()
    {
        $validated = $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store("posts");
        }

        Auth::user()
            ->posts()
            ->create([
                "title" => $validated["title"],
                "description" => $validated["description"],
                "location" => $validated["location"],
                "status" => $validated["status"],
                "image" => $imagePath,
            ]);

        $this->reset(["title", "description", "location", "status", "image"]);

        $this->dispatch("flux:toast", message: "Post created successfully!");
        return redirect()->route("dashboard");
    }

    public function removeImage(): void
    {
        $this->image = null;
    }
};
?>

<section class="w-full max-w-2xl mx-auto">
    <flux:heading size="lg">Post your Concern</flux:heading>
    <flux:text>Share something maybe we can help</flux:text>

    <form wire:submit="createPost"  enctype="multipart/form-data" class="mt-6 space-y-6">
        <flux:input
            wire:model="title"
            label="Items"
            placeholder="Bag, Wallet, ID etc."
        />

        <flux:textarea
            wire:model="description"
            label="Description"
            placeholder="Enter detail of Items"
            rows="5"
        />

        <flux:input wire:model="location" label="Where the item was Lost or Found" placeholder="Enter location" />

        <flux:select wire:model="status" label="Status" placeholder="Select status">
            <flux:select.option value="lost">Lost</flux:select.option>
            <flux:select.option value="found">Found</flux:select.option>
        </flux:select>

        @if (!$image)
            <div
                x-data="{ dragover: false }"
                x-on:dragover.prevent="dragover = true"
                x-on:dragleave.prevent="dragover = false"
                x-on:drop.prevent="dragover = false; $el.querySelector('input').files = $event.dataTransfer.files; $el.querySelector('input').dispatchEvent(new Event('change', { bubbles: true }))"
                :class="dragover ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20' : 'border-zinc-300 dark:border-zinc-600'"
                class="border-2 border-dashed rounded-lg p-8 flex flex-col items-center gap-4 transition"
            >
                <label for="imageInput" class="flex flex-col items-center gap-4 cursor-pointer w-full">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.665 3.667H11a3.667 3.667 0 0 0-3.667 3.666v29.334A3.667 3.667 0 0 0 11 40.333h22a3.667 3.667 0 0 0 3.666-3.666v-22m-11-11 11 11m-11-11v11h11m-7.333 9.166H14.665m14.667 7.334H14.665M18.332 16.5h-3.667" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400">You can send only one picture</p>
                    <p class="text-gray-400">Or <span class="text-indigo-500 underline">click</span> to upload</p>
                    <input
                        id="imageInput"
                        type="file"
                        wire:model="image"
                        accept="image/jpeg,image/png,image/jpg"
                        class="hidden"
                    />
                </label>
            </div>
        @else
            <div class="relative block">
                <img src="{{ $image->temporaryUrl() }}" class="h-64 w-full object-cover rounded-lg" />
                <button
                    type="button"
                    wire:click="removeImage"
                    class="absolute top-0 right-0 m-2 bg-red-500 text-white p-2 rounded hover:bg-red-600 transition-colors"
                >
                    <flux:icon name="x-mark" class="size-5" />
                </button>
            </div>
        @endif
        <div class="flex gap-3 ">
            <flux:button type="submit" variant="primary" class="w-full">
                Post
            </flux:button>
            <flux:button :href="route('dashboard')" wire:navigate variant="outline">
                Cancel
            </flux:button>
        </div>
    </form>
</section>
