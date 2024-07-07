<x-app-layout>
    {{-- slot de cabecera --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos de la vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-10">
                        Candidatos de la vacante: {{ $vacante->titulo }}
                    </h1>
                    <div class="md:flex md:justify-center px-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    {{-- Información de la persona inscrita --}}
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-600 dark:text-gray-200">
                                            Nombre: {{$candidato->user->name}}
                                        </p>
                                        <p class="text-xl text-gray-400 dark:text-gray-100">
                                            Email: <a href="mailto:{{$candidato->user->email}}">{{$candidato->user->email}}</a>
                                        </p>
                                        <p class="text-xl font-medium text-gray-600 dark:text-gray-200">
                                            Inscrito: <span class="font-normal">{{$candidato->user->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                    {{-- Contenedor para mostrar el currículum --}}
                                    <div>
                                        <a 
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300
                                                text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                            href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                            target="_blank"
                                            rel="noreferrer noopener">
                                            
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-100">
                                    Todavía no hay candidatos inscritos
                                </p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>