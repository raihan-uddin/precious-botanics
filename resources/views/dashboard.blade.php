<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $menuCategories = getMenuCategories();
                    @endphp
                    <ul class="pl-4">
                        @foreach ($menuCategories as $menu)
                            <li class="mt-2">
                                <span class="font-semibold text-gray-700">{{ $menu->name }}</span>
                                @if ($menu->submenus->isNotEmpty())
                                    <ul class="pl-4 border-l-2 border-gray-300 ml-2">
                                        @foreach ($menu->submenus as $submenu)
                                            <li class="mt-1">
                                                <span class="text-gray-600">---- {{ $submenu->name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
