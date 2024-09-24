<x-app-layout>
    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
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

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- SKU -->
                        <div class="mb-4">
                            <label for="sku" class="block text-gray-700">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Stock Quantity -->
                        <div class="mb-4">
                            <label for="stock_quantity" class="block text-gray-700">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="border rounded px-3 py-2 w-full" required>
                        </div>

                        <!-- Product Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Product Image</label>
                            <input type="file" name="image" id="image" class="border rounded px-3 py-2 w-full" accept="image/*">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="Current Image" class="mt-2 w-1/4">
                            @endif
                        </div>

                        <!-- Variations -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Variations</label>
                            <div id="variations" x-data="{ variations: @json($product->variations) }">
                                <template x-for="(variation, index) in variations" :key="index">
                                    <div class="flex space-x-2 mb-2">
                                        <input type="text" x-model="variation.variation_type" placeholder="Type" class="border rounded px-3 py-2 w-1/4" required>
                                        <input type="text" x-model="variation.variation_value" placeholder="Value" class="border rounded px-3 py-2 w-1/4" required>
                                        <input type="number" x-model="variation.price" placeholder="Price" class="border rounded px-3 py-2 w-1/4" step="0.01" required>
                                        <input type="number" x-model="variation.stock_quantity" placeholder="Stock" class="border rounded px-3 py-2 w-1/4" required>
                                    </div>
                                </template>
                                <button type="button" @click="variations.push({ variation_type: '', variation_value: '', price: '', stock_quantity: '' })" class="bg-blue-500 text-white px-4 py-2 rounded">Add Variation</button>
                            </div>
                        </div>

                        <!-- Attributes -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Attributes</label>
                            <div id="attributes" x-data="{ attributes: @json($product->attributes) }">
                                <template x-for="(attribute, index) in attributes" :key="index">
                                    <div class="flex space-x-2 mb-2">
                                        <input type="text" x-model="attribute.key" placeholder="Key" class="border rounded px-3 py-2 w-1/2" required>
                                        <input type="text" x-model="attribute.value" placeholder="Value" class="border rounded px-3 py-2 w-1/2" required>
                                    </div>
                                </template>
                                <button type="button" @click="attributes.push({ key: '', value: '' })" class="bg-blue-500 text-white px-4 py-2 rounded">Add Attribute</button>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700">Tags</label>
                            <select name="tags[]" id="tags" multiple class="border rounded px-3 py-2 w-full">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $product->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Images -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Additional Images</label>
                            <div id="images" x-data="{ images: @json($product->images) }">
                                <template x-for="(image, index) in images" :key="index">
                                    <div class="flex space-x-2 mb-2">
                                        <input type="file" name="images[${index}][image_path]" accept="image/*" class="border rounded px-3 py-2 w-1/4">
                                        <input type="text" x-model="image.caption" name="images[${index}][caption]" placeholder="Caption" class="border rounded px-3 py-2 w-1/4">
                                        <input type="text" x-model="image.order" name="images[${index}][order]" placeholder="Order" class="border rounded px-3 py-2 w-1/4">
                                        <label class="border rounded px-3 py-2 w-1/4">
                                            <input type="checkbox" x-model="image.is_featured" name="images[${index}][is_featured]" class="form-checkbox h-5 w-5 text-indigo-600">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Is Featured') }}</span>
                                        </label>
                                    </div>
                                </template>
                                <button type="button" @click="images.push({ image_path: '', caption: '', order: '', is_featured: false })" class="bg-blue-500 text-white px-4 py-2 rounded">Add Image</button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
