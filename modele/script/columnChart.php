<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {
        var col1 = <?= $nbTacheAss1 ?>;
        var col2 = <?= $nbTacheAss2 ?>;
        var col3 = <?= $nbTacheAss3 ?>;
          var data = google.visualization.arrayToDataTable([
             ['Element', 'tâches', { role: 'style' }, { role: 'annotation' } ],
             ['À Faire', col1, '#ff7f7f', 'AF' ],
             ['En Cours', col2, '#fffc7f', 'EC' ],
             ['Terminées', col3, '#7fff7f', 'T' ],
          ]);

          var options = {
            hAxis: {
              title: 'Status',
            },
            vAxis: {
              title: 'Nombre de tâches'
            }
          };

          var chart = new google.visualization.ColumnChart(
            document.getElementById('chart_div'));

          chart.draw(data, options);
    }
  </script>