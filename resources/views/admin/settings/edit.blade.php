<x-app-layout>

    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Setting') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="editSettingForm({{ $setting }})">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div x-show="showToast" x-transition class="fixed top-0 right-0 mt-4 mr-4" role="alert">
                        <div :class="{'bg-green-500': toastType === 'success', 'bg-red-500': toastType === 'danger', 'bg-blue-500': toastType === 'info'}" class="text-white text-sm rounded-lg p-4">
                            <span x-text="message"></span>
                            <button @click="showToast = false" class="ml-2 text-white hover:text-gray-200">&times;</button>
                        </div>
                    </div>
                    

                    <form id="edit-setting-form" enctype="multipart/form-data" @submit.prevent="submitForm">
                        @csrf
                        @method('PUT') <!-- To indicate it's an update request -->

                        <!-- Key -->
                        <div class="mb-4">
                            <label for="key" class="block text-sm font-medium text-gray-700">Key</label>
                            <input type="text" id="key" name="key" x-model="key" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required disabled>
                        </div>

                        <!-- Type -->
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type" x-model="type" @change="updateInput" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="text">Text</option>
                                <option value="email">Email</option>
                                <option value="file">File</option>
                                <option value="number">Number</option>
                                <option value="textarea">Textarea</option>
                            </select>
                        </div>

                        <!-- Value -->
                        <div class="mb-4">
                            <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                            <div id="value-input">
                                <template x-if="type === 'text' || type === 'email' || type === 'number'">
                                    <input :type="type" id="value" name="value" x-model="value" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </template>

                                <template x-if="type === 'file'">
                                    <input type="file" id="value" name="value" @change="fileChanged" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </template>

                                <template x-if="type === 'textarea'">
                                    <textarea id="value" name="value" x-model="value" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </template>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                Save Changes
                            </button>
                            <a href="{{ route('settings.index') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editSettingForm(setting) {
            return {
                key: setting.key,
                type: setting.type,
                value: setting.value,
                fileValue: null,
                showToast: false,
                message: '',
                toastType: 'success', // Default toast type

                updateInput() {
                    this.value = setting.value;
                    this.fileValue = null;
                },

                fileChanged(event) {
                    this.fileValue = event.target.files[0];
                },

                async submitForm() {
                    let formData = new FormData();
                    formData.append('_method', 'PUT');
                    formData.append('key', this.key);
                    formData.append('type', this.type);

                    if (this.type === 'file' && this.fileValue) {
                        formData.append('value', this.fileValue);
                    } else {
                        formData.append('value', this.value);
                    }

                    try {
                        const response = await axios.post("{{ route('settings.update', $setting->id) }}", formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        });
                        this.message = 'Setting updated successfully!';
                        this.toastType = 'success'; // Set toast type to success
                    } catch (error) {
                        console.error('An error occurred:', error);
                        this.message = 'An error occurred. Please try again.';
                        this.toastType = 'danger'; // Set toast type to danger
                    } finally {
                        this.showToast = true;
                        setTimeout(() => this.showToast = false, 3000); // Hide toast after 3 seconds
                        if (this.toastType === 'success') {
                            window.location.href = "{{ route('settings.index') }}"; // Redirect to settings index if success
                        }
                    }
                }
            }
        }

    </script>
    
</x-app-layout>
