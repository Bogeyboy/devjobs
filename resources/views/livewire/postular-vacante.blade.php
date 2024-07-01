<div class="bg-gray-100 dark:bg-gray-500 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Inscribirme a esta vacante
    </h3>
    <form action="" class="w-96 mt-5">
        @csrf
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Currículum vitae (PDF)')"/>
            <x-text-input for="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>
        </div>
        <x-primary-button class="my-5">
            {{__('Inscribirme')}}
        </x-primary-button>
    </form>
</div>
