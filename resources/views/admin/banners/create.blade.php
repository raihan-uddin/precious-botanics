<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Banner') }}
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

                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-input id="title" class="block mt-1 w-full" type="text" name="name"
                                :value="old('title')" required autofocus/>
                            @error('title')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Banner image')"/>
                            <input type="file" id="image" name="image" accept="image/jpeg, image/jpg, image/png" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="previewImage(event)" />
                        </div>

                        <!-- Image Preview -->
                        <div id="image-preview-container" class="mb-4 hidden">
                            <div class="relative">
                                <img id="image-preview" src="" alt="Image Preview" class="w-full h-auto rounded-md border border-gray-300">
                                <button type="button" class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-2 focus:outline-none" onclick="removeImage()">
                                    &times;
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="link" :value="__('Link')"/>
                            <x-input id="link" class="block mt-1 w-full" type="url" name="link"
                                :value="old('link')" required/>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="section" :value="__('Section')"/>
                            <x-select id="section" name="section" class="w-full" required>
                                <option value="" disabled selected>{{ __('Select Section') }}</option>
                                <option value="slider" {{ old('section') == 'slider' ? 'selected' : '' }}>{{ __('Slider') }}</option>
                                <option value="banner" {{ old('section') == 'banner' ? 'selected' : '' }}>{{ __('Banner') }}</option>
                                <option value="footer" {{ old('section') == 'footer' ? 'selected' : '' }}>{{ __('Footer') }}</option>
                                <option value="sidebar" {{ old('section') == 'sidebar' ? 'selected' : '' }}>{{ __('Sidebar') }}</option>
                            </x-select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="order_column" :value="__('Order')"/>
                            <x-input id="order_column" class="block mt-1 w-full" type="number" name="order_column"
                                :value="old('order_column', 0)" required/>
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" id="is_active" name="is_active" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ old('is_active') ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">{{ __('Active') }}</span>
                            </label>
                        </div>

                        
                        <div class="flex items center justify-end mt-4">
                            <x-primary-button>{{ __('Create Banner') }}</x-primary-button>
                            <x-secondary-button href="{{ route('banners.index') }}">{{ __('Cancel') }}</x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');  // Show preview container
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            var input = document.getElementById('image');
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');

            input.value = '';  // Clear the input value
            previewImage.src = '';  // Remove image preview
            previewContainer.classList.add('hidden');  // Hide preview container
        }
    </script>

</x-app-layout>
