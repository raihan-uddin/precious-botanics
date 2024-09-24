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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">{{ $product->name }}</h3>

                    <div class="mb-4">
                        <strong>Slug:</strong>
                        <span>{{ $product->slug }}</span>
                    </div>

                    <div class="mb-4">
                        <strong>SKU:</strong>
                        <span>{{ $product->sku }}</span>
                    </div>

                    <div class="mb-4">
                        <strong>Description:</strong>
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="mb-4">
                        <strong>Price:</strong>
                        <span>${{ number_format($product->price, 2) }}</span>
                    </div>

                    <div class="mb-4">
                        <strong>Stock Quantity:</strong>
                        <span>{{ $product->stock_quantity }}</span>
                    </div>

                    @if($product->image)
                        <div class="mb-4">
                            <strong>Product Image:</strong>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mt-2 w-1/4">
                        </div>
                    @endif

                    <div class="mb-4">
                        <strong>Variations:</strong>
                        <ul>
                            @foreach($product->variations as $variation)
                                <li>
                                    Type: {{ $variation->variation_type }} |
                                    Value: {{ $variation->variation_value }} |
                                    Price: ${{ number_format($variation->price, 2) }} |
                                    Stock: {{ $variation->stock_quantity }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-4">
                        <strong>Attributes:</strong>
                        <ul>
                            @foreach($product->attributes as $attribute)
                                <li>
                                    {{ $attribute->key }}: {{ $attribute->value }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-4">
                        <strong>Tags:</strong>
                        <ul>
                            @foreach($product->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-4">
                        <strong>Additional Images:</strong>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($product->images as $image)
                                <div>
                                    <img src="{{ asset($image->image_path) }}" alt="Additional Image" class="w-full">
                                    <p class="text-sm">{{ $image->caption }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit Product</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
