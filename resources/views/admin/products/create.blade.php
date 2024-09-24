<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="productForm()">
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
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="border rounded px-3 py-2 w-full" required>
                            @error('slug')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-4">
                            <label for="sku" class="block text-gray-700">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" class="border rounded px-3 py-2 w-full" required>
                            @error('sku')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" class="border rounded px-3 py-2 w-full" required>
                            @error('price')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Quantity -->
                        <div class="mb-4">
                            <label for="stock_quantity" class="block text-gray-700">Stock Quantity</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}" class="border rounded px-3 py-2 w-full" required>
                            @error('stock_quantity')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Categories -->
                        <div class="mb-4">
                            <label for="categories" class="block text-gray-700">Categories</label>
                            <select name="categories[]" id="categories" multiple class="border rounded px-3 py-2 w-full">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700">Tags</label>
                            <div class="border rounded px-3 py-2 w-full" x-data="{ newTag: '', tags: [] }">
                                <template x-for="(tag, index) in tags" :key="index">
                                    <span class="inline-flex items-center bg-blue-100 text-blue-800 text-sm rounded px-2 py-1 mr-2">
                                        <span x-text="tag"></span>
                                        <button type="button" @click="tags.splice(index, 1)" class="ml-2 text-red-600">&times;</button>
                                    </span>
                                </template>
                                <input type="hidden" name="tags" :value="tags.join(',')">
                                <input type="text" x-model="newTag" class="border rounded px-3 py-2 w-full" placeholder="Add a tag" @keydown.enter.prevent="if (newTag) { tags.push(newTag); newTag = ''; }">
                            </div>
                            @error('tags')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Product Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Product Image</label>
                            <input type="file" name="image" id="image" class="border rounded px-3 py-2 w-full" accept="image/*">
                            @error('image')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Variations -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Variations</label>
                            <template x-for="(variation, index) in variations" :key="index">
                                <div class="flex space-x-2 mb-2">
                                    <input type="text" :name="'variations[' + index + '][variation_type]'" placeholder="Type" class="border rounded px-3 py-2 w-1/4">
                                    <input type="text" :name="'variations[' + index + '][variation_value]'" placeholder="Value" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" :name="'variations[' + index + '][price]'" placeholder="Price" class="border rounded px-3 py-2 w-1/4">
                                    <input type="number" :name="'variations[' + index + '][stock_quantity]'" placeholder="Stock" class="border rounded px-3 py-2 w-1/4">
                                </div>
                            </template>
                            <button type="button" @click="addVariation()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Variation</button>
                        </div>

                        <!-- Attributes -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Attributes</label>
                            <template x-for="(attribute, index) in attributes" :key="index">
                                <div class="flex space-x-2 mb-2">
                                    <input type="text" :name="'attributes[' + index + '][key]'" placeholder="Key" class="border rounded px-3 py-2 w-1/2">
                                    <input type="text" :name="'attributes[' + index + '][value]'" placeholder="Value" class="border rounded px-3 py-2 w-1/2">
                                </div>
                            </template>
                            <button type="button" @click="addAttribute()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Attribute</button>
                        </div>

                        <!-- Images -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Additional Images</label>
                            <template x-for="(image, index) in images" :key="index">
                                <div class="flex space-x-2 mb-2">
                                    <input type="file" :name="'images[' + index + '][image_path]'" accept="image/*" class="border rounded px-3 py-2 w-1/4">
                                    <input type="text" :name="'images[' + index + '][caption]'" placeholder="Caption" class="border rounded px-3 py-2 w-1/4">
                                    <input type="text" :name="'images[' + index + '][order]'" placeholder="Order" class="border rounded px-3 py-2 w-1/4">
                                    <label class="border rounded px-3 py-2 w-1/4">
                                        <input type="checkbox" :name="'images[' + index + '][is_active]'" value="1"> Active
                                    </label>
                                </div>
                            </template>
                            <button type="button" @click="addImage()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Image</button>
                        </div>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function productForm() {
            return {
                variations: [],
                attributes: [],
                images: [],
                addVariation() {
                    this.variations.push({ variation_type: '', variation_value: '', price: '', stock_quantity: '' });
                },
                addAttribute() {
                    this.attributes.push({ key: '', value: '' });
                },
                addImage() {
                    this.images.push({ image_path: '', caption: '', order: '', is_active: false });
                }
            }
        }
    </script>

</x-app-layout>
