<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center dark:text-gray-500">
            {{-- Datos de la oferta publicada --}}
            <div class="space-y-3">
                <a href="#" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{$vacante->empresa}}
                </p>
                <p class="text-sm text-gray-500">
                    Último día de inscripción: {{$vacante->ultimo_dia->format('d/m/Y')}}
                </p>
            </div>
            {{-- Acciones sobre la oferta publicada --}}
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                {{-- Botón de candidatos --}}
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    Candidatos
                </a>

                {{-- Botón para editar candidatura --}}
                <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    Editar
                </a>

                {{-- Botón para eliminar vacantes --}}
                <a href="#" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    Eliminar
                </a>
            </div>
        </div>
    @empty
        <p class="p3 text-center text-sm text-gray-600">
            No hay vacantes que mostrar todavía.
        </p>
    @endforelse

    <div class="mt-10">
        {{$vacantes->links()}}
    </div>
</div>