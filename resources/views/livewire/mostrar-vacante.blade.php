<div class="p-10">
    <div class="mb-5 dark:text-gray-100 text-gray-800">
        {{-- Titulo de la orferta --}}
        <h3 class="font-bold text-3xl  my-3">
            {{ $vacante->titulo }}
        </h3>
        {{-- Información de la oferta --}}
        <div class="md:grid md:grid-cols-2 bg-gray-100 dark:bg-gray-500 p-4 my-10 rounded-lg">
            {{-- Empresa --}}
            <p class="font-bold text-sm uppercase dark:text-gray-100 text-gray-800 my-3">
                Empresa :
                <span class="normal-case font-normal">
                    {{$vacante->empresa}}
                </span>
            </p>
            {{-- Último día para inscribirse --}}
            <p class="font-bold text-sm uppercase dark:text-gray-100 text-gray-800 my-3">
                Último día para inscribirse:
                <span class="normal-case font-normal">
                    {{$vacante->ultimo_dia->format('d/m/Y')}}
                </span>
            </p>
            {{-- Categoria --}}
            <p class="font-bold text-sm uppercase dark:text-gray-100 text-gray-800 my-3">
                Categoria:
                <span class="normal-case font-normal">
                    {{$vacante->categoria->categoria}}
                </span>
            </p>
            {{-- Salario --}}
            <p class="font-bold text-sm uppercase dark:text-gray-100 text-gray-800 my-3">
                Salario:
                <span class="normal-case font-normal">
                    {{$vacante->salario->salario}}
                </span>
            </p>
        </div>
    </div>
    {{-- Imagen de la vacante y descripción del puesto --}}
    <div class="md:grid md:grid-cols-6 gap-4">
        {{-- Imagen de la vacante --}}
        <div class="md:col-span-2">
            <img
                src="{{ asset('storage/vacantes') . '/' . $vacante->imagen }}"
                alt="{{ 'Imagen vacante ' . $vacante->titulo }}" />
        </div>
        {{-- Descripción del puesto --}}
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-r">
                Descripción del puesto
            </h2>
            <p> {{$vacante->descripcion}} </p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-100 dark:bg-gray-500 border border-dashed p-5 text-center">
            ¿Quieres inscribirte en esta vacante?
            <a class="font-bold text-indigo-600" href="{{ route('register') }}">
                Regístrate e inscribete a esta y otras vacantes.
            </a>
        </div>    
    @endguest
    
    @cannot('create',App\Models\Vacante::class)
        <livewire:postular-vacante />
    @endcannot
</div>