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
                        <div id="toast" class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white text-sm rounded-lg p-4">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                const toast = document.getElementById('toast');
                                toast.style.display = 'none';
                            }, 3000);
                        </script>
                    @endif
                    <form x-data="productForm()" @submit.prevent="submitForm" enctype="multipart/form-data" class="space-y-6 ">
                        @csrf
                        <div>
                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <!-- Product Name -->
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__('Product Name')" />
                                    <x-input id="name" x-model="name" @input="generateSlug" class="block mt-1 w-full" type="text" required autofocus />
                                    <span x-show="errors.name" class="text-red-600 text-sm" x-text="errors.name"></span>
                                </div>
                                <!-- Product Slug -->
                                <div class="mb-4">
                                    <x-input-label for="slug" :value="__('Product Slug')" />
                                    <x-input id="slug" x-model="slug" class="block mt-1 w-full" type="text" readonly required />
                                    <span x-show="errors.slug" class="text-red-600 text-sm" x-text="errors.slug"></span>
                                </div>
                                
                                <!-- Product SKU -->
                                <div class="mb-4">
                                    <x-input-label for="sku" :value="__('Product SKU')" />
                                    <x-input id="sku" x-model="sku" class="block mt-1 w-full" type="text" required />
                                    <span x-show="errors.sku" class="text-red-600 text-sm" x-text="errors.sku"></span>
                                </div>
                            </div>

                            <!-- Assign to Product Categories --> 
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div class="mb-4">
                                    <x-input-label for="categories" :value="__('Assign to Categories')" />
                                    <select x-model="categories" id="categories" class="block mt-1 w-full" multiple required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span x-show="errors.categories" class="text-red-600 text-sm" x-text="errors.categories"></span>
                                </div>

                                <!-- Assign to Product Tags -->
                                <div class="mb-4">
                                    <x-input-label for="tags" :value="__('Assign to Tags')" />
                                    <div class="border rounded px-3 py-2 w-full" x-data="{ newTag: '', tags: [] }">
                                        <template x-for="(tag, index) in tags" :key="index">
                                            <span class="inline-flex items-center bg-blue-100 text-blue-800 text-sm rounded px-1 py-1 mr-2 mt-2 mb-2">
                                                <span x-text="tag"></span>
                                                <button type="button" @click="tags.splice(index, 1)" class="ml-2 text-red-600">&times;</button>
                                            </span>
                                        </template>
                                        <input type="hidden" name="tags" :value="tags.join(',')">
                                        <input type="text" x-model="newTag" class="border rounded px-3 py-2 w-full" placeholder="Add a tag" @keydown.enter.prevent="if (newTag) { tags.push(newTag); newTag = ''; }">
                                    </div>
                                    <span x-show="errors.tags" class="text-red-600 text-sm" x-text="errors.tags"></span>
                                </div>
                            </div>


                            <!-- Short Description -->
                            <div class="mb-4">
                                <x-input-label for="short_description" :value="__('Short Description')" />
                                <textarea id="short_description" x-model="short_description" class="block mt-1 w-full" rows="3"></textarea>
                                <span x-show="errors.short_description" class="text-red-600 text-sm" x-text="errors.short_description"></span>
                            </div>

                            
                            <!-- Full Description (Quill WYSIWYG Editor) -->
                            <div class="mb-4" x-data="quillEditorHandler()">
                                <x-input-label for="description" :value="__('Full Description')" />
                                <div id="quillEditor" class="block mt-1 w-full h-48 bg-white"></div>
                                <input type="hidden" id="description" name="description" x-model="description">
                                <span x-show="errors.description" class="text-red-600 text-sm" x-text="errors.description"></span>
                            </div>
                            

                            <!-- price -->
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <!-- price -->
                                <div class="mb-4">
                                    <x-input-label for="price" :value="__('Price')" />
                                    <x-input id="price" x-model="price" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.price" class="text-red-600 text-sm" x-text="errors.price"></span>
                                </div>
                                <!-- discount_price -->
                                <div class="mb-4">
                                    <x-input-label for="discount_price" :value="__('Special Price')" />
                                    <x-input id="discount_price" x-model="discount_price" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.discount_price" class="text-red-600 text-sm" x-text="errors.price"></span>
                                </div>

                                <!-- tax_rate -->
                                <div class="mb-4">
                                    <x-input-label for="tax_rate" :value="__('Tax Rate')" />
                                    <x-input id="tax_rate" x-model="tax_rate" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.tax_rate" class="text-red-600 text-sm" x-text="errors.tax_rate"></span>
                                </div>

                                <!-- is_taxable -->
                                <div class="mb-4">
                                    <x-input-label for="is_taxable" :value="__('Is Taxable')" />
                                    <select id="is_taxable" x-model="is_taxable" class="block mt-1 w-full" required>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    <span x-show="errors.is_taxable" class="text-red-600 text-sm" x-text="errors.is_taxable"></span>
                                </div>
                            </div>

                            <!-- Stock management -->
                            <div class="grid grid-cols-6 gap-4 mt-4">
                                <!-- stock_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="stock_quantity" :value="__('Stock Quantity')" />
                                    <x-input id="stock_quantity" x-model="stock_quantity" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.stock_quantity" class="text-red-600 text-sm" x-text="errors.stock_quantity"></span>
                                </div>

                                <!-- in_stock -->
                                <div class="mb-4">
                                    <x-input-label for="in_stock" :value="__('In Stock')" />
                                    <select id="in_stock" x-model="in_stock" class="block mt-1 w-full" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span x-show="errors.in_stock" class="text-red-600 text-sm" x-text="errors.in_stock"></span>
                                </div>

                                <!-- allow_out_of_stock_orders -->
                                <div class="mb-4">
                                    <x-input-label for="allow_out_of_stock_orders" :value="__('Allow Out of Stock Orders')" />
                                    <select id="allow_out_of_stock_orders" x-model="allow_out_of_stock_orders" class="block mt-1 w-full" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span x-show="errors.allow_out_of_stock_orders" class="text-red-600 text-sm" x-text="errors.allow_out_of_stock_orders"></span>
                                </div>

                                <!-- min_order_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="min_order_quantity" :value="__('Minimum Order Quantity')" />
                                    <x-input id="min_order_quantity" x-model="min_order_quantity" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.min_order_quantity" class="text-red-600 text-sm" x-text="errors.min_order_quantity"></span>
                                </div>

                                <!-- max_order_quantity -->
                                <div class="mb-4">
                                    <x-input-label for="max_order_quantity" :value="__('Maximum Order Quantity')" />
                                    <x-input id="max_order_quantity" x-model="max_order_quantity" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.max_order_quantity" class="text-red-600 text-sm" x-text="errors.max_order_quantity"></span>
                                </div>
                                
                            </div>

                            <!-- Product Additional metadata -->
                            <div class="grid grid-cols-5 gap-4 mt-4">
                                <!-- barcode -->
                                <div class="mb-4">
                                    <x-input-label for="barcode" :value="__('Barcode')" />
                                    <x-input id="barcode" x-model="barcode" class="block mt-1 w-full" type="text" required />
                                    <span x-show="errors.barcode" class="text-red-600 text-sm" x-text="errors.barcode"></span>
                                </div>

                                <!-- weight -->
                                <div class="mb-4">
                                    <x-input-label for="weight" :value="__('Weight')" />
                                    <x-input id="weight" x-model="weight" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.weight" class="text-red-600 text-sm" x-text="errors.weight"></span>
                                </div>

                                <!-- length -->
                                <div class="mb-4">
                                    <x-input-label for="length" :value="__('Length')" />
                                    <x-input id="length" x-model="length" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.length" class="text-red-600 text-sm" x-text="errors.length"></span>
                                </div>

                                <!-- width -->
                                <div class="mb-4">
                                    <x-input-label for="width" :value="__('Width')" />
                                    <x-input id="width" x-model="width" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.width" class="text-red-600 text-sm" x-text="errors.width"></span>
                                </div>

                                <!-- height -->
                                <div class="mb-4">
                                    <x-input-label for="height" :value="__('Height')" />
                                    <x-input id="height" x-model="height" class="block mt-1 w-full" type="number" required />
                                    <span x-show="errors.height" class="text-red-600 text-sm" x-text="errors.height"></span>
                                </div>
                            </div>
                            <!-- Product visibility options -->
                            <div class="grid grid-cols-4 gap-4 mt-4">
                                <!-- is_is_featured -->
                                <div class="mb-4">
                                    <x-input-label for="is_featured" :value="__('Is Featured')" />
                                    <select id="is_featured" x-model="is_featured" class="block mt-1 w-full" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span x-show="errors.is_featured" class="text-red-600 text-sm" x-text="errors.is_featured"></span>
                                </div>
                                <!-- is_visible -->
                                <div class="mb-4">
                                    <x-input-label for="is_visible" :value="__('Is Visible')" />
                                    <select id="is_visible" x-model="is_visible" class="block mt-1 w-full" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span x-show="errors.is_visible" class="text-red-600 text-sm" x-text="errors.is_visible"></span>
                                </div>
                                <!-- is_digital -->
                                <div class="mb-4">
                                    <x-input-label for="is_digital" :value="__('Is Digital')" />
                                    <select id="is_digital" x-model="is_digital" class="block mt-1 w-full" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <span x-show="errors.is_digital" class="text-red-600 text-sm" x-text="errors.is_digital"></span>
                                </div>
                                <!-- status: 'draft', 'published', 'archived' -->
                                <div class="mb-4">
                                    <x-input-label for="status" :value="__('Status')" />
                                    <select id="status" x-model="status" class="block mt-1 w-full" required>
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                        <option value="archived">Archived</option>
                                    </select>
                                    <span x-show="errors.status" class="text-red-600 text-sm" x-text="errors.status"></span>
                                </div>
                            </div>

                            <!-- Product Image -->
                            <div x-data="imageUpload()" class="mb-4">
                                <x-input-label for="image" :value="__('Product Image')" />
                                <!-- Image Input -->
                                <input id="image" class="block mt-1 w-full" type="file" @change="fileChanged" />
                                
                                <!-- Error Handling -->
                                <span x-show="errors.image" class="text-red-600 text-sm" x-text="errors.image"></span>
                            
                                <!-- Preview Section -->
                                <template x-if="imageUrl">
                                    <div class="mt-4">
                                        <img :src="imageUrl" class="w-32 h-32 object-cover rounded-md" alt="Preview">
                                        <button type="button" @click="removeImage" class="mt-2 text-red-600">Remove Image</button>
                                    </div>
                                </template>
                            </div>

                            <!-- Additional Images -->
                            <div x-data="imageHandler()" class="mb-4">
                                <label class="block text-gray-700">Additional Images</label>
                                
                                <!-- Template for each image input -->
                                <template x-for="(img, index) in imageList" :key="index">
                                    <div class="flex space-x-2 mb-2 items-center">
                                        <!-- Image preview -->
                                        <template x-if="img.preview">
                                            <img :src="img.preview" class="w-16 h-16 object-cover rounded-md" alt="Preview">
                                        </template>
                                        
                                        <!-- Image file input -->
                                        <input type="file" :name="'images[' + index + '][image_path]'" accept="image/*" class="border rounded px-3 py-2 w-1/4" @change="handleImagePreview(index, $event)">
                                        
                                        <!-- Caption input -->
                                        <input type="text" :name="'images[' + index + '][caption]'" placeholder="Caption" class="border rounded px-3 py-2 w-1/4" x-model="img.caption">
                                        
                                        <!-- Order input -->
                                        <input type="text" :name="'images[' + index + '][order]'" placeholder="Order" class="border rounded px-3 py-2 w-1/4" x-model="img.order">
                                        
                                        <!-- Featured checkbox -->
                                        <label class="border rounded px-3 py-2 w-1/4">
                                            <input type="checkbox" :name="'images[' + index + '][is_featured]'" value="1" x-model="img.is_featured"> Featured
                                        </label>
                                        
                                        <!-- Delete image button -->
                                        <button type="button" @click="deleteImage(index)" class="ml-2 text-red-600">&times;</button>
                                    </div>
                                </template>
                            
                                <!-- Add Image button -->
                                <button type="button" @click="addNewImage()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Image</button>
                            </div>
                            


                        </div>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Product</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Add Quill's CSS and JS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        function productForm() {
            return {
                name: '',
                slug: '',
                sku: '',
                short_description: '',
                description: '',
                price: 0,
                discount_price: 0,
                tax_rate: 0,
                is_taxable: 0,
                stock_quantity: 0,
                in_stock: 1,
                allow_out_of_stock_orders: 1,
                min_order_quantity: 1,
                max_order_quantity: 1,
                barcode: '',
                weight: 0,
                length: 0,
                width: 0,
                height: 0,
                is_featured: 0,
                is_visible: 1,
                is_digital: 0,
                status: 'published',
                categories: [],
                tags: [],
                image: null,
    
                errors: {},
    
                generateSlug() {
                    this.slug = this.name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
                },
    
                imageUpload() {
                    return {
                        image: null,
                        imageUrl: null,
                        errors: { image: '' },
                        
                        fileChanged(event) {
                            const file = event.target.files[0];
                            
                            // Check if a file was selected
                            if (!file) {
                                this.errors.image = 'Please select an image file.';
                                this.image = null; // Reset image
                                return;
                            }

                            // Validate file type
                            if (!file.type.startsWith('image/')) {
                                this.errors.image = 'Only image files are allowed.';
                                this.image = null; // Reset image
                                return;
                            }

                            this.errors.image = ''; // Clear any previous error
                            this.image = file; // Set the file to the image variable
                            
                            // Preview the image
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.imageUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        },
                        
                        removeImage() {
                            this.imageUrl = null; // Clear image URL
                            this.image = null; // Reset image
                            this.errors.image = ''; // Clear any error message
                            document.getElementById('image').value = ''; // Clear input field
                        }
                    };
                },
                imageHandler() {
                    return {
                        imageList: [], // Array to store image data
                        
                        // Add a new empty image entry
                        addNewImage() {
                            this.imageList.push({
                                preview: null,
                                caption: '',
                                order: '',
                                is_featured: false,
                                file: null // Store file for preview
                            });
                        },
                        
                        // Update image preview when a file is selected
                        handleImagePreview(index, event) {
                            const file = event.target.files[0];
                            if (file) {
                                this.imageList[index].file = file;
                                
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    this.imageList[index].preview = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        },
                        
                        // Remove an image entry
                        deleteImage(index) {
                            this.imageList.splice(index, 1);
                        }
                    };
                },
    
                quillEditorHandler() {
                    return {
                        description: '', // Holds the Quill content
    
                        init() {
                            var quill = new Quill('#quillEditor', {
                                theme: 'snow',
                                modules: {
                                    toolbar: [
                                        [{ 'header': [1, 2, false] }],
                                        ['bold', 'italic', 'underline'],
                                        ['link', 'blockquote', 'code-block'],
                                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                        [{ 'align': [] }],
                                    ]
                                },
                                placeholder: 'Type your description here...'
                            });
    
                            // Set the initial content if there is any
                            quill.root.innerHTML = this.description;
    
                            // Sync the Quill editor content with the Alpine.js description model
                            quill.on('text-change', () => {
                                this.description = quill.root.innerHTML;
                            });
                        }
                    };
                },
    
                async submitForm() {
                    let formData = new FormData();
                    formData.append('name', this.name);
                    formData.append('slug', this.slug);
                    formData.append('sku', this.sku);
                    formData.append('short_description', this.short_description);
                    formData.append('description', this.description);
                    formData.append('price', this.price);
                    formData.append('discount_price', this.discount_price);
                    formData.append('tax_rate', this.tax_rate);
                    formData.append('is_taxable', this.is_taxable);
                    formData.append('stock_quantity', this.stock_quantity);
                    formData.append('in_stock', this.in_stock);
                    formData.append('allow_out_of_stock_orders', this.allow_out_of_stock_orders);
                    formData.append('min_order_quantity', this.min_order_quantity);
                    formData.append('max_order_quantity', this.max_order_quantity);
                    formData.append('barcode', this.barcode);
                    formData.append('weight', this.weight);
                    formData.append('length', this.length);
                    formData.append('width', this.width);
                    formData.append('height', this.height);
                    formData.append('is_featured', this.is_featured);
                    formData.append('is_visible', this.is_visible);
                    formData.append('is_digital', this.is_digital);
                    formData.append('status', this.status);
    
                    // Add categories and tags as arrays
                    this.categories.forEach(category => formData.append('categories[]', category));
                    this.tags.forEach(tag => formData.append('tags[]', tag));

                    console.log("Categories:", this.categories);

                    console.log("Tags:", this.tags);
                    console.log("FormData:", formData);
                    // Add the main image if available
                    if (this.image) {
                        console.log("Main image:", this.image);
                        formData.append('image', this.image);
                    }
    
                    // Add additional images
                    this.imageHandler().imageList.forEach((imageData, index) => {
                        console.log(`Image ${index}:`, imageData.file);
                        if (imageData.file) {
                            formData.append(`additional_images[${index}][file]`, imageData.file);
                            formData.append(`additional_images[${index}][caption]`, imageData.caption);
                            formData.append(`additional_images[${index}][order]`, imageData.order);
                            formData.append(`additional_images[${index}][is_featured]`, imageData.is_featured ? 1 : 0);
                        }
                    });
    
                    try {
                        const response = await axios.post("{{ route('products.store') }}", formData);
                        alert('Product created successfully!');
                        // window.location.href = "{{ route('products.index') }}";
                    } catch (error) {
                        if (error.response && error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        } else {
                            console.error(error);
                            alert('An error occurred. Please try again.');
                        }
                    }
                }
            }
        }
    </script>
</x-app-layout>
