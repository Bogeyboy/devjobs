<div class="p-10">
    <div class="mb-5 dark:text-gray-100 text-gray-800">
        {{-- Titulo de la orferta --}}
        <h3 class="font-bold text-3xl  my-3">
            {{ $vacante->titulo }}
        </h3>
        {{-- Información de la oferta --}}
        <div class="md:grid md:grid-cols-2 bg-gray-50 dark:bg-gray-500 p-4 my-10 rounded-lg">
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
                    {{$vacante->categoria_id}}
                </span>
            </p>
            {{-- Salario --}}
            <p class="font-bold text-sm uppercase dark:text-gray-100 text-gray-800 my-3">
                Salario:
                <span class="normal-case font-normal">
                    {{$vacante->salario_id}}
                </span>
            </p>
        </div>
    </div>
</div>
