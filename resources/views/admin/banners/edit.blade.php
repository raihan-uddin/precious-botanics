<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Banner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $banner->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                            <div class="mt-2">
                                @if($banner->image)
                                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Current Image" class="w-32 h-32 object-cover">
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="link" class="block text-sm font-medium text-gray-700">{{ __('Link') }}</label>
                            <input type="url" id="link" name="link" value="{{ old('link', $banner->link) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="section" class="block text-sm font-medium text-gray-700">{{ __('Section') }}</label>
                            <select id="section" name="section" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="" disabled>{{ __('Select Section') }}</option>
                                <option value="slider" {{ old('section', $banner->section) == 'slider' ? 'selected' : '' }}>{{ __('Slider') }}</option>
                                <option value="banner" {{ old('section', $banner->section) == 'banner' ? 'selected' : '' }}>{{ __('Banner') }}</option>
                                <option value="footer" {{ old('section', $banner->section) == 'footer' ? 'selected' : '' }}>{{ __('Footer') }}</option>
                                <option value="sidebar" {{ old('section', $banner->section) == 'sidebar' ? 'selected' : '' }}>{{ __('Sidebar') }}</option>
                                <!-- Add more sections as needed -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="order_column" class="block text-sm font-medium text-gray-700">{{ __('Order') }}</label>
                            <input type="number" id="order_column" name="order_column" value="{{ old('order_column', $banner->order_column) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="flex items-center">
                                <input type="hidden" name="is_active" value="0"> <!-- Ensures false is sent when unchecked -->
                                <input type="checkbox" id="is_active" name="is_active" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">{{ __('Active') }}</span>
                            </label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                {{ __('Update Banner') }}
                            </button>
                            <a href="{{ route('banners.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 disabled:opacity-25 transition">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
