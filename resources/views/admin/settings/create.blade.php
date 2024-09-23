<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="create-setting-form" enctype="multipart/form-data" x-data="settingForm()" @submit.prevent="submitForm">
                        @csrf
                        <div class="mb-4">
                            <label for="key" class="block text-sm font-medium text-gray-700">Key</label>
                            <input type="text" id="key" name="key" x-model="key" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

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

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function settingForm() {
            return {
                key: '',
                type: 'text',
                value: '',
                fileValue: null,

                updateInput() {
                    this.value = '';
                    this.fileValue = null;
                },

                fileChanged(event) {
                    this.fileValue = event.target.files[0];
                },

                async submitForm() {
                    let formData = new FormData();
                    formData.append('key', this.key);
                    formData.append('type', this.type);

                    if (this.type === 'file' && this.fileValue) {
                        formData.append('value', this.fileValue);
                    } else {
                        formData.append('value', this.value);
                    }

                    try {
                        const response = await axios.post("{{ route('settings.store') }}", formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        });
                        alert('Setting created successfully!');
                        window.location.href = "{{ route('settings.index') }}";  // Redirect to settings index
                    } catch (error) {
                        console.error('An error occurred:', error);
                        alert('An error occurred. Please try again.');
                    }
                }
            }
        }
    </script>
</x-app-layout>
