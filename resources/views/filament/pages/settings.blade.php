<x-filament-panels::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}




        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between mt-6">
            @if($this->data['current_logo_url'] ?? false)
            <x-filament::button
                type="button"
                color="danger"
                wire:click="removeLogo"
                icon="heroicon-o-trash"
                class="w-full sm:w-auto">
                RESET FORM
            </x-filament::button>
            @endif

            <div class="flex flex-col gap-4 sm:flex-row sm:gap-4 w-full sm:w-auto">
                <x-filament::button
                    type="submit"
                    color="primary"
                    icon="heroicon-o-check"
                    class="w-full sm:w-auto">
                    SAVE CHANGES
                </x-filament::button>
            </div>
        </div>
    </form>
</x-filament-panels::page>