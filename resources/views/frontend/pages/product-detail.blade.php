@extends('frontend.layouts.default')

@section('title', $pageTitle)

@section('content')
    <!-- Breadcrumb -->
    <section
        class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div
            class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        
                        <div class="min-[768px]:w-[100%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]">
                                    <a href="{{ route('home') }}"class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a>
                                </li>
                                <li class="text-[14px] font-normal px-[5px]"><i
                                        class="ri-arrow-right-double-fill text-[14px] font-semibold leading-[28px]"></i>
                                </li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">
                                    <a href="{{ route('category.product', $product->categories->first()->slug) }}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">{{ $product->categories->first()->name }}</a>
                                </li>

                                <li class="text-[14px] font-normal px-[5px]"><i
                                        class="ri-arrow-right-double-fill text-[14px] font-semibold leading-[28px]"></i>
                                </li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">
                                    <a href="{{ route('product.detail', [$product->categories->first()->slug, $product->slug]) }}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">{{ $product->name }}</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product page -->
    <section class="section-product py-[50px] max-[1199px]:py-[35px]">
        <div
            class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="bb-single-pro mb-[24px]">
                        <div class="flex flex-wrap mx-[-12px]">
                            <div class="min-[992px]:w-[41.66%] w-full px-[12px] mb-[24px]">
                                <div
                                    class="single-pro-slider sticky top-[0] p-[15px] border-[1px] border-solid border-[#eee] rounded-[24px] max-[991px]:max-w-[500px] max-[991px]:m-auto">
                                    <div class="single-product-cover">
                                        @if($product->images)
                                            
                                            @foreach($product->images as $image)
                                                <div class="single-slide zoom-image-hover rounded-tl-[15px] rounded-tr-[15px]">
                                                    <img class="img-responsive rounded-tl-[15px] rounded-tr-[15px]" src="{{ asset($image->image_url) }}" alt="{{ $product->name }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="single-slide zoom-image-hover rounded-tl-[15px] rounded-tr-[15px]">
                                                <img class="img-responsive rounded-tl-[15px] rounded-tr-[15px]" src="{{ asset($product->featured_image) }}" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="single-nav-thumb w-full overflow-hidden">
                                        @if($product->images)
                                            @foreach($product->images as $image)
                                                <div class="single-slide px-[10px] block">
                                                    <img
                                                        class="img-responsive border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[15px]"
                                                        src="{{ asset($image->image_url) }}" alt="{{ $product->name }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="single-slide px-[10px] block">
                                                <img
                                                    class="img-responsive border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[15px]"
                                                    src="{{ asset('storage/'. $product->featured_image) }}" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="min-[992px]:w-[58.33%] w-full px-[12px] mb-[24px]">
                                <div class="bb-single-pro-contact w-fit	">
                                    <div class="bb-sub-title mb-[20px]">
                                        <h4 class="font-quicksand text-[22px] tracking-[0.03rem] font-bold leading-[1.2] text-[#3d4750]">
                                            {{ $product->name }}
                                        </h4>
                                    </div>
                                    <div class="bb-single-rating mb-[12px]">
                                        <span class="bb-pro-rating mr-[10px]">
                                            <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="ri-star-line float-left text-[15px] mr-[3px] text-[#777]"></i>
                                        </span>
                                        <span class="bb-read-review">
                                            |&nbsp;&nbsp;<a href="#bb-spt-nav-review"
                                                            class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem] text-[#6c7fd8] hidden">992 Ratings</a>
                                        </span>
                                    </div>
                                    <p class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem]  ">
                                        {{ Str::limit(html_entity_decode(strip_tags($product->full_description)), 240) }}
                                    </p>
                                    <div class="bb-single-price-wrap flex justify-between py-[10px]">
                                        <div class="bb-single-price py-[15px]">
                                            <div class="price mb-[8px]">
                                                <h5 class="font-quicksand leading-[1.2] tracking-[0.03rem] text-[20px] font-extrabold text-[#3d4750]">
                                                    ${{  $product->discount_price > 0 ? number_format($product->discount_price, 2) :number_format($product->price, 2)   }} 
                                                    @if($product->discount_price > 0)
                                                        @php
                                                            $discount = 100 - (($product->discount_price / $product->price) * 100);
                                                        @endphp
                                                        <span class="text-[#3d4750] text-[20px]">
                                                            -{{ number_format($discount, 0) }}%
                                                        </span>
                                                    @endif
                                                </h5>
                                            </div>
                                            <div class="mrp">
                                                <p class="font-Poppins text-[16px] font-light text-[#686e7d] leading-[28px] tracking-[0.03rem]">
                                                    M.R.P. : <span class="text-[15px] line-through">${{  number_format($product->price , 2) }}</span></p>
                                            </div>
                                        </div>
                                        <div class="bb-single-price py-[15px]">
                                            <div class="sku mb-[8px]">
                                                <h5 class="font-quicksand text-[18px] font-extrabold leading-[1.2] tracking-[0.03rem] text-[#3d4750]">
                                                    SKU#: {{ $product->sku }}</h5>
                                            </div>
                                            <div class="stock">
                                                @if($product->stock_quantity > 0 || $product->allow_out_of_stock_orders > 0)
                                                    <span class="text-[18px] text-[#6c7fd8]">In stock</span>
                                                @else
                                                    <span class="text-[18px] text-[#f44336]">Out of stock</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="bb-single-pro-weight mb-[24px]">
                                        <div class="pro-title mb-[12px]">
                                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] text-[16px] font-bold uppercase text-[#3d4750]">
                                                Weight</h4>
                                        </div>
                                        <div class="bb-pro-variation-contant">
                                            <ul class="flex flex-wrap m-[-2px]">
                                                <li class="my-[10px] mx-[2px] py-[2px] px-[15px] border-[1px] border-solid border-[#eee] rounded-[10px] cursor-pointer active-variation">
                                                    <span
                                                        class="font-Poppins text-[#686e7d] font-light text-[14px] leading-[28px] tracking-[0.03rem]">250g</span>
                                                </li>
                                                <li class="my-[10px] mx-[2px] py-[2px] px-[15px] border-[1px] border-solid border-[#eee] rounded-[10px] cursor-pointer">
                                                    <span
                                                        class="font-Poppins text-[#686e7d] font-light text-[14px] leading-[28px] tracking-[0.03rem]">500g</span>
                                                </li>
                                                <li class="my-[10px] mx-[2px] py-[2px] px-[15px] border-[1px] border-solid border-[#eee] rounded-[10px] cursor-pointer">
                                                    <span
                                                        class="font-Poppins text-[#686e7d] font-light text-[14px] leading-[28px] tracking-[0.03rem]">1kg</span>
                                                </li>
                                                <li class="my-[10px] mx-[2px] py-[2px] px-[15px] border-[1px] border-solid border-[#eee] rounded-[10px] cursor-pointer">
                                                    <span
                                                        class="font-Poppins text-[#686e7d] font-light text-[14px] leading-[28px] tracking-[0.03rem]">2kg</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bb-single-qty flex flex-wrap m-[-2px]">
                                        <div
                                            class="qty-plus-minus m-[2px] w-[85px] h-[40px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                            <input
                                                class="qty-input text-[#777] float-left text-[14px] h-auto m-[0] p-[0] text-center w-[32px] outline-[0] font-normal leading-[35px] rounded-[10px]"
                                                type="text" name="bb-qtybtn" value="1">
                                        </div>
                                        <div class="buttons m-[2px]">
                                            <a href="javascript:void(0)"
                                               class="bb-btn-2 transition-all duration-[0.3s] ease-in-out h-[40px] flex font-Poppins leading-[28px] tracking-[0.03rem] py-[6px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">View
                                                Cart</a>
                                        </div>
                                        <ul class="bb-pro-actions my-[2px] flex">
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" title="heart"
                                                   class="transition-all duration-[0.3s] ease-in-out w-[40px] h-[40px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] hover:bg-[#6c7fd8] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                    <i class="ri-heart-line text-[16px] leading-[10px] text-[#777]"></i>
                                                </a>
                                            </li>
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" title="Quick View"
                                                   class="bb-modal-toggle transition-all duration-[0.3s] ease-in-out w-[40px] h-[40px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] hover:bg-[#6c7fd8] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                    <i class="ri-eye-line text-[16px] leading-[10px] text-[#777]"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bb-single-pro-tab">
                        <div class="bb-pro-tab mb-[24px]">
                            <ul class="bb-pro-tab-nav flex flex-wrap mx-[-20px] max-[991px]:justify-center" id="ProTab">
                                <li class="nav-item relative leading-[28px]">
                                    <a class="nav-link px-[20px] font-Poppins text-[16px] text-[#686e7d] font-medium capitalize leading-[28px] tracking-[0.03rem] block active"
                                       href="#detail">Detail</a>
                                </li>
                                <li class="nav-item relative leading-[28px]">
                                    <a class="nav-link px-[20px] font-Poppins text-[16px] text-[#686e7d] font-medium capitalize leading-[28px] tracking-[0.03rem] block"
                                       href="#information">Information</a>
                                </li>
                                <li class="nav-item relative leading-[28px]">
                                    <a class="nav-link px-[20px] font-Poppins text-[16px] text-[#686e7d] font-medium capitalize leading-[28px] tracking-[0.03rem] block"
                                       href="#reviews">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pro-pane" id="detail">
                                <div
                                    class="bb-inner-tabs border-[1px] border-solid border-[#eee] p-[15px] rounded-[20px]">
                                    <div class="bb-details">
                                        <p class="mb-[12px] font-Poppins text-[#686e7d] leading-[28px] tracking-[0.03rem] font-light">
                                            {!! $product->full_description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pro-pane" id="information">
                                <div
                                    class="bb-inner-tabs border-[1px] border-solid border-[#eee] p-[15px] rounded-[20px]">
                                    <div class="information">
                                        <ul class="list-disc pl-[20px]">
                                            <li class="font-Poppins text-[15px] font-light tracking-[0.03rem] leading-[28px] text-[#686e7d] py-[5px]">
                                                <span class="inline-flex min-w-[130px] font-medium">Weight</span> 500 g
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pro-pane" id="reviews">
                                <div
                                    class="bb-inner-tabs border-[1px] border-solid border-[#eee] p-[15px] rounded-[20px]">
                                    <div class="bb-reviews">
                                        <!-- <div class="reviews-bb-box flex mb-[24px] max-[575px]:flex-col">
                                            <div class="inner-image mr-[12px] max-[575px]:mr-[0] max-[575px]:mb-[12px]">
                                                <img src="assets/img/reviews/1.jpg" alt="img-1"
                                                     class="w-[50px] h-[50px] max-w-[50px] rounded-[10px]">
                                            </div>
                                            <div class="inner-contact">
                                                <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[5px] text-[16px] font-bold text-[#3d4750]">
                                                    Mariya Lykra</h4>
                                                <div class="bb-pro-rating flex">
                                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                    <i class="ri-star-line float-left text-[15px] mr-[3px] text-[#777]"></i>
                                                </div>
                                                <p class="font-Poppins text-[14px] leading-[26px] font-light tracking-[0.03rem] text-[#686e7d]">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo,
                                                    hic expedita asperiores eos neque cumque impedit quam, placeat
                                                    laudantium soluta repellendus possimus a distinctio voluptate
                                                    veritatis nostrum perspiciatis est! Commodi!</p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="bb-reviews-form">
                                        <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold text-[#3d4750]">
                                            Add a Review</h3>
                                        <div class="bb-review-rating flex mb-[12px]">
                                            <span
                                                class="pr-[10px] font-Poppins text-[15px] font-semibold leading-[26px] tracking-[0.02rem] text-[#3d4750]">Your ratting :</span>
                                            <div class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] text-[#777]"></i>
                                            </div>
                                        </div>
                                        <form action="#">
                                            <div class="input-box mb-[24px]">
                                                <input type="text" placeholder="Name" name="your-name"
                                                       class="w-full h-[50px] border-[1px] border-solid border-[#eee] pl-[20px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]">
                                            </div>
                                            <div class="input-box mb-[24px]">
                                                <input type="email" placeholder="Email" name="your-email"
                                                       class="w-full h-[50px] border-[1px] border-solid border-[#eee] pl-[20px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]">
                                            </div>
                                            <div class="input-box mb-[24px]">
                                                <textarea name="your-comment" placeholder="Enter Your Comment"
                                                          class="w-full h-[100px] border-[1px] border-solid border-[#eee] py-[20px] pl-[20px] pr-[10px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]"></textarea>
                                            </div>
                                            <div class="input-button">
                                                <a href="javascript:void(0)"
                                                   class="bb-btn-2 transition-all duration-[0.3s] ease-in-out h-[40px] inline-flex font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">View
                                                    Cart</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related product section -->
    <section class="section-related-product py-[50px] max-[1199px]:py-[35px]">
        <div
            class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div
                        class="section-title mb-[20px] pb-[20px] z-[5] relative flex flex-col items-center text-center max-[991px]:pb-[0]"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail max-[991px]:mb-[12px]">
                            <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">
                                Related <span class="text-[#6c7fd8]">Product</span></h2>
                            <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">
                                Browse The Collection of Top Products.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-[12px]">
                    <div class="bb-deal-slider m-[-12px]">
                        <div class="bb-deal-block owl-carousel">
                            <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="200">
                                <div
                                    class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div
                                        class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <span
                                            class="flags transition-all duration-[0.3s] ease-in-out absolute z-[5] top-[10px] left-[6px]">
                                            <span class="text-[14px] text-[#777] font-medium uppercase">New</span>
                                        </span>
                                        <a href="javascript:void(0)">
                                            <div
                                                class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                <img class="main-img transition-all duration-[0.3s] ease-in-out w-full"
                                                     src="assets/img/product/1.jpg" alt="product-1">
                                                <img
                                                    class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full"
                                                    src="assets/img/product/back-1.jpg" alt="product-1">
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
                                                <a href="compare.html" title="Compare"
                                                   class="w-[35px] h-[35px] flex items-center justify-center">
                                                    <i class="ri-repeat-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
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
                                            <a href="shop-left-sidebar-col-3.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">Chocos</a>
                                            <span class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                            </span>
                                        </div>
                                        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                            <a href="product-left-sidebar.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">Mixed
                                                Fruits Chocolates Pack</a>
                                        </h4>
                                        <div class="bb-price flex flex-wrap justify-between">
                                            <div class="inner-price mx-[-3px]">
                                                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">$25</span>
                                                <span
                                                    class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">$30</span>
                                            </div>
                                            <span class="last-items text-[14px] text-[#686e7d]">1 Pack</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="400">
                                <div
                                    class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div
                                        class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <span
                                            class="flags transition-all duration-[0.3s] ease-in-out absolute z-[5] top-[10px] left-[6px]">
                                            <span class="text-[14px] text-[#777] font-medium uppercase">Hot</span>
                                        </span>
                                        <a href="javascript:void(0)">
                                            <div
                                                class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                <img class="main-img transition-all duration-[0.3s] ease-in-out w-full"
                                                     src="assets/img/product/2.jpg" alt="product-2">
                                                <img
                                                    class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full"
                                                    src="assets/img/product/back-2.jpg"
                                                    alt="product-2">
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
                                                <a href="compare.html" title="Compare"
                                                   class="w-[35px] h-[35px] flex items-center justify-center">
                                                    <i class="ri-repeat-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
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
                                            <a href="shop-left-sidebar-col-3.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">Juice</a>
                                            <span class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                            </span>
                                        </div>
                                        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                            <a href="product-left-sidebar.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">Organic
                                                Apple Juice Pack</a>
                                        </h4>
                                        <div class="bb-price flex flex-wrap justify-between">
                                            <div class="inner-price mx-[-3px]">
                                                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">$15</span>
                                                <span
                                                    class="item-left px-[3px] text-[14px] text-[#6c7fd8]">3 Left</span>
                                            </div>
                                            <span class="last-items text-[14px] text-[#686e7d]">100 ml</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="600">
                                <div
                                    class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div
                                        class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <a href="javascript:void(0)">
                                            <div
                                                class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                <img class="main-img transition-all duration-[0.3s] ease-in-out w-full"
                                                     src="assets/img/product/3.jpg" alt="product-3">
                                                <img
                                                    class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full"
                                                    src="assets/img/product/back-3.jpg"
                                                    alt="product-3">
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
                                                <a href="compare.html" title="Compare"
                                                   class="w-[35px] h-[35px] flex items-center justify-center">
                                                    <i class="ri-repeat-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
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
                                            <a href="shop-left-sidebar-col-3.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">Juice</a>
                                            <span class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                            </span>
                                        </div>
                                        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                            <a href="product-left-sidebar.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">Mixed
                                                Almond nuts juice Pack</a>
                                        </h4>
                                        <div class="bb-price flex flex-wrap justify-between">
                                            <div class="inner-price mx-[-3px]">
                                                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">$32</span>
                                                <span
                                                    class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">$39</span>
                                            </div>
                                            <span class="last-items text-[14px] text-[#686e7d]">250 g</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000"
                                 data-aos-delay="800">
                                <div
                                    class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div
                                        class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <span
                                            class="flags transition-all duration-[0.3s] ease-in-out absolute z-[5] top-[10px] left-[6px]">
                                            <span class="text-[14px] text-[#777] font-medium uppercase">Sale</span>
                                        </span>
                                        <a href="javascript:void(0)">
                                            <div
                                                class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                <img class="main-img transition-all duration-[0.3s] ease-in-out w-full"
                                                     src="assets/img/product/4.jpg" alt="product-4">
                                                <img
                                                    class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full"
                                                    src="assets/img/product/back-4.jpg"
                                                    alt="product-4">
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
                                                <a href="compare.html" title="Compare"
                                                   class="w-[35px] h-[35px] flex items-center justify-center">
                                                    <i class="ri-repeat-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
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
                                            <a href="shop-left-sidebar-col-3.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">Fruits</a>
                                            <span class="bb-pro-rating">
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                            </span>
                                        </div>
                                        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                            <a href="product-left-sidebar.html"
                                               class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">Fresh
                                                Mango Slice Juice</a>
                                        </h4>
                                        <div class="bb-price flex flex-wrap justify-between">
                                            <div class="inner-price mx-[-3px]">
                                                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">$25</span>
                                                <span
                                                    class="item-left px-[3px] text-[14px] text-[#6c7fd8]">Out Of Stock</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

@endpush
