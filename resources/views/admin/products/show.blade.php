<x-app-layout>
    <x-slot name="title">
        {{ $product->name ?? config('app.name', 'Laravel') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-6">
                    <h3 class="text-2xl font-bold">{{ $product->name }}</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Product Image --}}
                        @if($product->image_url)
                            <div>
                                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="rounded-lg w-full object-cover">
                            </div>
                        @endif

                        {{-- Product Info --}}
                        <div>
                            <div class="mb-2">
                                <strong>Slug:</strong> <span>{{ $product->slug }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Vendor:</strong> <span>{{ $product->vendor }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>SKU:</strong> <span>{{ $product->sku }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Categories:</strong>
                                <ul class="list-disc ml-4">
                                    @foreach($product->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mb-2">
                                <strong>Tags:</strong>
                                <ul class="list-disc ml-4">
                                    @foreach($product->tags as $tag)
                                        <li>{{ $tag->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mb-2">
                                <strong>Status:</strong> <span>{{ ucfirst($product->status) }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Published At:</strong> <span>{{ $product->published_at }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Price:</strong> <span>${{ number_format($product->price, 2) }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Stock Quantity:</strong> <span>{{ $product->stock_quantity > 0 ? $product->stock_quantity . ' in stock' : 'Out of stock' }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Allow Out of Stock Orders:</strong> <span>{{ $product->allow_out_of_stock_orders ? 'Yes' : 'No' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Descriptions --}}
                    <div class="space-y-4">
                        <div>
                            <strong>Short Description:</strong>
                            <p class="mt-1 text-gray-700">{!! $product->short_description !!}</p>
                        </div>
                        <div>
                            <strong>Full Description:</strong>
                            <p class="mt-1 text-gray-700">{!! $product->description !!}</p>
                        </div>
                    </div>

                    {{-- Additional Images --}}
                    @if($product->images->isNotEmpty())
                        <div class="mt-6">
                            <strong>Additional Images:</strong>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                                @foreach($product->images as $image)
                                    <div class="rounded overflow-hidden shadow">
                                        <img src="{{ asset($image->image_url) }}" alt="{{ $image->caption }}" class="w-full h-32 object-contain">
                                        <p class="text-sm text-gray-600 text-center">{{ $image->caption }}</p>
                                    </div>                                
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Actions --}}
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit Product</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $product->name }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
