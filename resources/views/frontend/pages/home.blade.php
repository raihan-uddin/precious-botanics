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
                                                    <img src="{{ asset('storage/' . $slider->image) }}"
                                                         alt="{{ $slider->title }}"
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
                       class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[16px] font-medium leading-[28px] tracking-[0.03rem] text-[#686e7d]">Scroll Page</a>
                </span>
            </div>
        </section>
    @endif

    <!-- Banner-one -->
    <section class="section-banner-one overflow-hidden py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="banner-box p-[30px] rounded-[20px] relative overflow-hidden bg-box-color-one bg-[#fbf2e5]">
                        <div class="inner-banner-box relative z-[1] flex justify-between max-[480px]:flex-col">
                            <div class="side-image px-[12px] flex items-center max-[480px]:p-[0] max-[480px]:mb-[12px] max-[480px]:justify-center">
                                <img src="assets/img/banner-one/one.png" alt="one" class="max-w-max w-[280px] h-[280px] max-[1399px]:w-[230px] max-[1399px]:h-[230px] max-[1199px]:w-[140px] max-[1199px]:h-[140px] max-[991px]:w-[280px] max-[991px]:h-[280px] max-[767px]:h-[200px] max-[767px]:w-[200px] max-[575px]:w-full max-[575px]:h-[auto] max-[480px]:w-[calc(100%-70px)]">
                            </div>
                            <div class="inner-contact max-w-[250px] px-[12px] flex flex-col items-start justify-center max-[480px]:p-[0] max-[480px]:max-w-[100%] max-[480px]:text-center max-[480px]:items-center">
                                <h5 class="font-quicksand mb-[15px] text-[31px] text-[#3d4750] font-bold tracking-[0.03rem] text-[#3d4750] leading-[1.2] max-[991px]:text-[28px] max-[575px]:text-[24px] max-[480px]:mb-[2px] max-[480px]:text-[22px]">Tasty Snack & Fast food</h5>
                                <p class="font-Poppins text-[16px] font-light leading-[28px] tracking-[0.03rem] text-[#686e7d] mb-[15px] max-[480px]:mb-[8px] max-[480px]:text-[14px]">The flavour of something special</p>
                                <a href="shop-left-sidebar-col-3.html" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="banner-box p-[30px] rounded-[20px] relative overflow-hidden bg-box-color-two bg-[#ffe8ee]">
                        <div class="inner-banner-box relative z-[1] flex justify-between max-[480px]:flex-col">
                            <div class="side-image px-[12px] flex items-center max-[480px]:p-[0] max-[480px]:mb-[12px] max-[480px]:justify-center">
                                <img src="assets/img/banner-one/two.png" alt="two" class="max-w-max w-[280px] h-[280px] max-[1399px]:w-[230px] max-[1399px]:h-[230px] max-[1199px]:w-[140px] max-[1199px]:h-[140px] max-[991px]:w-[280px] max-[991px]:h-[280px] max-[767px]:h-[200px] max-[767px]:w-[200px] max-[575px]:w-full max-[575px]:h-[auto] max-[480px]:w-[calc(100%-70px)]">
                            </div>
                            <div class="inner-contact max-w-[250px] px-[12px] flex flex-col items-start justify-center max-[480px]:p-[0] max-[480px]:max-w-[100%] max-[480px]:text-center max-[480px]:items-center">
                                <h5 class="font-quicksand mb-[15px] text-[31px] text-[#3d4750] font-bold tracking-[0.03rem] text-[#3d4750] leading-[1.2] max-[991px]:text-[28px] max-[575px]:text-[24px] max-[480px]:mb-[2px] max-[480px]:text-[22px]">Fresh Fruits & Vegetables</h5>
                                <p class="font-Poppins text-[16px] font-light leading-[28px] tracking-[0.03rem] text-[#686e7d] mb-[15px] max-[480px]:mb-[8px] max-[480px]:text-[14px]">A healthy meal for every one</p>
                                <a href="shop-left-sidebar-col-3.html" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($mostLovedProducts)
        <!-- Day of the deal -->
        <section class="section-deal overflow-hidden py-[50px] max-[1199px]:py-[35px]">
            <div
                class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div
                            class="section-title bb-deal mb-[20px] pb-[20px] z-[5] relative flex justify-between max-[991px]:pb-[0] max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center"
                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">
                                    Most <span class="text-[#6c7fd8]">Loved</span> Products</h2>
                                <p class="font-Poppins w-full mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">
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
                                        <div
                                            class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                            <div
                                                class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                                {{-- if $product->crated_at is less then 1week then new--}}
                                                @php
                                                    $date = \Carbon\Carbon::parse($product->created_at);
                                                    $now = \Carbon\Carbon::now();
                                                    $diff = $date->diffInDays($now);
                                                    $badge = "";
                                                    if ($diff <= 7) {
                                                        $badge = "New";
                                                    }
                                                @endphp
                                                @if($badge)
                                                    <span
                                                        class="flags transition-all duration-[0.3s] ease-in-out absolute z-[5] top-[10px] left-[6px]">
                                                    <span
                                                        class="text-[14px] text-[#777] font-medium uppercase">{{ $badge }}</span>
                                                </span>
                                                @endif
                                                <a href="javascript:void(0)">
                                                    <div class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px] aspect-square ">
                                                        <img
                                                            class="main-img transition-all duration-[0.3s] ease-in-out w-full  h-full object-contain"
                                                            src="{{ asset('storage/' . $product->featured_image) }}" alt="product-1">
                                                        <img
                                                            class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full h-full object-contain"
                                                            src="{{ asset('storage/' . $product->featured_image) }}" alt="product-1">
                                                    </div>
                                                </a>
                                                <ul class="bb-pro-actions transition-all duration-[0.3s] ease-in-out my-[0] mx-[auto] absolute z-[9] left-[0] right-[0] bottom-[0] flex flex-row items-center justify-center opacity-[0]">
                                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                        <a href="javascript:void(0)" title="Wishlist"
                                                           class="w-[35px] h-[35px] flex items-center justify-center">
                                                            <i class="ri-heart-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                                        </a>
                                                    </li>
                                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                        <a href="javascript:void(0)" title="Quick View"
                                                           class="bb-modal-toggle w-[35px] h-[35px] flex items-center justify-center">
                                                            <i class="ri-eye-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                                        </a>
                                                    </li>
                                                    <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                        <a href="javascript:void(0)" title="Add To Cart"
                                                           class="w-[35px] h-[35px] flex items-center justify-center">
                                                            <i class="ri-shopping-bag-4-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="bb-pro-contact p-[20px]">
                                                <div class="bb-pro-subtitle mb-[8px] flex flex-wrap justify-between">
                                                    <a href="#"
                                                       class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">
                                                        {{ $product->categories->first()->name }}
                                                    </a>
                                                    <span class="bb-pro-rating">
                                                        <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                                    </span>
                                                </div>
                                                <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                                    <a href="#"
                                                       class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{ $product->name }}</a>
                                                </h4>
                                                <div class="bb-price flex flex-wrap justify-between">
                                                    <div class="inner-price mx-[-3px]">
                                                        <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ $product->discount_price ?? $product->price  }}</span>
                                                        @if($product->discount_price)
                                                            <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">${{ $product->price }}</span>
                                                        @endif
                                                    </div>
                                                    <span class="last-items text-[14px] text-[#686e7d]">1 Pack</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')

@endpush
