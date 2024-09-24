<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Settings') }} -->
            <a href="{{ route('settings.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                {{ __('Create Setting') }}
            </a>
            {{-- <h1>{{ \App\Helpers\SettingsHelper::get('site_email', 'Default Site Name') }}</h1> --}}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div id="toast" class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white text-sm rounded-lg p-4">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Hide the toast message after 3 seconds
                            setTimeout(() => {
                                const toast = document.getElementById('toast');
                                toast.style.display = 'none';
                            }, 3000);
                        </script>
                    @endif

                    <div class="mb-4">
                        <input type="text" id="search" placeholder="Search..." class="border rounded px-3 py-2 w-full" />
                    </div>

                    <!-- <div class="mb-4">
                        <a href="{{ route('settings.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                            {{ __('Create Setting') }}
                        </a>
                    </div> -->

                    <table class="min-w-full divide-y divide-gray-200" id="settings-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($settings as $setting)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $setting->key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($setting->type === 'file')
                                            <a href="{{ asset('storage/' . $setting->value) }}" target="_blank" class="text-blue-600 hover:underline">Preview</a>
                                        @else
                                            {{ $setting->value }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $setting->type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('settings.edit', $setting->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('settings.destroy', $setting->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event, '{{ $setting->key }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Controls -->
                    <div class="mt-4">
                        <!-- Add pagination controls here if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event, settingKey) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this setting?')) {
                const form = event.target;
                form.submit();

                // Show toast notification (if needed)
                const toast = document.getElementById('toast');
                if (toast) {
                    toast.classList.remove('hidden');
                    toast.classList.add('block');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search');
            const tableRows = document.querySelectorAll('#settings-table tbody tr');

            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();
                tableRows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    const rowContainsSearchTerm = Array.from(cells).some(cell => 
                        cell.textContent.toLowerCase().includes(searchTerm)
                    );
                    row.style.display = rowContainsSearchTerm ? '' : 'none';
                });
            });
        });
    </script>
</x-app-layout>
