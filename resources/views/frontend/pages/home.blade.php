@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')

    @if($sliders)
        <!-- Banner Swiper -->
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-[800px]">
                @foreach($sliders as $banner)
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-linear" data-carousel-item>
                        <img src="{{ asset('storage/' . $banner->image) }}"
                             class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach($sliders as $key => $banner)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="{{$key}}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
        <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
        <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>
        <!-- ./Banner Swiper -->
    @endif

    <!-- Featured banner card -->
    @if($featuredBanners->count())
        <section class="bg-white p-4 flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 space-y-2 space-x-2">
                @foreach($featuredBanners as $banner)
                    <div class="relative flex items-end justify-center overflow-hidden">
                        <img class="" id="img-product" src="{{ asset('storage/' . $banner->image) }}">
                        <div class="absolute bottom-8">
                            <!-- Button with hover effect to show the image -->
                            <button class="button-container">
                                <span class="button-text">{{$banner->title}}</span>
                                <img class="button-img" src="{{ asset('images/icons/right-arrow.png') }}" alt="Arrow">
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    <!-- ./Featured banner card -->

    @if($mostLovedProducts)
        <!-- Most Loved Products -->
        <section class="most-product section-gap px-2">
            <div class="flex items-center justify-center my-8">
                <h1 class="font-semibold text-2xl lg:text-5xl">Most Loved Products</h1>
            </div>

            <!-- Product Carousel -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($mostLovedProducts as $product)
                        <!-- Product Card -->
                        <div class="swiper-slide">
                            <div class="w-full h-auto relative card group"> <!-- Added group class for hover effects -->
                                <!-- Product Image -->
                                <div class="relative h-60 w-full flex justify-center items-center">
                                    <img class="lg:w-60 lg:h-60 object-contain"
                                         src="{{ asset('storage/' . $product->featured_image) }}" alt="Product 1">
                                    <!-- SVG Icons -->
                                    <div class="absolute inset-0 flex flex-col justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <!-- Hidden by default -->
                                        <a href="#" class="text-center mt-4">
                                            <img class="w-8 h-8" src="{{ asset('images/icons/icon_select_hover.png') }}"
                                                 alt="Add to Cart">
                                        </a>
                                        <a href="#" class="text-center mb-4">
                                            <img class="w-8 h-8" src="{{ asset('images/icons/icon_quick_view.png') }}"
                                                 alt="View Product">
                                        </a>
                                    </div>
                                </div>
                                <!-- Product Title and Price -->
                                <div class="px-4 text-center h-32 flex flex-col justify-between">
                                    <p class="text-xl hover:text-primary cursor-pointer">{{ $product->name }}</p>
                                    <p class="text-lg font-semibold text-gray-700">
                                        ${{ number_format($product->price, 2) }}</p> <!-- Properly formatted price -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- ./Most Loved Products -->
    @endif

@endsection

@push('scripts')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1, // Default to 1 item on small screens
            spaceBetween: 20,
            breakpoints: {
                640: {
                    slidesPerView: 1, // 1 item on small screens
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3, // 3 items on medium devices
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3, // 3 items on medium devices
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 5, // 5 items on large devices
                    spaceBetween: 40,
                },
            },
            draggable: true,
            // Disable navigation buttons by simply not adding them
        });
    </script>

@endpush
