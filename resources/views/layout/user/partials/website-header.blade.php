<header class="fixed top-0 left-0 w-full bg-purple-400  shadow-lg shadow-gray-100/10 z-50 transition-all duration-300 ">
    <div class="container mx-auto px-4 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo Section -->
            <a href="{{route('users.home')}}"
               class="group flex items-center space-x-3 transition-transform duration-300 hover:scale-105">
                <div class="relative h-10 w-10 overflow-hidden rounded-xl">

                    <img src="{{asset('images/homepage/WhatsApp Image 2025-04-08 at 16.25.31.jpeg')}}"

                         class="h-full w-full  duration-500 group-hover:scale-110" alt="logo">
                    <div class="absolute inset-0 ring-1 ring-black/5 rounded-xl"></div>
                </div>
                <span class="hidden sm:block">
                    <span
                        class="text-xl font-black tracking-tight bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Gabsab
                    </span>
                    <span class="block text-sm text-gray-600 font-medium">IT Services</span>
                </span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex items-center space-x-1">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <li class="relative group">
                            <a href="{{route('admin.dashboard')}}"
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Admin
                                <span
                                    class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                            </a>
                        </li>
                    @endif
                    <li class="relative group">
                        <a href="{{route('users.home')}}"
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Home
                            <span
                                class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('users.about')}}"
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            About
                            <span
                                class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{route('users.contact')}}"
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                            Contact
                            <span
                                class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                        </a>
                    </li>

                        <li class="relative group">
                            <div class="products flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg
                group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200 cursor-pointer">
                                Products
                                <!-- Down Arrow Icon -->
                                <svg class="w-4 h-4 ml-2 transition-transform duration-200 group-hover:rotate-180"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>

                            <ul class="list hidden absolute bg-white shadow-lg mt-2 p-2 rounded w-40">
                                <li class="px-4 py-2 hover:bg-gray-100">Item 1</li>
                                <li class="px-4 py-2 hover:bg-gray-100">Item 2</li>
                            </ul>
                        </li>


                    @guest()
                        <li class="relative group">
                            <a href="{{route('login')}}"
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                                Login
                                <span
                                    class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                            </a>
                        </li>
                        <li class="relative group">
                            <a href="{{route('register')}}"
                               class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-lg group-hover:text-blue-600 group-hover:bg-blue-50 transition-all duration-200">
                                Register
                                <span
                                    class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-blue-500/0 via-blue-500/70 to-blue-500/0 opacity-0 transition-opacity duration-200 group-hover:opacity-100"></span>
                            </a>
                        </li>
                    @endguest


                    @auth
                        <li class="relative group">

                            <form method="POST" action="{{ route('logout') }}"
                                  class="px-4 py-2 text-red-600 rounded-lg transition-colors duration-200 flex items-center gap-2 hover:bg-red-50">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <!-- Mobile Menu Button -->
            <button
                class="hand_bugger inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                          d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>

            <!-- Mobile Menu (Hidden by default) -->
            <div
                class=" hidden lg:hidden absolute top-full left-0 right-0 bg-white/95 backdrop-blur-sm shadow-lg border-t border-gray-100 nav_menu">
                <nav class="container mx-auto px-4 py-6 space-y-1">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <a href="{{route('admin.dashboard')}}"
                           class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Admin
                        </a>
                    @endif
                    <a href="{{route('users.home')}}"
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
                        Home</a>
                    <a href="{{route('users.about')}}"
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">About</a>
                    <a href="{{route('users.contact')}}"
                       class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Contact</a>
                    @guest()
                        <a href="{{route('login')}}"
                           class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Login</a>
                        <a href="{{route('register')}}"
                           class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">Register</a>
                    @endguest
                    @auth
                        <form method="POST" action="{{ route('logout') }}"
                              class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-blue-600 hover:bg-blue-50 transition-all duration-200"
                        ">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        </form>
                    @endauth
                </nav>
            </div>
        </div>
    </div>
</header>


<script>
    // Menu items logic
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach(item => {
        const button = item.querySelector('button');
        if (button) {
            button.addEventListener('click', () => {
                item.classList.toggle('open');
                const submenu = item.querySelector('.submenu');
                if (submenu) {
                    submenu.classList.toggle('open');
                }
            });
        }
    });

    // Hamburger menu logic
    const hamburger = document.querySelector('.hand_bugger');
    const navMenu = document.querySelector('.nav_menu');

    if (hamburger && navMenu) {  // Add error checking
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });
    }


    const products = document.querySelector('.products');
    const list = document.querySelector('.list');

    products.addEventListener("mouseover", function () {
        list.classList.remove('hidden');
    });

    products.addEventListener("mouseleave", function () {
        list.classList.add('hidden');
    });

</script>

