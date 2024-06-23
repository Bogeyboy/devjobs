<form action="" class="md:w1/2 space-y-4" wire:submit.prevent='editarVacante' novalidate>
    {{-- Titulo de la vacante --}}
    <div>
        <x-input-label for="titulo" :value="__('Titulo de la vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" {{-- name="titulo" --}} wire:model="titulo"
            :value="old('titulo')" placeholder="Titulo de la vacante" />

        @error('titulo')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Salario mensual --}}
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <x-select id="salario" wire:model="salario" type="select" {{-- required --}}>
            <option value="">-- Selecciona un rango salarial --</option>
            @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </x-select>
        @error('salario')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Categoria --}}
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <x-select id="categoria" wire:model="categoria" type="select" required>
            <option value="">-- Selecciona una categoria --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </x-select>
        @error('categoria')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Empresa --}}
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" wire:model="empresa" type="text" :value="old('empresa')"
            placeholder="Nombre de la empresa" />
        {{--
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" /> --}}
        @error('empresa')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Último día para presentar candidaturas --}}
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para las candidaturas')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" wire:model="ultimo_dia" type="date"
            :value="old('empresa')" />
        @error('ultimo_dia')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Descripción del puesto de trabajo --}}
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea id="descripcion"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                        dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-75"
            wire:model="descripcion" placeholder="Descripción general del puesto de trabajo">
        </textarea>
        @error('descripcion')
        {{-- {{$message}} --}}
        <livewire:mostrar-alerta :message="$message" />{{-- </livewire:mostrar-alerta> --}}
        @enderror
    </div>

    {{-- Imagen de la vacante --}}

    <div class="my-5-w-96">
        <x-input-label :value="__('Imagen actual de la vacante')" />
        
        <x-text-input
            id="imagen"
            class="block mt-1 w-full"
            type="file"
            wire:model="imagen_nueva"
            accept="image/*" />

        {{-- Imagen actual --}}
        <div class="my-5 w-96">
            <img
                src="{{ asset('storage/vacantes') . '/' . $imagen }}"
                alt="{{ 'Imagen vacante ' . $titulo }}" />
        </div>

        {{-- Imagen nueva --}}
        <div class="my-5 w-96">
            @if ($imagen_nueva)
            Imagen nueva:
            <img
                src="{{ $imagen_nueva->temporaryUrl() }}" />
            @endif
        </div>
        
        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Botón de confirmación --}}
    <x-primary-button class="w-full justify-center">
        {{ __('Guardar cambios') }}
    </x-primary-button>
</form>