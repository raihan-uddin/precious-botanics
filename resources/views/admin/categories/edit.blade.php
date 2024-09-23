<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block">Name</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" required class="border rounded w-full px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="block">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" required class="border rounded w-full px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label for="order_column" class="block">Order Column</label>
                            <input type="number" name="order_column" id="order_column" value="{{ $category->order_column }}" class="border rounded w-full px-3 py-2" />
                        </div>
                        <div class="mb-4">
                            <label for="is_menu" class="block">Is Menu</label>
                            <input type="checkbox" name="is_menu" id="is_menu" {{ $category->is_menu ? 'checked' : '' }} class="rounded" />
                        </div>
                        <div class="mb-4">
                            <label for="is_active" class="block">Is Active</label>
                            <input type="checkbox" name="is_active" id="is_active" {{ $category->is_active ? 'checked' : '' }} class="rounded" />
                        </div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
