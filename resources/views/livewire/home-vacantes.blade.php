<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extra-bold text-4xl text-gray-800 dark:text-gray-200 mb-12">
                Estas son nuestras vacantes disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-400">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        {{-- Enlace para información de vacante --}}
                        <div class="md:flex-1">
                            {{-- Titulo de la oferta --}}
                            <a 
                                class="text-3xl font-extrabold text-gray-600 dark:text-gray-600"
                                href="{{ route('vacantes.show',$vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            {{-- Empresa publicadora de la oferta --}}
                            <p class="text-base text-gray-600 mb-1">
                                {{ $vacante->empresa }}
                            </p>
                            {{-- Categoria de la oferta --}}
                            <p class="text-xs font-bold text-gray-600 mb-1">
                                {{ $vacante->categoria->categoria }}
                            </p>
                            {{-- Salario de la oferta --}}
                            <p class="text-base font-bold text-gray-600 mb-1">
                                {{ $vacante->salario->salario }}
                            </p>
                            {{-- Ultimo dia de inscripción --}}
                            <p class="font-bold text-xs text-gray-600">
                                Último día para inscribirse: 
                                <span class="font-normal">
                                    {{$vacante->ultimo_dia->format('d/m/Y')}}
                                </span>
                            </p>
                        </div>
                        {{-- Botón para ver vacante --}}
                        <div class="mt-5 md:mt-0">
                            <a 
                                class="bg-indigo-500 dark:bg-indigo-500 p-3 text-sm uppercase font-bold 
                                    text-white dark:text-white rounded-lg block text-center"
                                href="{{ route('vacantes.show',$vacante->id) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-800 dark:text-gray-800">Todavía no hay vacantes disponibles</p>
                @endforelse
                <div class="  mt-10">
                    {{ $vacantes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
