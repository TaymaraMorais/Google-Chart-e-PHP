<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mangás', 'Vendas'],
          
          <?php
          include 'conexao.php';
          $sql = "SELECT * FROM mangas";
          $consulta = mysqli_query($conexao, $sql);

          while($dados = mysqli_fetch_array($consulta))
          {
              $manga = $dados['manga'];
              $venda = $dados['vendas'];
          ?>

          ['<?php echo $manga ?>', <?php echo $venda ?>],

        <?php } ?>


        ]);

        var options = {
          chart: {
            title: 'Mangás',
            subtitle: 'Vendas realizadas',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>