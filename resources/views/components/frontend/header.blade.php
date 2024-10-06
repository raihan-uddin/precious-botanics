<!-- mobile header -->
<section>
    <!-- mobile header -->
    <header class="bg-white shadow-md md:hidden">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-bold">
                <img class="w-24" src="{{ asset('images/logos/logo.svg') }}">
            </div>
            <div class="w-full h-10 relative ml-2 mr-2">
                <input class="w-full h-full px-2 text-xs bg-gray-100 outline-none rounded-full" type="search"
                       placeholder="What are looking for">
                <div class="w-4 absolute right-5 top-3">
                    <img src="{{asset('images/icons/icon_search.png')}}">
                </div>
            </div>
            <!-- Hamburger Icon for Mobile -->
            <button onclick="openMenu()" class="lg:hidden block text-gray-600 focus:outline-none" id="menu-toggle">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <!-- The menu here -->
            <div id="side-menu" class="fixed top-0 right-[-250px] w-[240px] h-screen z-50 bg-white shadow p-5
            flex flex-col space-y-5 text-black duration-300">
                <a href="javascript:void(0)" class="text-center text-xl" onclick="closeMenu()">&times;</a>
                <!-- home -->
                <li class="list-none">
                    <a class="text-sm transition duration-200 ease-in-out font-medium" href="#">Home</a>
                </li>
                <!-- ./home -->
                <!-- Natural Products -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium"
                       href="product-list-page.html">Natural Products</a>
                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 pt-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Shea Butter</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Raw Black Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- ./Natural Products -->
                <!-- Bath -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium"
                       href="#">Bath</a>
                    <div class="w-80 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 py-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Bath Salt</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Body Wash</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Body Scrubs</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Liquid Black Soap</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Massage Oil</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Shampoo</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Shower Gel</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Handmade Soap</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">Bar Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- ./Bath -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium" href="#">Body
                        Products</a>
                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 pt-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Shea Butter</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Raw Black Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- Hair Products -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium" href="#">Hair
                        Products</a>
                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 pt-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Shea Butter</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Raw Black Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- ./Hair Products -->
                <!-- Aroma -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium"
                       href="#">Aroma</a>
                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 pt-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Shea Butter</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Raw Black Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- ./Aroma -->
                <!-- Fragrance Oil -->
                <li class="relative group list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium" href="#">Fragrance
                        Oil</a>
                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                        <div
                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                            <ul class="space-y-4 pt-2">
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Shea Butter</a></li>
                                <li><a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                       href="#">African Raw Black Soap</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- ./Fragrance Oil -->
                <!-- Essential Oils -->
                <li class="list-none">
                    <a class="text-sm hover:text-primary transition duration-200 ease-in-out font-medium" href="#">Essential
                        Oils</a>
                </li>
                <!-- ./Essential Oils -->
            </div>
        </div>
    </header>
    <!-- ./mobile header -->
</section>
<!-- ./mobile header -->


<!-- desktop header -->
<section>
    <header class="h-36 hidden md:block md:flex items-center">
        <div class="container h-[86px] p-0 flex">
            <div class="w-64 h-full px-2">
                <div class="h-full">
                    <img class="h-full" src="{{ asset('images/logos/logo.svg') }}">
                </div>
            </div>
            <div class="flex justify-center items-center flex-1">
                <!-- menu icon -->
                <div class="w-full h-full hidden md:block xl:hidden">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="w-6">
                            <button onclick="openMenu2()" id="btn">
                                <img id="menu-icon" src="images/menu-svgrepo-com.png">
                            </button>
                        </div>
                        <!-- The menu here -->
                        <div id="side-menu-2" class="fixed top-0 left-[-250px] w-[240px] h-screen z-50 bg-white shadow p-5
                     flex flex-col space-y-5 text-black duration-300">
                            <a href="javascript:void(0)" class="text-center text-4xl" onclick="closeMenu2()">&times;</a>
                            <!-- home -->
                            <li class="list-none">
                                <a class="text-lg transition duration-200 ease-in-out font-medium" href="#">Home</a>
                            </li>
                            <!-- ./home -->
                            @php
                                $menuCategories = getMenuCategories();
                            @endphp
                            @foreach($menuCategories as $menuCategory)
                                <li class="relative group list-none">
                                    <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                       href="#">{{ $menuCategory->name }}</a>
                                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                        <div
                                            class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                            <ul class="space-y-4 pt-2">
                                                @foreach($menuCategory->submenus as $subCategory)
                                                    <li>
                                                        <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                           href="#">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <!-- Natural Products -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="product-list-page.html">Natural Products</a>
                                <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 pt-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Shea Butter</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Raw Black Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- ./Natural Products -->
                            <!-- Bath -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Bath</a>
                                <div class="w-80 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 py-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Bath Salt</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Body Wash</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Body Scrubs</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Liquid Black Soap</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Massage Oil</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Shampoo</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Shower Gel</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Handmade Soap</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">Bar Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- ./Bath -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Body Products</a>
                                <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 pt-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Shea Butter</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Raw Black Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Hair Products -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Hair Products</a>
                                <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 pt-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Shea Butter</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Raw Black Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- ./Hair Products -->
                            <!-- Aroma -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Aroma</a>
                                <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 pt-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Shea Butter</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Raw Black Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- ./Aroma -->
                            <!-- Fragrance Oil -->
                            <li class="relative group list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Fragrance Oil</a>
                                <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                    <div
                                        class="w-80 h-20 mt-8 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                        <ul class="space-y-4 pt-2">
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Shea Butter</a></li>
                                            <li>
                                                <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                   href="#">African Raw Black Soap</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- ./Fragrance Oil -->
                            <!-- Essential Oils -->
                            <li class="list-none">
                                <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                   href="#">Essential Oils</a>
                            </li>
                            <!-- ./Essential Oils -->
                        </div>
                    </div>
                </div>
                <!-- ./menu icon -->


                <!-- nav -->
                <nav class="h-7 md:hidden xl:block">
                    <ul class="flex space-x-6">
                        <!-- home -->
                        <li>
                            <a class="text-lg text-primary transition duration-200 ease-in-out font-medium" href="#">Home</a>
                        </li>
                        <!-- ./home -->
                        @php($menuCategories = getMenuCategories())
                        @foreach($menuCategories as $category)
                            @if(count($category->submenus) > 0)
                                <!-- Natural Products -->
                                <li class="relative group">
                                    <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                       href="#">{{$category->name}}</a>
                                    <div class="w-80 h-32 z-10 hidden absolute flex items-end">
                                        <div
                                            class="w-80 h-auto mt-8 pb-5 group-hover:block px-4 bg-white box-shadow-custom  z-10 border-t-2 border-gray-200">
                                            <ul class="space-y-4 pt-2">
                                                @foreach($category->submenus as $subCategory)
                                                    <li>
                                                        <a class="font-medium hover:text-primary transition duration-200 ease-in-out"
                                                           href="#">{{$subCategory->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a class="text-lg hover:text-primary transition duration-200 ease-in-out font-medium"
                                       href="#">
                                        {{$category->name}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
                <!-- ./nav -->
            </div>
            <!-- icon and menu bar -->
            <div class="w-64 flex items-center justify-end px-4 h-full">
                <div class=" flex items-center justify-end">
                    <div class="flex space-x-10">
                        <div class="w-6">
                            <img src="{{ asset('images/icons/icon_search.png') }}">
                        </div>
                        <div class="w-6">
                            <img src="{{ asset('images/icons/icon_cart_header.png') }}">
                        </div>
                        <div class="w-6">
                            <button onclick="openMenu1()" id="btn">
                                <img id="menu-icon" src="{{ asset('images/icons/icon_account.png') }}">
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ./icon and menu bar -->
                <!-- The menu here -->
                <div id="side-menu-1" class="fixed top-0 right-[-440px] w-[440px] h-screen z-50 bg-white shadow p-10
               flex flex-col space-y-10 text-black duration-300">
                    <a href="javascript:void(0)" class="text-center text-4xl" onclick="closeMenu1()">&times;</a>
                    <a class="hover:text-primary hover:transition" href="{{ route('login') }}">Log in</a>
                    <a class="hover:text-primary hover:transition" href="{{ route('register') }}">Register account</a>
                    <a class="hover:text-primary hover:transition" href="#">Contact Us</a>
                    <a class="hover:text-primary hover:transition" href="#">Cheak Out</a>
                </div>
            </div>
        </div>
    </header>
</section>
<!-- ./desktop header -->

<script>

function closeMenu() {
    sideMenu.classList.remove('right-0');
    sideMenu.classList.add('right-[-250px]');
}


var sideMenu1 = document.getElementById('side-menu-1');

function openMenu1() {
    sideMenu1.classList.remove('right-[-440px]');
    sideMenu1.classList.add('right-0');
}

function closeMenu1() {
    sideMenu1.classList.remove('right-0');
    sideMenu1.classList.add('right-[-440px]');
}


var sideMenu2 = document.getElementById('side-menu-2');

function openMenu2() {
    sideMenu2.classList.remove('left-[-250px]');
    sideMenu2.classList.add('left-0');
}

function closeMenu2() {
    sideMenu2.classList.remove('left-0');
    sideMenu2.classList.add('left-[-250px]');
}

</script>
