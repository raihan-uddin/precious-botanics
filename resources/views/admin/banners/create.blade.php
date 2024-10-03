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
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus/>
                            @error('title')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="section" :value="__('Section')"/>
                            <x-select id="section" name="section" class="w-full" required>
                                <option value="" disabled selected>{{ __('Select Section') }}</option>
                                <option value="slider" {{ old('section') == 'slider' ? 'selected' : '' }}>{{ __('Slider') }}</option>
                                <option value="banner" {{ old('section') == 'banner' ? 'selected' : '' }}>{{ __('Banner') }}</option>
                                <option value="footer" {{ old('section') == 'footer' ? 'selected' : '' }}>{{ __('Footer') }}</option>
                                <option value="sidebar" {{ old('section') == 'sidebar' ? 'selected' : '' }}>{{ __('Sidebar') }}</option>
                                <option value="featured" {{ old('section') == 'featured' ? 'selected' : '' }}>{{ __('Featured') }}</option>
                            </x-select>
                            @error('section')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Banner image')"/>
                            <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" onchange="previewImage(event)" />
                            @error('image')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Image Preview and Size Display -->
                        <div id="image-preview-container" class="mb-4 hidden">
                            <div class="relative flex items-center space-x-4">
                                <!-- Thumbnail Image Preview -->
                                <img id="image-preview" src="" alt="Image Preview" class="w-40 h-auto rounded-md border border-gray-300">

                                <!-- Remove Button -->
                                <button type="button" class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-2 focus:outline-none" onclick="removeImage()">
                                    &times;
                                </button>
                            </div>
                            <!-- Highlighted Image Size -->
                            <p id="image-size" class="text-sm font-semibold text-gray-700 mt-2 bg-yellow-100 p-2 rounded-md"></p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="link" :value="__('Link')"/>
                            <x-input id="link" class="block mt-1 w-full" type="url" name="link"
                                :value="old('link')"/>
                            @error('link')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <x-input-label for="order_column" :value="__('Order')"/>
                            <x-input id="order_column" class="block mt-1 w-full" type="number" name="order_column"
                                :value="old('order_column', 0)" required/>
                            @error('order_column')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="is_active" class="flex items-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" id="is_active" name="is_active" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ old('is_active') ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">{{ __('Active') }}</span>
                            </label>
                            @error('is_active')
                            <span class="text-red-600 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="flex items center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 mr-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                {{ __('Create Banner') }}
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

    <script>
        function previewImage(event) {
            var input = event.target;
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');
            var imageSizeText = document.getElementById('image-size');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');  // Show preview container
                };
                reader.readAsDataURL(input.files[0]);

                // Display image size in KB or MB
                var fileSizeInBytes = input.files[0].size;
                var fileSizeInKB = (fileSizeInBytes / 1024).toFixed(2);
                var fileSizeInMB = (fileSizeInBytes / (1024 * 1024)).toFixed(2);
                if (fileSizeInMB > 1) {
                    imageSizeText.innerHTML = `<strong>Size:</strong> ${fileSizeInMB} MB`;
                } else {
                    imageSizeText.innerHTML = `<strong>Size:</strong> ${fileSizeInKB} KB`;
                }

                // Add highlight class to image size text
                imageSizeText.classList.add('bg-yellow-100', 'p-2', 'rounded-md');
            }
        }

        function removeImage() {
            var input = document.getElementById('image');
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');
            var imageSizeText = document.getElementById('image-size');

            input.value = '';  // Clear the input value
            previewImage.src = '';  // Remove image preview
            imageSizeText.textContent = '';  // Remove file size text
            previewContainer.classList.add('hidden');  // Hide preview container
        }
    </script>

</x-app-layout>
