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
            <!-- Swiper Container -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($mostLovedProducts as $product)
                        <div class="swiper-slide">
                            <div class="w-48 h-auto lg:w-80 h-full relative card">
                                <div class="relative h-72 w-full flex justify-center items-center">
                                    <img class="lg:w-60 lg:h-60"
                                         src="{{ asset('storage/' . $product->featured_image) }}"
                                         alt="{{ $product->name }}">
                                    <div class="contentBx absolute bottom-0 w-full h-24">
                                        <a href="#"><img class="w-6"
                                                         src="{{asset('images/icons/icon_select_hover.png')}}"
                                                         alt=""></a>
                                        <a href="#"><img class="w-6"
                                                         src="{{asset('images/icons/icon_quick_view.png')}}"></a>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <p class="text-xl hover:text-primary cursor-pointer">{{ $product->name }}</p>
                                    <p>${{ $product->price }}</p>
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
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,  // Default for small devices
            spaceBetween: 10,
            loop: false,  // No looping
            navigation: false,  // No navigation arrows
            pagination: false,  // No pagination dots
            breakpoints: {
                640: {
                    slidesPerView: 2,  // For devices 640px and larger
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,  // For devices 768px and larger
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,  // For devices 1024px and larger
                    spaceBetween: 40,
                },
                1440: {
                    slidesPerView: 5,  // For devices 1440px and larger
                    spaceBetween: 50,
                }
            },
        });
    </script>

@endpush
