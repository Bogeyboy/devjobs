<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center dark:text-gray-500">
            {{-- Datos de la oferta publicada --}}
            <div class="space-y-3">
                {{-- Titulo --}}
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                {{-- Empresa --}}
                <p class="text-sm text-gray-600 font-bold">
                    {{$vacante->empresa}}
                </p>
                {{-- Ultimo día de inscripción --}}
                <p class="text-sm text-gray-500">
                    Último día de inscripción: {{$vacante->ultimo_dia->format('d/m/Y')}}
                </p>
            </div>
            {{-- Acciones sobre la oferta publicada --}}
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                {{-- Botón para el listado de candidatos --}}
                <a
                    href="{{ route('candidatos.index',$vacante) }}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    {{$vacante->candidatos->count()}}
                    Candidatos</a>
                {{-- Botón para editar candidatura --}}
                <a
                    href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    Editar</a>
                {{-- Botón para eliminar vacante --}}
                <button
                    wire:click="$dispatch('mostrarAlerta',{{$vacante->id}} )"
                    {{-- wire:click="$dispatch('mostrarAlerta',{vacante: {{ $vacante->id }} })" --}}
                    class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                    Eliminar
                </button>
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
@push('scripts')
{{--     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script>
        Livewire.on('mostrarAlerta', (vacante_id) => {
            Swal.fire({
                title: "¿Estás seguro de eliminar la vacante?",
                text: "Una vacante eliminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, ¡Eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarVacante', { vacante: vacante_id});
                    Swal.fire({
                        //Eliminamos la vacante desde el servidor
                        title: "¡Eliminada!",
                        text: "Tu vacante ha sido eliminada.",
                        icon: "success"
                        });
                }
            });
        });
    </script> --}}
@endpush