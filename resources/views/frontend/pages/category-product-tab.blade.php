<div class="flex flex-wrap w-full">
    @foreach ($products as $product)
        <div class="min-[1200px]:w-[25%] min-[768px]:w-[33.33%] w-[50%] max-[480px]:w-full px-[12px] mb-[24px]"
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <x-product-thumb :product="$product"/> 
        </div>
    @endforeach
</div>