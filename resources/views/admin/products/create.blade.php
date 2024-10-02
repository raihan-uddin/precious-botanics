<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
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
                    @if(session('success'))
                        <div id="toast"
                             class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white text-sm rounded-lg p-4">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                const toast = document.getElementById('toast');
                                toast.style.display = 'none';
                            }, 3000);
                        </script>
                    @endif
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                          class="space-y-6">
                        @csrf
                        <div>
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <!-- Product Name -->
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__('Product Name')"/>
                                    <x-input id="name" name="name" class="block mt-1 w-full" type="text" required
                                             onkeyup="generateSlug(this.value)" onchange="generateSlug(this.value)"
                                             value="{{ old('name') }}"
                                             autofocus/>
                                    @error('name')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Product Slug -->
                                <div class="mb-4">
                                    <x-input-label for="slug" :value="__('Product Slug')"/>
                                    <x-input id="slug" name="slug" class="block mt-1 w-full" type="text" required
                                             value="{{ old('slug') }}"
                                             readonly/>
                                    @error('slug')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Product SKU -->
                                <div class="mb-4">
                                    <x-input-label for="sku" :value="__('Product SKU')"/>
                                    <x-input id="sku" name="sku" class="block mt-1 w-full" type="text"
                                             value="{{ old('sku') }}"/>
                                    @error('sku')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Vendor -->
                                <div class="mb-4">
                                    <x-input-label for="vendor" :value="__('Vendor')"/>
                                    <x-input id="vendor" name="vendor" class="block mt-1 w-full" type="text"
                                             value="{{ old('sku') }}"/>
                                    @error('vendor')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Assign to Product Categories -->
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="mb-4">
                                    <x-input-label for="categories" :value="__('Assign to Categories')"/>
                                    <x-select id="categories" name="categories[]" class="block mt-1 w-full select2"
                                              multiple
                                              required>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    @error('categories')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Assign to Product Tags -->
                                <div class="mb-4">
                                    <x-input-label for="tags" :value="__('Assign to Tags')"/>
                                    <x-select id="tags" name="tags[]" class="block mt-1 w-full select2" multiple
                                              required>
                                        @foreach($tags as $tag)
                                            <option
                                                value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    @error('tags')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description (Quill WYSIWYG Editor) -->
                            <div class="mb-4">
                                <x-input-label for="short_description" :value="__('Short Description')"/>

                                <div id="editor" class="block mt-1 w-full editor"
                                     style="height: 300px">{{ old('short_description') }}</div>

                                <input type="hidden" name="short_description" id="short_description"
                                       value="{{ old('short_description') }}">
                                @error('short_description')
                                <span class="text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- Full Description (Quill WYSIWYG Editor) -->
                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Full Description')"/>

                                <div id="editor" class="block mt-1 w-full editor"
                                     style="height: 300px">{{ old('description') }}</div>

                                <input type="hidden" name="description" id="description"
                                       value="{{ old('description') }}">
                                @error('description')
                                <span class="text-red-600 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- price -->
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <!-- price -->
                                <div class="mb-4">
                                    <x-input-label for="price" :value="__('Price')"/>
                                    <x-input id="price" name="price" class="block mt-1 w-full" type="number"
                                             value="{{ old('price') }}" required/>
                                    @error('price')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- discount_price -->
                                <div class="mb-4">
                                    <x-input-label for="discount_price" :value="__('Special Price')"/>
                                    <x-input id="discount_price" name="discount_price"
                                             value="{{ old('discount_price') }}" class="block mt-1 w-full"
                                             type="number"/>
                                    @error('discount_price')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- tax_rate -->
                                <div class="mb-4">
                                    <x-input-label for="tax_rate" :value="__('Tax Rate')"/>
                                    <x-input id="tax_rate" name="tax_rate" class="block mt-1 w-full"
                                             value="{{ old('discount_price') }}" type="number"
                                             required/>
                                    @error('tax_rate')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- is_taxable -->
                                <div class="mb-4">
                                    <x-input-label for="is_taxable" :value="__('Is Taxable')"/>
                                    <x-select id="is_taxable" name="is_taxable" class="block mt-1 w-full" required>
                                        <option value="1" {{ old('is_taxable') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_taxable') == '0' ? 'selected' : '' }}>No</option>
                                    </x-select>

                                    @error('is_taxable')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Stock management -->
                            <div class="grid grid-cols-5 gap-4 mt-4">
                                <!-- stock_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="stock_quantity" :value="__('Stock Quantity')"/>
                                    <x-input id="stock_quantity" name="stock_quantity" class="block mt-1 w-full"
                                             type="number" value="{{ old('stock_quantity') }}"
                                             required/>
                                    @error('stock_quantity')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- in_stock -->
                                <div class="mb-4">
                                    <x-input-label for="in_stock" :value="__('In Stock')"/>
                                    <x-select id="in_stock" name="in_stock" class="block mt-1 w-full" required>
                                        <option value="1" {{ old('in_stock') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('in_stock') == '0' ? 'selected' : '' }}>No</option>
                                    </x-select>

                                    @error('in_stock')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- allow_out_of_stock_orders -->
                                <div class="mb-4">
                                    <x-input-label for="allow_out_of_stock_orders"
                                                   :value="__('Allow Out of Stock Orders')"/>
                                    <x-select id="allow_out_of_stock_orders" name="allow_out_of_stock_orders"
                                              class="block mt-1 w-full" required>
                                        <option
                                            value="1" {{ old('allow_out_of_stock_orders') == '1' ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option
                                            value="0" {{ old('allow_out_of_stock_orders') == '0' ? 'selected' : '' }}>No
                                        </option>
                                    </x-select>
                                    @error('allow_out_of_stock_orders')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- min_order_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="min_order_quantity" :value="__('Minimum Order Quantity')"/>
                                    <x-input id="min_order_quantity" name="min_order_quantity" class="block mt-1 w-full"
                                             value="{{ old('min_order_quantity') }}"
                                             type="number" required/>
                                    @if($errors->has('min_order_quantity'))
                                        <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $errors->first('min_order_quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!-- max_order_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="max_order_quantity" :value="__('Maximum Order Quantity')"/>
                                    <x-input id="max_order_quantity" name="max_order_quantity" class="block mt-1 w-full"
                                             value="{{ old('max_order_quantity') }}"
                                             type="number" required/>
                                    @error('max_order_quantity')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Additional metadata -->
                            <div class="grid grid-cols-5 gap-4 mt-4">
                                <!-- barcode -->
                                <div class="mb-4">
                                    <x-input-label for="barcode" :value="__('Barcode')"/>
                                    <x-input id="barcode" name="barcode" class="block mt-1 w-full" type="text"
                                             value="{{ old('barcode') }}"/>
                                    @error('barcode')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- weight -->
                                <div class="mb-4">
                                    <x-input-label for="weight" :value="__('Weight')"/>
                                    <x-input id="weight" name="weight" class="block mt-1 w-full" type="number"
                                             value="{{ old('weight') }}"/>
                                    @error('weight')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- length -->
                                <div class="mb-4">
                                    <x-input-label for="length" :value="__('Length')"/>
                                    <x-input id="length" name="length" class="block mt-1 w-full" type="number"
                                             value="{{ old('length') }}"/>
                                    @error('length')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- width -->
                                <div class="mb-4">
                                    <x-input-label for="width" :value="__('Width')"/>
                                    <x-input id="width" name="width" class="block mt-1 w-full" type="number"
                                             value="{{ old('width') }}"/>
                                    @error('width')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- height -->
                                <div class="mb-4">
                                    <x-input-label for="height" :value="__('Height')"/>
                                    <x-input id="height" name="height" class="block mt-1 w-full" type="number"
                                             value="{{ old('height') }}"/>
                                    @error('height')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Product visibility options -->
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <!-- is_is_featured -->
                                <div class="mb-4">
                                    <x-input-label for="is_featured" :value="__('Is Featured')"/>
                                    <x-select id="is_featured" name="is_featured" class="block mt-1 w-full" required>
                                        <option value="1" {{ old('is_featured') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_featured') == '0' ? 'selected' : '' }}>No</option>
                                    </x-select>

                                    @error('is_featured')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- is_visible -->
                                <div class="mb-4">
                                    <x-input-label for="is_visible" :value="__('Is Visible')"/>
                                    <x-select id="is_visible" name="is_visible" class="block mt-1 w-full" required>
                                        <option value="1" {{ old('is_visible') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_visible') == '0' ? 'selected' : '' }}>No</option>
                                    </x-select>

                                    @error('is_visible')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- is_digital -->
                                <div class="mb-4">
                                    <x-input-label for="is_digital" :value="__('Is Digital')"/>
                                    <x-select id="is_digital" name="is_digital" class="block mt-1 w-full" required>
                                        <option value="1" {{ old('is_digital') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('is_digital') == '0' ? 'selected' : '' }}>No</option>
                                    </x-select>
                                    @error('is_digital')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- status: 'draft', 'published', 'archived' -->
                                <div class="mb-4">
                                    <x-input-label for="status" :value="__('Status')"/>
                                    <x-select id="status" name="status" class="block mt-1 w-full" required>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>
                                            Archived
                                        </option>
                                    </x-select>
                                    @error('status')
                                    <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Featured Image -->
                            <div class="mb-4">
                                <x-input-label for="featured_image" :value="__('Product Featured Image')"/>
                                <!-- Featured Image Input -->
                                <input type="file" name="featured_image" id="featured_image" class="block mt-1 w-full"
                                       accept="image/*">
                                @error('featured_image')
                                <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                <!-- Preview Image -->
                                <div id="imagePreview" class="mt-4 hidden">
                                    <img id="preview" class="w-32 h-32 object-cover rounded-md" alt="Preview"/>
                                    <button type="button" id="removeImage" class="mt-2 text-red-600">Remove Image
                                    </button>
                                </div>
                            </div>

                            <!-- Additional Images -->
                            <div class="mb-4">
                                <label class="block text-gray-700">Additional Images</label>
                                <input type="file" name="additional_images[]" id="additional_images"
                                       class="block mt-1 w-full" accept="image/*" multiple>
                                @error('additional_images')
                                <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                <!-- Preview Container -->
                                <div id="additionalImagePreview" class="mt-4 grid grid-cols-3 gap-4 hidden">
                                    <!-- Preview Images will be added here -->
                                </div>
                            </div>

                            <!-- Product variants size, color, price, sku, stock -->
                            <div class="mb-4">
                                <x-input-label for="variants" :value="__('Product Variants')"/>
                                <div id="variants" class="block mt-1 w-full">
                                    <div class="flex flex-wrap gap-4 mb-4 items-center">
                                        <div class="flex-1 min-w-[150px] mb-4">
                                            <x-input-label for="size" :value="__('Size')"/>
                                            <x-input id="size" class="block mt-1 w-full" type="text"
                                                     placeholder="Enter size"/>
                                        </div>
                                        <div class="flex-1 min-w-[150px] mb-4">
                                            <x-input-label for="color" :value="__('Color')"/>
                                            <x-input id="color" class="block mt-1 w-full" type="text"
                                                     placeholder="Enter color"/>
                                        </div>
                                        <div class="flex-1 min-w-[150px] mb-4">
                                            <x-input-label for="variant_price" :value="__('Price')"/>
                                            <x-input id="variant_price" class="block mt-1 w-full" type="number"
                                                     placeholder="Enter price"/>
                                        </div>
                                        <div class="flex-1 min-w-[150px] mb-4">
                                            <x-input-label for="variant_sku" :value="__('SKU')"/>
                                            <x-input id="variant_sku" class="block mt-1 w-full" type="text"
                                                     placeholder="Enter SKU"/>
                                        </div>
                                        <div class="flex-1 min-w-[150px] mb-4">
                                            <x-input-label for="stock" :value="__('Stock')"/>
                                            <x-input id="stock" class="block mt-1 w-full" type="number"
                                                     placeholder="Enter stock"/>
                                        </div>
                                        <div class="mb-4">
                                            <button type="button" id="addVariant"
                                                    class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded">
                                                Add Variant
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Variants Preview Section -->
                                    <div id="variantsPreview" class="mt-4 grid grid-cols-1 gap-4 hidden">
                                        <!-- Dynamically added variants will be displayed here -->
                                    </div>
                                </div>
                                @error('variants')
                                <span class="text-red-600 text-sm" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('js/select2.min.js') }}"></script>


    <!-- Add Quill's CSS and JS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        function generateSlug(value) {
            const slug = value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            document.getElementById('slug').value = slug;
        }

        $(document).ready(function () {
            $('.select2').select2();
        });

        $(document).ready(function () {
            $('#featured_image').change(function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        $('#preview').attr('src', event.target.result);
                        $('#imagePreview').removeClass('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });

            $('#removeImage').click(function () {
                $('#featured_image').val(''); // Clear the file input
                $('#preview').attr('src', ''); // Clear the preview image
                $('#imagePreview').addClass('hidden'); // Hide the preview section
            });
        });

        // addition images preview
        $(document).ready(function () {
            $('#additional_images').change(function () {
                // Clear previous previews
                $('#additionalImagePreview').empty().removeClass('hidden');

                const files = this.files; // Get the selected files
                if (files.length > 0) {
                    // Loop through each file
                    $.each(files, function (index, file) {
                        const reader = new FileReader();

                        // Create a preview for each file
                        reader.onload = function (event) {
                            const previewHtml = `
                            <div class="relative inline-block">
                                <img src="${event.target.result}" class="w-full h-32 object-cover rounded-md border border-gray-300 shadow-md transition-transform duration-200 transform hover:scale-105" alt="Preview">
                                <button type="button" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 transform hover:scale-110 transition-transform duration-200 removeImage">
                                    &times;
                                </button>
                            </div>
                        `;
                            $('#additionalImagePreview').append(previewHtml);
                        };

                        // Read the file as a Data URL
                        reader.readAsDataURL(file);
                    });
                }
            });

            // Remove image preview when the remove button is clicked
            $('#additionalImagePreview').on('click', '.removeImage', function () {
                $(this).closest('div').remove(); // Remove the image preview
                // Hide preview container if no images are left
                if ($('#additionalImagePreview').children().length === 0) {
                    $('#additionalImagePreview').addClass('hidden');
                }
            });
        });

        $(document).ready(function () {
            $('#addVariant').click(function () {
                // Get values from the input fields
                const size = $('#size').val();
                const color = $('#color').val();
                const price = $('#variant_price').val();
                const sku = $('#variant_sku').val();
                const stock = $('#stock').val();
                console.log(size, color, price, sku, stock);
                // Validate input before adding
                if (size && color && price && sku && stock) {
                    // Generate a unique key for the new variant group (using timestamp)
                    const uniqueKey = Date.now();
                    console.log(uniqueKey);
                    // Create a new variant preview
                    const variantHtml = `
                    <div class="bg-gray-100 border border-gray-300 rounded-md p-4 flex justify-between items-center">
                        <div class="variant-group" data-key="${uniqueKey}">

                            <strong>Size:</strong> ${size},
                            <strong>Color:</strong> ${color},
                            <strong>Price:</strong> $${price},
                            <strong>SKU:</strong> ${sku},
                            <strong>Stock:</strong> ${stock}
                            <input type="hidden" name="variants[${uniqueKey}][size]" value="${size}">
                            <input type="hidden" name="variants[${uniqueKey}][color]" value="${color}">
                            <input type="hidden" name="variants[${uniqueKey}][price]" value="${price}">
                            <input type="hidden" name="variants[${uniqueKey}][sku]" value="${sku}">
                            <input type="hidden" name="variants[${uniqueKey}][stock]" value="${stock}">

                        </div>
                        <button type="button" class="text-red-600 removeVariant">&times;</button>
                    </div>
                `;

                    // Append the new variant to the preview section
                    $('#variantsPreview').append(variantHtml).removeClass('hidden');

                    // Clear input fields
                    $('#size').val('');
                    $('#color').val('');
                    $('#variant_price').val('');
                    $('#variant_sku').val('');
                    $('#stock').val('');
                } else {
                    // add red border which are empty
                    if (!size) $('#size').css('border', '1px solid red');
                    if (!color) $('#color').css('border', '1px solid red');
                    if (!price) $('#variant_price').css('border', '1px solid red');
                    if (!sku) $('#variant_sku').css('border', '1px solid red');
                    if (!stock) $('#stock').css('border', '1px solid red');
                }
            });

            // Remove variant from the preview
            $('#variantsPreview').on('click', '.removeVariant', function () {
                $(this).closest('div').remove();
                // Hide the preview section if no variants are left
                if ($('#variantsPreview').children().length === 0) {
                    $('#variantsPreview').addClass('hidden');
                }
            });
        });


        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],
            ['link', 'image', 'video', 'formula'],

            [{'header': 1}, {'header': 2}],               // custom button values
            [{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
            [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
            [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
            [{'direction': 'rtl'}],                         // text direction

            [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
            [{'header': [1, 2, 3, 4, 5, 6, false]}],

            [{'color': []}, {'background': []}],          // dropdown with defaults from theme
            [{'font': []}],
            [{'align': []}],

            // ['clean']                                         // remove formatting button
        ];
        <!-- Initialize Quill editor with advance -->
        // Select all elements with the class 'editor'
        var editors = document.querySelectorAll('.editor');
        // Loop through each element and initialize Quill
        editors.forEach(function(editor) {
            new Quill(editor, {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions,
                }
            });
        });

        const oldValueLong = document.querySelector('input[name="description"]').value;
        quill.root.innerHTML = oldValueLong; // Set Quill editor content to old value
        // Update the hidden input value before form submission
        document.querySelector('form').addEventListener('submit', function () {
            const fullDescriptionInput = document.querySelector('#description');
            fullDescriptionInput.value = quill.root.innerHTML; // Get the content from Quill editor
        });

        const oldValueShort = document.querySelector('input[name="short_description"]').value;
        quill.root.innerHTML = oldValueShort; // Set Quill editor content to old value
        // Update the hidden input value before form submission
        document.querySelector('form').addEventListener('submit', function () {
            const shortDescriptionInput = document.querySelector('#short_description');
            shortDescriptionInput.value = quill.root.innerHTML; // Get the content from Quill editor
        });
    </script>
</x-app-layout>
