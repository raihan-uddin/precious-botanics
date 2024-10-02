@extends('frontend.layouts.default')
@section('title', 'Home')

@section('content')<div class="bg-gray-100 font-sans">

    <!-- Hero section -->
    <section class="bg-white py-16 animate-fade-in">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Precious Botanics is Coming Soon</h1>
        </div>
    </section>

    <!-- Features section -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4 text-center animate-fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">What to Expect from Precious Botanics</h2>
            <p class="text-lg text-gray-500 mb-8">Discover the purity of nature through our botanically inspired skincare products.</p>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4 mb-6 animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="rounded-lg bg-white shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <div class="text-4xl font-extrabold text-green-600 mb-4">01</div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Pure Ingredients</h3>
                        <p class="text-gray-500">Ethically sourced, natural ingredients designed to nourish your skin.</p>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-4 mb-6 animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="rounded-lg bg-white shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <div class="text-4xl font-extrabold text-green-600 mb-4">02</div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Sustainability</h3>
                        <p class="text-gray-500">Eco-conscious practices and sustainable packaging at the heart of our brand.</p>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-4 mb-6 animate-fade-up" style="animation-delay: 0.6s;">
                    <div class="rounded-lg bg-white shadow-md p-6 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <div class="text-4xl font-extrabold text-green-600 mb-4">03</div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Radiant Results</h3>
                        <p class="text-gray-500">Experience glowing skin with our botanically infused skincare.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Animations -->
<style>
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(40px); }
    100% { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-in-out;
}

.animate-fade-up {
    animation: fadeUp 0.8s ease-in-out forwards;
    opacity: 0;
}

.animate-fade-up:nth-child(1) { animation-delay: 0.2s; }
.animate-fade-up:nth-child(2) { animation-delay: 0.4s; }
.animate-fade-up:nth-child(3) { animation-delay: 0.6s; }
</style>



@endsection
@push('scripts')
<script>

</script>
@endpush