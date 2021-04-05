<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Últimas Respuestas ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="note" value="{{ __('¿Que te gustaria agregar al informe?') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="note" value="{{$quiz->note}}" disabled/>
                    </div>
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="page_load_speed" value="{{ __('¿La información es correcta?') }}" />
                        @if($quiz->page_reliability === 1)
                            <x-jet-input class="block mt-1 w-full" type="text" name="note" value="Si" disabled/>
                        @elseif($quiz->page_reliability === 2)
                            <x-jet-input class="block mt-1 w-full" type="text" name="note" value="No" disabled/>
                        @else
                            <x-jet-input class="block mt-1 w-full" type="text" name="note" value="Mas o menos" disabled/>
                        @endif
                    </div>
                    <br/>
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <x-jet-label for="page_load_speed" value="{{ __('De 1 a 5, ¿es rápido el sitio?') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" value="{{$quiz->page_load_speed}}"  disabled/>
                    </div>
                    <br/>
            </div>
        </div>
    </div>
</x-app-layout>
