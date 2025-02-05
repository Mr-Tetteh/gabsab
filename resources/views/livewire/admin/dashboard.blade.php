<div class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Header Section -->
    <header class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
                <p class="text-gray-600 mt-1">Welcome back, {{$user->first_name}} 👋</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                        {{$user->first_name[0]}}{{$user->last_name[0]}}
                    </div>
                    <span class="ml-3 font-medium text-gray-700">{{$user->first_name}}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-red-600 rounded-lg hover:bg-red-50 transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-users text-xl text-blue-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Users</h3>
                    <p class="text-2xl font-bold text-blue-500">{{$all_users}}</p>
                </div>
            </div>
        </div>

        <!-- Admin Users -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-purple-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                    <i class="fas fa-user-shield text-xl text-purple-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Admin Users</h3>
                    <p class="text-2xl font-bold text-purple-500">{{$admin_users}}</p>
                </div>
            </div>
        </div>

        <!-- Resellers -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-teal-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center">
                    <i class="fas fa-users-cog text-xl text-teal-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Resellers</h3>
                    <p class="text-2xl font-bold text-teal-500">{{$resellers_users}}</p>
                </div>
            </div>
        </div>

        <!-- New Users Today -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-fuchsia-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-fuchsia-100 flex items-center justify-center">
                    <i class="fas fa-user-plus text-xl text-fuchsia-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">New Users Today</h3>
                    <p class="text-2xl font-bold text-fuchsia-500">{{$today_users}}</p>
                </div>
            </div>
        </div>

        <!-- Total Data Purchase -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-xl text-green-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Data Purchase</h3>
                    <p class="text-2xl font-bold text-green-500">{{$all_data}}</p>
                </div>
            </div>
        </div>

        <!-- Total Payments -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-yellow-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-xl text-yellow-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Payments</h3>
                    <p class="text-2xl font-bold text-yellow-500">45,00</p>
                </div>
            </div>
        </div>

        <!-- Data Purchase Today -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-red-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                    <i class="fas fa-chart-line text-xl text-red-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Data Purchase Today</h3>
                    <p class="text-2xl font-bold text-red-500">{{$today_data}}</p>
                </div>
            </div>
        </div>

        <!-- Amount Today -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-indigo-500 p-6 hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-xl text-indigo-500"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Amount Today</h3>
                    <p class="text-2xl font-bold text-indigo-500">424</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphs Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Overview Distribution -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Overview Distribution</h3>
            <div class="h-96">
                <div id="piechart_3d" class="w-full h-full"></div>
            </div>
        </div>

        <!-- Purchase Trends -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Purchase Trends</h3>
            <div class="h-96">
                <div id="chart_div" class="w-full h-full"></div>
            </div>
        </div>
    </div>

    <!-- Google Charts Scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Pie Chart
            var pieData = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Total Users', {{$all_users}}],
                ['Admin Users', {{$admin_users}}],
                ['Resellers', {{$resellers_users}}],
                ['New Users Today', {{$today_users}}],
                ['Total Data Purchase', {{$all_data}}],
                ['Data Purchase Today', {{$today_data}}],
                ['Total Payment', 4],
                ['Payment Today', 6]
            ]);

            var pieOptions = {
                title: 'Distribution Overview',
                is3D: true,
                backgroundColor: 'transparent'
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            pieChart.draw(pieData, pieOptions);

            // Line Chart
            var lineData = new google.visualization.DataTable();
            lineData.addColumn('string', 'Date');
            lineData.addColumn('number', 'Purchases');

            lineData.addRows([
                    @foreach($data_purchase as $date => $count)
                ['{{$date}}', {{$count}}],
                @endforeach
            ]);

            var lineOptions = {
                hAxis: {
                    title: 'Days'
                },
                vAxis: {
                    title: 'Purchases'
                },
                backgroundColor: 'transparent'
            };

            var lineChart = new google.visualization.LineChart(document.getElementById('chart_div'));
            lineChart.draw(lineData, lineOptions);
        }

        // Redraw charts on window resize
        window.addEventListener('resize', function() {
            drawCharts();
        });
    </script>
</div>
