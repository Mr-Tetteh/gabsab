<div id="map_markers_div"  class="w-full"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        "packages":["map"],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        "mapsApiKey": "AIzaSyAsA1mzGU58Xs_2FFULTiFCtnLa7ymvViM"
    });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Lat', 'Long', 'Name'],
            [6.6958, -1.6639, 'Asuoyeboa'],
            [6.763821, -1.590199, 'Meduma'],
            [6.704974, -1.634859, 'Bantama'],
            [6.700064, -1.646190, 'Sofoline']
        ]);

        var options = {
            icons: {
                default: {
                    normal: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
                    selected: 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
                }
            }
        };

        var map = new google.visualization.Map(document.getElementById('map_markers_div'));
        map.draw(data, options);
    }

</script>
