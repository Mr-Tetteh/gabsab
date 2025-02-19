<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <!-- Header Section -->
    <header class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Your Dashboard</h1>
                <p class="text-gray-600 mt-1">Welcome back, {{$user->first_name}} </p>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                        {{$user->first_name[0]}} {{$user->last_name[0]}}
                    </div>
                    <span class="ml-3 font-medium text-gray-700">Daniel</span>
                </div>
                <form method="POST" action="{{ route('logout') }}"
                      class="px-4 py-2 text-red-600 rounded-lg  transition-colors duration-200 flex items-center gap-2">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>

                </form>

            </div>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="flex flex-col md:flex-cols-2 lg:flex-cols-3 gap-8 w-full">
        <!-- Total Users Card -->

        <!-- Data Buyers Card -->
        <div
            class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-xl text-green-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Data Purchased</h3>
                    <p class="text-2xl font-bold text-green-500">{{$logged_in_user_data}}</p>
                </div>
            </div>
        </div>

        <!-- Total Payments Card -->
        <div
            class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-chart-line text-xl text-blue-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Purchase today</h3>
                    <p class="text-2xl font-bold text-blue-500">{{$today_purchase}}</p>
                </div>
            </div>
        </div>



    </div>
</div>
