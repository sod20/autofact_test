<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('quizzes.store') }}">
                    @csrf
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="note" value="{{ __('¿Que te gustaria agregar al informe?') }}" />
                        <x-jet-input id="note" class="block mt-1 w-full" type="text" name="note" autofocus />
                    </div>
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="page_reliability" value="{{ __('¿La información es correcta?') }}" />
                        <select id="page_reliability"  class="block mt-1 w-full" name="page_reliability">
                            <option value="1"> Sí </option>
                            <option value="2"> No </option>
                            <option value="3"> Mas o menos </option>
                        </select>
                    </div>
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="page_load_speed" value="{{ __('De 1 a 5, ¿es rápido el sitio?') }}" />
                        <select id="page_load_speed"  class="block mt-1 w-full" name="page_load_speed">
                            @foreach([1,2,3,4,5] as $option)
                                <option value="{{$option}}">
                                    {{$option}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Registrar Respuesta') }}
                            </x-jet-button>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
