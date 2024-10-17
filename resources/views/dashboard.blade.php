<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Community Contributions') }}
            </h2>
    </x-slot>
    
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4">
        <x-community-add-link :channels="$channels"/>
        <x-community-links :links="$links"/>
    </div>
</x-app-layout>