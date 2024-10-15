@props(['links'])

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Here you will see the Community Links!") }}

                <!-- Bucle para generar la lista de enlaces -->
                @foreach ($links as $link)
                    <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                        <!-- Título del enlace -->
                        <p class="text-lg font-semibold text-blue-600 hover:underline">
                            {{$link->title}}
                        </p>

                        <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                            style="background-color: {{ $link->channel->color }}">
                            {{$link->channel->title}}
                        </span>
                    </div>
                @endforeach

                <!-- Paginación -->
                <div class="mt-6"> {{$links->links()}} </div>

                <!-- Información del creador y fecha de actualización -->
                <small class="text-sm text-gray-600 dark:text-gray-400">
                Contributed by: {{ optional($link->creator)->name }}    {{ $link->updated_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>
</div>