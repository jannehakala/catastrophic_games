<?php

include("header.php");
include("drugdbinit.php");
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>                    
                       <?php 
					 
					   	$drugcal = array();
						$unitcon = array();
						$agents = array();
						
	
							$stats =  get_stats($_SESSION['login_user'], 1);
						
							$laskuapu = 0;
							foreach($stats as $rivi => $arvo){
								foreach($arvo as $avain => $apu2){
									if($avain == 0){
										if($apu2 == "Drugcalculations"){
											$laskuapu = 1;
										}
										if($apu2 == "Agents"){
											$laskuapu = 2;
										}
										if($apu2 == "Unit conversions"){
											$laskuapu = 3;
										}									
									}
									if($avain == 1){
										if($laskuapu == 1){		
											array_push($drugcal, $apu2);
										}
										if($laskuapu == 2){
											array_push($agents, $apu2);
										}
										if($laskuapu == 3){
											array_push($unitcon, $apu2);
										}		
									}
							}
							}
							echo "DRUG";
						print_r($drugcal);
						echo "<br>";
						echo "agents";
						print_r($agents);
						echo "<br>";
						echo "unitcon";
						print_r($unitcon);
						echo "<br>";
							$result1 = count($drugcal);
							if($result1 > 10){
								$result1 = 10;
							}
							$result2 = count($agents);
							if($result2 > 10){
								$resul2 = 10;
							}
						    $result3 = count($unitcon);
							if($result3 > 10){
								$resul3 = 10;
							}
						/*	for($i = 0; $i < $result1 $i++){
								
							}
							for($i = 0; $i < $result2 $i++){
								
							}
							for($i = 0; $i < $result3 $i++){
								
							}
							/*foreach($aarray as $apu => $arvo){
								echo $apu." apu-----<br>";
								foreach($arvo as $avain => $ap2){
									echo $avain." avain<br>";
									echo $ap2." ap2<br>";
							}
							}*/
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
          ["number", "Agents", "Drug calculations", "Unit conversions"],
          ["1",  2,      '.$drugcal[0].',	10],
          ["2",  5,      '.$drugcal[1].', 6],
          ["3",  0,       4, 4],
          ["4",  1,      7, 6],
		  ["5",  5,       4, 9],
		  ["6",  8,       4, 0],
		  ["7",  0,       4, 2],
		  ["8",  0,       4, 4],
		  ["9",  0,       4, 7],
		  ["10",  0,       4, 10]
		  
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