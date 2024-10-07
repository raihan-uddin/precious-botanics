@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')

    <!-- image slider -->
    @if($sliders->count())
        <section class="relative">
            <!-- Swiper -->
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($sliders as $banner)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{$banner->title}}"
                                 class="w-full h-auto object-cover">
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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
        <!-- most loved product -->
        <section class="most-product section-gap px-2">
            <div class="flex items-center justify-center my-8">
                <h1 class="font-semibold text-2xl lg:text-5xl">Most Loved Products</h1>
            </div>
            <ul id="autoWidth" class="cs-hidden">
                @foreach($mostLovedProducts as $product)
                    <li class="item-a">
                        <div class=" w-48 h-auto lg:w-80 h-ful relative card">
                            <div class="relative h-72 w-full flex justify-center items-center">
                                <img class="lg:w-60 lg:h-60" src="{{ asset('storage/' . $product->featured_image) }}"
                                     alt="Product 1">
                                <div class="contentBx absolute bottom-0 w-full h-24">
                                    <a href="#"><img class="w-6" src="{{asset('images/icons/icon_select_hover.png')}}" alt=""></a>
                                    <a href="#"><img class="w-6" src="{{asset('images/icons/icon_quick_view.png')}}"></a>
                                </div>
                            </div>
                            <div class="px-4">
                                <p class="text-xl hover:text-primary cursor-pointer">{{ $product->name }}</p>
                                <p>${{$product->price}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- ./most loved product -->
    @endif

@endsection
@push('scripts')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1, // Keep 1 slide per view across all devices
                centeredSlides: true,
            });
        });
    </script>

@endpush