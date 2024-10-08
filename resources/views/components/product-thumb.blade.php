<div class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
    <div
        class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">

            <a href="javascript:void(0)">
                <div
                    class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px] aspect-square ">
                    <img class="main-img transition-all duration-[0.3s] ease-in-out w-full  h-full object-contain"
                        src="{{ asset('storage/' . $product->featured_image) }}"
                        alt="product-1">
                    <img class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full h-full object-contain"
                        src="{{ asset('storage/' . $product->featured_image) }}"
                        alt="product-1">
                </div>
            </a>
            <ul
                class="bb-pro-actions transition-all duration-[0.3s] ease-in-out my-[0] mx-[auto] absolute z-[9] left-[0] right-[0] bottom-[0] flex flex-row items-center justify-center opacity-[0]">
                {{--<li
                    class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                    <a href="javascript:void(0)" title="Wishlist"
                        class="w-[35px] h-[35px] flex items-center justify-center">
                        <i
                            class="ri-heart-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                    </a>
                </li>--}}
                <li
                    class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                    <a href="javascript:void(0)" title="Quick View"
                        class="bb-modal-toggle w-[35px] h-[35px] flex items-center justify-center">
                        <i
                            class="ri-eye-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                    </a>
                </li>
                <li
                    class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                    <a href="javascript:void(0)" title="Add To Cart"
                        class="w-[35px] h-[35px] flex items-center justify-center">
                        <i
                            class="ri-shopping-bag-4-line transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                    </a>
                </li>
            </ul>
    </div>
    <div class="bb-pro-contact p-[20px]">
        <div class="bb-pro-subtitle mb-[8px] flex flex-wrap justify-between">
            <a href="{{ route('category.product', $product->categories->first()->slug) }}"
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
        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]"
            title="{{ $product->name }}">
            <a href="{{ route('product.detail', $product->slug) }}"
                class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{
                $product->name }}</a>
        </h4>
        <div class="bb-price flex flex-wrap justify-between" data-product="{{ $product }}">
            <div class="inner-price mx-[-3px]">
                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">
                    {{$product->discount_price ?? $product->price }}
                </span>
                @if($product->discount_price)
                <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">
                    ${{$product->price }}
                </span>
                @endif
            </div>
        </div>
    </div>
</div>
