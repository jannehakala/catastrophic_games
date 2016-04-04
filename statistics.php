<?php

include("header.php");
include("drugdbinit.php");


?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>                    
                       <?php get_stats($_SESSION['login_user'], 1);
							tee_graafi(13,12,14);
					   ?>      

					</script>					   
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php function tee_graafi($aanimaara0,$aanimaara1,$aanimaara2 )
{
 echo  ' <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Task", "Hours per Day"],
          ["pinaatti",   '.$aanimaara0.'],
          ["salaatti",      '.$aanimaara1.'],
          ["pataatti",  '.$aanimaara2.']
          ]);
 
        var options = {
          title: "Mikä on paras",
          pieHole: 0.4,
        };
 
        var chart = new google.visualization.PieChart(document.getElementById("donutchart"));
        chart.draw(data, options);
      }
    </script>';
}
  ?>