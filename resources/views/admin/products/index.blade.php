<x-app-layout>
    <x-slot name="title">
        {{ $pageTitle ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                {{ __('Create Product') }}
            </a>
        </h2>

        <!-- Dropdown Menu -->
        <!-- Dropdown Menu on the Right Side -->
        <div class="relative inline-block text-left float-right" x-data="{ open: false }">
            <button @click="open = !open" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Menu
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown panel on the right side -->
            <div x-show="open" @click.outside="open = false" x-transition class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <!-- Dropdown Links -->
                    <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Categories</a>
                    <a href="{{ route('tags.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tags</a>
                </div>
            </div>
        </div>
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
                            setTimeout(() => {
                                const toast = document.getElementById('toast');
                                toast.style.display = 'none';
                            }, 3000);
                        </script>
                    @endif

                    <!-- Filters -->
                    <div class="mb-4">
                        <form method="GET" action="{{ route('products.index') }}">
                            <div class="grid grid-cols-6 gap-4">
                                <input type="text" name="filter[name]" value="{{ $filter['name'] ?? '' }}" placeholder="Search by name" class="border rounded px-3 py-2 w-full" />
                                <input type="number" name="filter[min_price]" value="{{ $filter['min_price'] ?? '' }}" placeholder="Min price" class="border rounded px-3 py-2 w-full" />
                                <input type="number" name="filter[max_price]" value="{{ $filter['max_price'] ?? '' }}" placeholder="Max price" class="border rounded px-3 py-2 w-full" />
                                <select name="filter[status]" class="border rounded px-3 py-2 w-full">
                                    <option value="">{{ __('Filter by status') }}</option>
                                    <option value="draft" {{ ($filter['status'] ?? '') == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                                    <option value="published" {{ ($filter['status'] ?? '') == 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                                    <option value="archived" {{ ($filter['status'] ?? '') == 'archived' ? 'selected' : '' }}>{{ __('Archived') }}</option>
                                </select>                                   
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">{{ __('Filter') }}</button>
                                <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md">{{ __('Reset') }}</a>
                            </div>
                        </form>
                    </div>

                    <!-- Products Table -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        
                            @foreach($products as $product)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    
                                        <hr>
                                        @if($product->featured_image)
                                            <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->featured_image }}" class="w-16 h-16 object-cover">
                                        @else
                                            <span class="text-gray-500">{{ __('No Image') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->sku }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($product->status) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' in stock' : 'Out of stock' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event, '{{ $product->name }}');">
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
                        {{ $products->links() }} <!-- This will render the pagination controls -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event, productName) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete the product "' + productName + '"?')) {
                const form = event.target;
                form.submit();
            }
        }
    </script>
</x-app-layout>
