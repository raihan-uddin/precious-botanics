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
        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{$banner->title}}" class="w-full h-auto object-cover">
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
          delay: 5000,
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