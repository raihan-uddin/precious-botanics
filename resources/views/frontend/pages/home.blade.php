@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')

    <!-- image slider -->
    @if($banners->count())
    <section class="relative w-full min-h-[200px] sm:min-h-[300px] md:min-h-[400px] lg:min-h-[500px] xl:min-h-[600px] 2xl:min-h-[700px]">
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach($banners as $banner)
              <div class="swiper-slide">
                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" class="w-full h-auto object-cover">
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
