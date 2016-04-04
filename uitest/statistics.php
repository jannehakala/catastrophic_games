<?php

include("header.php");
include("drugdbinit.php");


?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>                    
                       <?php print_r(get_stats($_SESSION['login_user'], 1));
							tee_graafi();
							echo '<div id="curve_chart" style="width: 900px; height: 500px; float: right" float:right></div>';
					   ?>      

					</script>					   
                </div >
            </div>
        </div>
    </div>
</body>
</html>
<?php function tee_graafi( )
{
 echo  '   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {"packages":["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Year", "Agents", "Drugcalculations"],
          ["2004",  6,      5],
          ["2005",  5,      1],
          ["2006",  0,       4],
          ["2007",  1,      7]
        ]);

        var options = {
          title: "Company Performance",
          curveType: "function",
          legend: { position: "bottom" }
        };

        var chart = new google.visualization.LineChart(document.getElementById("curve_chart"));

        chart.draw(data, options);
      }
    </script>';
}
  ?>