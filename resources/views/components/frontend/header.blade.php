<!-- Tailwind menu header section with home, product, login -->

<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <a href="#" class="text-white text-xl font-bold">Brand</a>
      </div>
      <div class="hidden md:flex items-center space-x-4">
        <a href="#" class="text-gray-300 hover:text-white">Home</a>
        <a href="#" class="text-gray-300 hover:text-white">About</a>
        <div class="relative group">
          <button class="text-gray-300 hover:text-white inline-flex items-center">
            Services
            <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <!-- Dropdown -->
          <div class="absolute hidden group-hover:block mt-2 py-2 w-48 bg-white rounded-md shadow-lg z-10">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Web Design</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SEO</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Marketing</a>
          </div>
        </div>
        <a href="#" class="text-gray-300 hover:text-white">Contact</a>
        <!-- login -->
        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
      </div>
      <div class="flex md:hidden">
        <button class="text-gray-300 hover:text-white focus:outline-none focus:text-white">
          <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
  
  <!-- Mobile Menu -->
  <div class="md:hidden">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Home</a>
      <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">About</a>
      <div class="relative">
        <button class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 inline-flex items-center">
          Services
          <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Mobile Dropdown -->
        <div class="mt-1 space-y-1 bg-gray-700 rounded-md">
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-600">Web Design</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-600">SEO</a>
          <a href="#" class="block px-4 py-2 text-gray-300 hover:bg-gray-600">Marketing</a>
        </div>
      </div>
      <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Contact</a>
    </div>
  </div>
</nav>



@push('scripts')


@endpush
