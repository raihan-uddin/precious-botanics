@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')

    <!-- image slider -->
    @if($banners->count())
        <section class="overflow-hidden relative">
            <div class="h-auto">
                <div id="slider" class="slider-images flex transition-transform duration-300">
                    @foreach($banners as $banner)
                        <img class="object-contain h-full" src="{{ asset('storage/' . $banner->image) }}"
                             alt="{{ $banner->title }}">
                    @endforeach
                </div>
                <button
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 border p-2 w-10 h-10 rounded-full shadow"
                    id="prev">&#10094;
                </button>
                <button
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 border p-2 w-10 h-10 rounded-full shadow"
                    id="next">&#10095;
                </button>
            </div>
        </section>
    @endif

@endsection
@push('scripts')
    <script src="{{ asset('js/lightslider.js') }}"></script>
    <link rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"
          href="{{ asset('css/lightslider.css') }}">


    <script>

        const slider = document.getElementById('slider');
        const images = slider.children;
        const totalImages = images.length;
        let currentIndex = 0;

        function updateSlider() {
            const offset = -currentIndex * 100; // Move to the correct image
            slider.style.transform = `translateX(${offset}%)`;
        }

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalImages;
            updateSlider();
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            updateSlider();
        });


    </script>
@endpush
