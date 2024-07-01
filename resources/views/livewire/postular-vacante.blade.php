<div class="bg-gray-100 dark:bg-gray-500 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Inscribirme a esta vacante
    </h3>
    <form wire:submit.prevent='inscribirme' class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Currículum vitae (PDF)')"/>
            <x-text-input
                for="cv"
                wire:model="cv"
                type="file"
                accept=".pdf"
                class="block mt-1 w-full"/>
        </div>

        @error('cv')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror

        <x-primary-button class="my-5">
            {{__('Inscribirme')}}
        </x-primary-button>
    </form>
</div>
