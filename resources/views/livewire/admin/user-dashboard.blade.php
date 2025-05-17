<div class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
    <!-- Header Section -->
    <header class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-100">Admin Dashboard</h1>
                <p class="text-gray-400 mt-1">Welcome back, {{$user->first_name}} 👋</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                        {{$user->first_name[0]}}{{$user->last_name[0]}}
                    </div>
                    <span class="ml-3 font-medium text-gray-300">{{$user->first_name}}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-red-400 rounded-lg hover:bg-red-900/50 transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-8">
        <!-- Total Users -->

        <!-- Total Data Purchase -->
        <div class="bg-gray-800 rounded-xl shadow-lg border-l-4 border-green-500 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-900/50 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-xl text-green-400"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-400">Total Data Purchase</h3>
                    <p class="text-2xl font-bold text-green-400">{{$all_data}}</p>
                </div>
            </div>
        </div>

        <!-- Data Purchase Today -->
        <div class="bg-gray-800 rounded-xl shadow-lg border-l-4 border-red-500 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-red-900/50 flex items-center justify-center">
                    <i class="fas fa-chart-line text-xl text-red-400"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-400">Data Purchase Today</h3>
                    <p class="text-2xl font-bold text-red-400">{{$today_data}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphs Section -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
        <!-- Purchase Trends -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-200 mb-4">Purchase Trends</h3>
            <div class="h-96">
                <div id="chart_div" class="w-full h-full"></div>
            </div>
        </div>
    </div>
</div>

<script>
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {

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
                title: 'Days',
                titleTextStyle: { color: '#F3F4F6' },
                textStyle: { color: '#F3F4F6' }
            },
            vAxis: {
                title: 'Purchases',
                titleTextStyle: { color: '#F3F4F6' },
                textStyle: { color: '#F3F4F6' }
            },
            backgroundColor: 'transparent',
            lineWidth: 3,
            colors: ['#818CF8'],
            chartArea: { width: '80%', height: '70%' }
        };

        var lineChart = new google.visualization.LineChart(document.getElementById('chart_div'));
        lineChart.draw(lineData, lineOptions);
    }

    window.addEventListener('resize', function() {
        drawCharts();
    });
</script>

