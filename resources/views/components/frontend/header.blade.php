<!-- Navigation Section -->
<section class="container bg-white shadow-md lg:sticky lg:top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Left: Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="block">
                    <div class="bg-white p-2 rounded-md shadow-lg">
                        <img src="{{ asset('images/logos/logo.png') }}" alt="Logo" class="h-16 w-auto mx-auto lg:mx-0" />
                    </div>
                </a>
            </div>

            <!-- Center: Menu Items -->
            <div class="hidden lg:flex space-x-8">
    <a href="#" class="text-gray-900 hover:text-theme-color-hover">Home</a>

    @php( $menuCategories = getMenuCategories())
    @if( $menuCategories )
        @foreach ($menuCategories as $key => $menu)
        @if($key > 7)
        @break
        @endif
        @if ($menu->submenus->isNotEmpty())
            <!-- Categories Dropdown -->
            <div class="relative group">
            <button id="categories-btn" class="text-gray-900 hover:text-theme-color-hover inline-flex items-center focus:outline-none">
                {{ $menu->name }}
                <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <!-- Sub-menu -->
            <div class="absolute left-0 hidden group-hover:block bg-white shadow-lg py-2 mt-2 rounded-md w-48 z-50 overflow-y-auto max-h-60">
                @foreach ($menu->submenus as $submenu)
                <a href="{{ $submenu->link }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">{{ $submenu->name }}</a>
                @endforeach
            </div>
            </div>
        @else
            <a href="{{ $menu->link }}" class="text-gray-900 hover:text-theme-color-hover">{{ $menu->name }}</a>
        @endif
        @endforeach
    @endif
</div>


            <!-- Right: Icons -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon -->
                <button class="text-gray-900 hover:text-indigo-600 flex items-center justify-center">
                    <img src="{{ asset('images/icons/icon_search.png') }}" alt="Search" class="h-6 w-6 object-contain" />
                </button>

                <!-- Cart Icon -->
                <button class="text-gray-900 hover:text-indigo-600 flex items-center justify-center">
                    <img src="{{ asset('images/icons/icon_cart_header.png') }}" alt="Cart" class="h-6 w-6 object-contain" />
                </button>

                <!-- User Icon with Dropdown -->
                <div class="relative">
                    <button id="user-btn" class="text-gray-900 hover:text-indigo-600 focus:outline-none flex items-center justify-center">
                        <img src="{{ asset('images/icons/user.png') }}" alt="User" class="h-6 w-6 object-contain" />
                    </button>
                    <!-- Login/Registration Dropdown -->
                    <div id="user-dropdown" class="hidden absolute right-0 bg-white shadow-lg py-2 mt-2 rounded-md w-48 z-50">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Register</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-900 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block text-gray-900 hover:text-indigo-600">Home</a>
            <!-- Collapsible Categories -->
            <div>
                <button class="w-full text-left text-gray-900 hover:text-indigo-600 flex justify-between items-center py-2" onclick="toggleCollapse('category-1')">
                    Categories
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300" id="arrow-category-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="category-1" class="hidden pl-4">
                    <a href="#" class="block text-gray-700 hover:bg-gray-100 py-1">Sub-category 1</a>
                    <a href="#" class="block text-gray-700 hover:bg-gray-100 py-1">Sub-category 2</a>
                    <a href="#" class="block text-gray-700 hover:bg-gray-100 py-1">Sub-category 3</a>
                </div>
            </div>
            <a href="#" class="block text-gray-900 hover:text-indigo-600">About</a>
            <a href="#" class="block text-gray-900 hover:text-indigo-600">Contact</a>
        </div>
    </div>
</section>

<script>
    // Close other dropdowns when one opens
    function closeDropdowns(exceptId) {
        const dropdowns = ["user-dropdown", "categories-dropdown"];
        dropdowns.forEach((id) => {
            if (id !== exceptId) {
                document.getElementById(id).classList.add("hidden");
            }
        });
    }

    // Toggle mobile menu
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    mobileMenuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        closeDropdowns(); // Close any open dropdowns
    });

    // Toggle user dropdown
    const userBtn = document.getElementById("user-btn");
    const userDropdown = document.getElementById("user-dropdown");

    userBtn.addEventListener("click", () => {
        userDropdown.classList.toggle("hidden");
        closeDropdowns("user-dropdown");
    });

    // Toggle categories dropdown
    const categoriesBtn = document.getElementById("categories-btn");
    const categoriesDropdown = document.getElementById("categories-dropdown");

    categoriesBtn.addEventListener("click", () => {
        categoriesDropdown.classList.toggle("hidden");
        closeDropdowns("categories-dropdown");
    });

    // Toggle collapse for categories on mobile
    function toggleCollapse(categoryId) {
        const category = document.getElementById(categoryId);
        const arrow = document.getElementById("arrow-" + categoryId);
        category.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
    }
</script>
