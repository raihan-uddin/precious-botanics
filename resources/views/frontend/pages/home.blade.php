@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')

    <!-- image slider -->
    @if($sliders->count())
        <section class="relative">
            <!-- Swiper -->
            <div class="banner-swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($sliders as $banner)
                        <div class="swiper-slide">
                            <div class="h-full md:h-screen">
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{$banner->title}}"
                                 class="w-full h-full object-contain md:object-cover">
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <!-- Pagination -->--}}
{{--                <div class="swiper-pagination"></div>--}}

{{--                <!-- Navigation buttons -->--}}
{{--                <div class="swiper-button-next"></div>--}}
{{--                <div class="swiper-button-prev"></div>--}}
            </div>
        </section>
    @endif
    <!-- end image slider -->

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
                                <img class="lg:w-60 lg:h-60" src="{{ asset('storage/' . $product->featured_image) }}"
                                     alt="{{ $product->name }}">
                                <div class="contentBx absolute bottom-0 w-full h-24">
                                    <a href="#"><img class="w-6" src="{{asset('images/icons/icon_select_hover.png')}}" alt=""></a>
                                    <a href="#"><img class="w-6" src="{{asset('images/icons/icon_quick_view.png')}}"></a>
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
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper('.banner-swiper-container', {
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                /*pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },*/
                slidesPerView: 1, // Keep 1 slide per view across all devices
                centeredSlides: true,
            });
        });
    </script>

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
