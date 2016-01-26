<?php
/* @var $this yii\web\View */
use yii\web\View;
use app\assets\AppAsset;
$this->title = 'Estadísticas';
$script="google.load(";
    $script.='"visualization", "1", {packages:["corechart"]});';
     $script.=" google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hombres/mujeres'],
          ['Hombres',     $males],
          ['Mujeres',      $females]
        ]);

        var options = {
          title: 'Total Usuarios',
          pieHole: 0.4,
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart1.draw(data, options);
   

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Ventas'],
          ['Completas',     $sellc],
          ['Incompletas', $selli]
        ]);

        var options = {
          title: 'Ventas totales'
        };

        var chart3 = new google.visualization.PieChart(document.getElementById('piechart'));

        chart3.draw(data, options);


      }

"
      ;
$this->registerJs($script,View::POS_END);
// $this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locale-index">
        <div class="row">
            <div class="col-lg-4">
                <h2>Total de Clientes.</h2>

                <div id="donutchart" style="width:100%;"></div>


                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Total de Ventas.</h2>

              <div id="piechart" style="width:100%;"></div>


                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> -->
            </div>
        </div>

</div>
