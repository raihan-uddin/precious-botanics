<x-app-layout>

    <x-slot name="title">
        {{ __('Create Product') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- SKU -->
                        <div class="mb-4">
                            <label for="sku" class="block text-gray-700">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Stock Quantity -->
                        <div class="mb-4">
                            <label for="stock_quantity" class="block text-gray-700">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Product Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Product Image</label>
                            <input type="file" name="image" id="image" class="border rounded px-3 py-2 w-full" accept="image/*">
                        </div>

                        <!-- Variations -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Variations</label>
                            <div id="variations">
                                <div class="flex space-x-2 mb-2">
                                    <input type="text" name="variations[0][variation_type]" placeholder="Type" class="border rounded px-3 py-2 w-1/4">
                                    <input type="text" name="variations[0][variation_value]" placeholder="Value" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" name="variations[0][price]" placeholder="Price" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" name="variations[0][stock_quantity]" placeholder="Stock" class="border rounded px-3 py-2 w-1/4">
                                </div>
                                <button type="button" onclick="addVariation()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Variation</button>
                            </div>
                        </div>

                        <!-- Attributes -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Attributes</label>
                            <div id="attributes">
                                <div class="flex space-x-2 mb-2">
                                    <input type="text" name="attributes[0][key]" placeholder="Key" class="border rounded px-3 py-2 w-1/2">
                                    <input type="text" name="attributes[0][value]" placeholder="Value" class="border rounded px-3 py-2 w-1/2">
                                </div>
                                <button type="button" onclick="addAttribute()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Attribute</button>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" multiple class="border rounded px-3 py-2 w-full">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Images -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Additional Images</label>
                            <div id="images">
                                <div class="flex space-x-2 mb-2">
                                    <input type="file" name="images[0][image_path]" class="border rounded px-3 py-2 w-1/2">
                                    <input type="text" name="images[0][caption]" placeholder="Caption" class="border rounded px-3 py-2 w-1/2">
                                </div>
                                <button type="button" onclick="addImage()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Image</button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let variationIndex = 1;
        let attributeIndex = 1;
        let imageIndex = 1;

        function addVariation() {
            const variationsDiv = document.getElementById('variations');
            const newVariation = `<div class="flex space-x-2 mb-2">
                                    <input type="text" name="variations[${variationIndex}][variation_type]" placeholder="Type" class="border rounded px-3 py-2 w-1/4">
                                    <input type="text" name="variations[${variationIndex}][variation_value]" placeholder="Value" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" name="variations[${variationIndex}][price]" placeholder="Price" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" name="variations[${variationIndex}][stock_quantity]" placeholder="Stock" class="border rounded px-3 py-2 w-1/4">
                                </div>`;
            variationsDiv.insertAdjacentHTML('beforeend', newVariation);
            variationIndex++;
        }

        function addAttribute() {
            const attributesDiv = document.getElementById('attributes');
            const newAttribute = `<div class="flex space-x-2 mb-2">
                                    <input type="text" name="attributes[${attributeIndex}][key]" placeholder="Key" class="border rounded px-3 py-2 w-1/2">
                                    <input type="text" name="attributes[${attributeIndex}][value]" placeholder="Value" class="border rounded px-3 py-2 w-1/2">
                                </div>`;
            attributesDiv.insertAdjacentHTML('beforeend', newAttribute);
            attributeIndex++;
        }

        function addImage() {
            const imagesDiv = document.getElementById('images');
            const newImage = `<div class="flex space-x-2 mb-2">
                                <input type="file" name="images[${imageIndex}][image_path]" class="border rounded px-3 py-2 w-1/2">
                                <input type="text" name="images[${imageIndex}][caption]" placeholder="Caption" class="border rounded px-3 py-2 w-1/2">
                            </div>`;
            imagesDiv.insertAdjacentHTML('beforeend', newImage);
            imageIndex++;
        }
    </script>

</x-app-layout>
