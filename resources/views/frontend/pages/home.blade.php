@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')
@if($sliders)
<!-- Hero -->
<section class="section-hero mb-[50px] max-[1199px]:mb-[35px] py-[16px] relative bg-[#f8f8fb] overflow-hidden">
    <div
        class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full">
                <div class="hero-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($sliders as $key => $slider)
                        <div class="swiper-slide slide-{{$key++}}">
                            <div class="flex flex-wrap w-full mb-[-16px]">
                                <div class="w-full">
                                    <div class="hero-image relative  flex justify-center ">
                                        <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                                            class="w-full opacity-[1] ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination swiper-pagination-white"></div>
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bb-scroll-Page absolute right-[-15px] bottom-[75px] rotate-[270deg] max-[575px]:hidden">
        <span class="scroll-bar transition-all duration-[0.3s] ease-in-out relative max-[1250px]:hidden">
            <a href="javascript:void(0)"
                class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[16px] font-medium leading-[28px] tracking-[0.03rem] text-[#686e7d]">Scroll
                Page</a>
        </span>
    </div>
</section>
@endif

@if($mostLovedProducts)
<!-- Day of the deal -->
<section class="section-deal overflow-hidden py-[50px] max-[1199px]:py-[35px]">
    <div
        class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="section-title bb-deal mb-[20px] pb-[20px] z-[5] relative flex justify-between max-[991px]:pb-[0] max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="section-detail max-[991px]:mb-[12px]">
                        <h2
                            class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">
                            Most <span class="text-[#6c7fd8]">Loved</span> Products</h2>
                        <p
                            class="font-Poppins w-full mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">
                            Discover what's trending now. Find your favorite before it's gone!
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full px-[12px]">
                <div class="bb-deal-slider m-[-12px]">
                    <div class="bb-deal-block owl-carousel">
                        @foreach($mostLovedProducts as $product)
                        <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="200">
                            <x-product-thumb :product="$product" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if($featuredBanners)
@php
function randomColor() {
    // Generate random values for red, green, and blue, ensuring they are closer to 255 for a lighter color
    $min = 180; // Min value to avoid dark colors, closer to 255 for light colors
    $red = dechex(rand($min, 255));
    $green = dechex(rand($min, 255));
    $blue = dechex(rand($min, 255));

    // Ensure each value is two digits
    $red = str_pad($red, 2, '0', STR_PAD_LEFT);
    $green = str_pad($green, 2, '0', STR_PAD_LEFT);
    $blue = str_pad($blue, 2, '0', STR_PAD_LEFT);

    return "#" . $red . $green . $blue;
}
@endphp
<!-- Banner -->
<section class="section-banner-one overflow-hidden py-[50px] max-[1199px]:py-[35px]">
    <div
        class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full mb-[-24px]">
            @foreach ($featuredBanners as $banner)
            <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="400">
                <div
                    class="banner-box p-[30px] rounded-[20px] relative overflow-hidden bg-box-color-one bg-[{{ $banner->bg_color ?? randomColor() }}]">
                    <div class="inner-banner-box relative z-[1] flex justify-between max-[480px]:flex-col">
                        <div
                            class="side-image px-[12px] flex items-center max-[480px]:p-[0] max-[480px]:mb-[12px] max-[480px]:justify-center">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                                class="max-w-max w-[280px] h-[280px] max-[1399px]:w-[230px] max-[1399px]:h-[230px] max-[1199px]:w-[140px] max-[1199px]:h-[140px] max-[991px]:w-[280px] max-[991px]:h-[280px] max-[767px]:h-[200px] max-[767px]:w-[200px] max-[575px]:w-full max-[575px]:h-[auto] max-[480px]:w-[calc(100%-70px)]">
                        </div>
                        <div
                            class="inner-contact max-w-[250px] px-[12px] flex flex-col items-start justify-center max-[480px]:p-[0] max-[480px]:max-w-[100%] max-[480px]:text-center max-[480px]:items-center">
                            <h5
                                class="font-quicksand mb-[15px] text-[31px] text-[#3d4750] font-bold tracking-[0.03rem] text-[#3d4750] leading-[1.2] max-[991px]:text-[28px] max-[575px]:text-[24px] max-[480px]:mb-[2px] max-[480px]:text-[22px]">
                                {{ $banner->title }}
                            </h5>
                            <a href="{{ $banner->link }}"
                                class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')

@endpush