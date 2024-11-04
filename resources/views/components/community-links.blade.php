@props(['links'])

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($links->isEmpty())
                    {{'No hay links con aprobados.'}}
                @else
                    <!-- Bucle para generar la lista de enlaces -->
                    @foreach ($links as $link)
                        <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                            <!-- Título del enlace -->
                            <p class="text-lg font-semibold text-blue-600 hover:underline">
                                {{$link->title}}
                            </p>
                            
                            @if ($link->approved)
                                <a href="/dashboard/{{ $link->channel->slug }}">
                                <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                                    style="background-color: {{ $link->channel->color }}">
                                    {{$link->channel->title}}
                                </span>
                            @else
                                <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                                    style="background-color: Orange;">
                                    Not approved
                                </span>
                            @endif

                            <form method="POST" action="/votes/{{ $link->id }}">
                            @csrf
                                <button type="submit"
                                        class="{{ Auth::check() && Auth::user()->votedFor($link) ?
                                        'bg-green-500 hover:bg-green-600 text-white' :
                                        'bg-gray-500 hover:bg-gray-600 text-white'
                                        }}">
                                    {{ $link->users()->count() }}
                                </button>
                            </form>
                        </div>
                    @endforeach
                    <!-- Paginación -->
                    <div class="mt-6"> {{$links->links()}} </div>

                    <!-- Información del creador y fecha de actualización -->
                    <small class="text-sm text-gray-600 dark:text-gray-400">
                    Contributed by: {{ optional($link->creator)->name }}    {{ $link->updated_at->diffForHumans() }}
                    </small>
                @endif
            </div>
        </div>
    </div>
</div>