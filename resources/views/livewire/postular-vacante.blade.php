<div class="bg-gray-100 dark:bg-gray-500 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Inscribirme a esta vacante
    </h3>
    @if (session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>
        {{-- <livewire:mostrar-alerta :message="session('mensaje')"
        class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm" />
        ESTA OPCIÓN FUNCIONA PERO HAY QUE VER COMO CAMBIARLE LOS ESTILOS--}}
    @elseif (session()->has('error'))
        <p class="uppercase border border-red-600 bg-red-100 text-red-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('error') }}
        </p>
    @else
        <form wire:submit.prevent='inscribirme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Currículum vitae (PDF)')" />
                <x-text-input for="cv" wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-primary-button class="my-5 w-full justify-center" wire:loading.attr="disabled">
                {{__('Inscribirme')}}
                <div wire:loading
                    wire:target="inscribirme"
                    class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid border-current
                            border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]"
                    role="status"></div>
            </x-primary-button>
        </form>
    @endif
    
</div>
