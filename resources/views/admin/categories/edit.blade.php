<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Update Category Form -->
                    <form x-data="categoryForm()" @submit.prevent="submitForm" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <input type="hidden" x-model="categoryId" />

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-input id="name" x-model="name" @input="generateSlug" class="block mt-1 w-full" type="text" required autofocus />
                            <span x-show="errors.name" class="text-red-600 text-sm" x-text="errors.name"></span>
                        </div>

                        <!-- Slug -->
                        <div>
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-input id="slug" x-model="slug" class="block mt-1 w-full" type="text" readonly required />
                            <span x-show="errors.slug" class="text-red-600 text-sm" x-text="errors.slug"></span>
                        </div>

                        <!-- Order Column -->
                        <div>
                            <x-input-label for="order_column" :value="__('Order Column')" />
                            <x-input id="order_column" x-model="order_column" class="block mt-1 w-full" type="number" required />
                            <span x-show="errors.order_column" class="text-red-600 text-sm" x-text="errors.order_column"></span>
                        </div>

                        <!-- Assign to Menus -->
                        <div>
                            <x-input-label for="menus" :value="__('Assign to Menus')" />
                            <select x-model="menus" id="menus" class="block mt-1 w-full" multiple>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" >{{ $menu->name }}</option>
                                @endforeach
                            </select>
                            <span x-show="errors.menus" class="text-red-600 text-sm" x-text="errors.menus"></span>
                        </div>

                        <!-- Show on sections -->
                        <div class="grid grid-cols-4 gap-4 mt-4">
                            <label>
                                <input type="checkbox" x-model="is_active" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Is Active') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="is_menu" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Is Menu') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_nav_menu" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Nav Menu') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_home" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Home') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_footer" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Footer') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_sidebar" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Sidebar') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_slider" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Slider') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_top" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Top') }}</span>
                            </label>
                            <label>
                                <input type="checkbox" x-model="show_on_bottom" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Show on Bottom') }}</span>
                            </label>
                        </div>

                        <!-- Icon -->
                        <div>
                            <x-input-label for="icon" :value="__('Icon')" />
                            <x-input id="icon" x-model="icon" class="block mt-1 w-full" type="text" />
                            <span x-show="errors.icon" class="text-red-600 text-sm" x-text="errors.icon"></span>
                        </div>

                        <!-- Image -->
                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            <input id="image" type="file" @change="fileChanged" class="block mt-1 w-full" accept="image/jpeg, image/jpg, image/png" />
                            <span x-show="errors.image" class="text-red-600 text-sm" x-text="errors.image"></span>

                             <!-- Show Previous Image -->
                            @if($category->image) <!-- Check if there is an existing image -->
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Uploaded Image" class="w-32 h-32 object-cover rounded-md" />
                                    <p class="text-sm text-gray-500 mt-1">Uploaded Image</p>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end">
                            <x-button class="ml-4">
                                {{ __('Update Category') }}
                            </x-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        function categoryForm() {
            return {
                categoryId: {{ $category->id }},
                name: '{{ $category->name }}',
                slug: '{{ $category->slug }}',
                order_column: {{ $category->order_column }},
                menus: {{ json_encode($category->menus->pluck('id')) }},
                is_menu: {{ $category->is_menu ? 'true' : 'false' }},
                is_active: {{ $category->is_active ? 'true' : 'false' }},
                show_on_home: {{ $category->show_on_home ? 'true' : 'false' }},
                show_on_nav_menu: {{ $category->show_on_nav_menu ? 'true' : 'false' }},
                show_on_footer: {{ $category->show_on_footer ? 'true' : 'false' }},
                show_on_sidebar: {{ $category->show_on_sidebar ? 'true' : 'false' }},
                show_on_slider: {{ $category->show_on_slider ? 'true' : 'false' }},
                show_on_top: {{ $category->show_on_top ? 'true' : 'false' }},
                show_on_bottom: {{ $category->show_on_bottom ? 'true' : 'false' }},
                icon: '{{ $category->icon }}',
                image: null,
                errors: {},

                generateSlug() {
                    this.slug = this.name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
                },

                fileChanged(event) {
                    this.image = event.target.files[0];
                },

                async submitForm() {
                    let formData = new FormData();
                    formData.append('_method', 'PUT'); // Add method spoofing
                    formData.append('name', this.name);
                    formData.append('slug', this.slug);
                    formData.append('order_column', this.order_column);
                    this.menus.forEach(menu => formData.append('menus[]', menu));

                    formData.append('is_menu', this.is_menu ? 1 : 0);
                    formData.append('is_active', this.is_active ? 1 : 0);
                    formData.append('show_on_home', this.show_on_home ? 1 : 0);
                    formData.append('show_on_nav_menu', this.show_on_nav_menu ? 1 : 0);
                    formData.append('show_on_footer', this.show_on_footer ? 1 : 0);
                    formData.append('show_on_sidebar', this.show_on_sidebar ? 1 : 0);
                    formData.append('show_on_slider', this.show_on_slider ? 1 : 0);
                    formData.append('show_on_top', this.show_on_top ? 1 : 0);
                    formData.append('show_on_bottom', this.show_on_bottom ? 1 : 0);
                    formData.append('icon', this.icon);

                    if (this.image) {
                        formData.append('image', this.image);
                    }

                    try {
                        const response = await axios.post("{{ route('categories.update', $category->id) }}", formData);
                        alert('Category updated successfully!');
                        window.location.href = "{{ route('categories.index') }}"; // Redirect after successful update
                    } catch (error) {
                        this.errors = error.response.data.errors || {};
                    }
                }
            }
        }
    </script>
</x-app-layout>
