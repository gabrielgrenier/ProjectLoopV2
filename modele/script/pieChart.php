<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var nbAF = <?= $nbTacheStat1 ?>;
          var nbEC = <?= $nbTacheStat2 ?>;
          var nbF = <?= $nbTacheStat3 ?>;

        var data = google.visualization.arrayToDataTable([
          ['Taches', 'Repartition des taches selon leur statut'],
          ['À faire', nbAF],
          ['En cours', nbEC],
          ['Terminées',  nbF],
        ]);

        var options = {
            is3D: true,
            colors: ['#ff7f7f', '#fffc7f', '#7fff7f']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

      }
    </script>