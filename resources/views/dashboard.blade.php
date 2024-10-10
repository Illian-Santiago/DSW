<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Community Contributions') }}
            </h2>
    </x-slot>

    
    <!-- Notifications Section -->
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
        <x-community-add-link/>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Here you will see the Community Links!") }}

                    <!--Hace que por cada link en el array de links, 
                    se cree una lista con el titulo del link que toque.-->
                    @foreach ($links as $link)
                    <li>{{$link->title}}</li>

                    <!--Aprovechando el array de los links anteriormente creado, 
                    hacemos que coja el nombre del creador del enlace que toque,
                    así como la fecha de ultima modificación.-->
                    <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                    @endforeach
                    {{$links->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-red-700 h-screen p-4 text-white shadow-lg">
            <h3 class="text-lg font-bold">Menu</h3>
            <ul class="mt-4">
                <li><a href="#" class="block py-2 px-4 hover:bg-red-600 rounded">Home</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-red-600 rounded">Profile</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-red-600 rounded">Settings</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-red-600 rounded">Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                <h4 class="font-bold text-gray-800 dark:text-gray-100">Dashboard Overview</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    <div class="bg-red-600 text-white p-4 rounded-lg shadow-md">
                        <h5 class="font-bold">Total Users</h5>
                        <p class="text-3xl">1,200</p>
                    </div>
                    <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
                        <h5 class="font-bold">Active Sessions</h5>
                        <p class="text-3xl">350</p>
                    </div>
                    <div class="bg-red-400 text-white p-4 rounded-lg shadow-md">
                        <h5 class="font-bold">New Signups</h5>
                        <p class="text-3xl">80</p>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                <h4 class="font-bold text-gray-800 dark:text-gray-100">User Growth</h4>
                <div class="h-60 mt-4 bg-gradient-to-r from-red-500 to-red-300 rounded-lg flex items-center justify-center">
                    <!-- Integración de gráfico -->
                    <p class="text-gray-100">[Gráfico de usuarios aquí]</p>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
                <h4 class="font-bold text-gray-800 dark:text-gray-100">Recent Notifications</h4>
                <ul class="mt-4 space-y-2">
                    <li class="bg-red-200 p-3 rounded-md text-red-800">User Jane Doe has signed up.</li>
                    <li class="bg-red-200 p-3 rounded-md text-red-800">Server maintenance scheduled for 12 AM.</li>
                    <li class="bg-red-200 p-3 rounded-md text-red-800">New message from John.</li>
                </ul>
            </div>
        </main>
    </div>
</x-app-layout>