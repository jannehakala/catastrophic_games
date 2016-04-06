<?php

include("header.php");
include("drugdbinit.php");
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include ("BL.php");
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
					
							$result1 = count($drugcal);
							if($result1 > 10){
								$result1 = 10;
							}
							if($resul1 < 11){
								while($result1 != 10){
								array_push($drugcal, '0');
								resul1 = count($drugcal);
								}
							}
							$result2 = count($agents);
							if($result2 > 10){
								$resul2 = 10;
							}
							if($resul2 < 11){
								while($result2 != 10){
								array_push($agents, '0');
								resul2 = count($agents);
								}
							}
						    $result3 = count($unitcon);
							if($result3 > 10){
								$resul3 = 10;
							}
							if($resul13< 11){
								while($result3 != 10){
								array_push($unitcon, '0');
								resul3 = count($unitcon);
								}
							}
						
							tee_graafi($drugcal, $agents, $unitcon);
							echo '<div id="curve_chart" style="width: 900px; height: 500px; float: right" float:right></div>';
					   ?>      

					</script>					   
                </div >
            </div>
        </div>
    </div>
</body>
</html>
<?php function tee_graafi($drugcal, $agents, $unitcon)
{
 echo  '   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {"packages":["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["number", "Agents", "Drug calculations", "Unit conversions"],
          ["1",  '.$agents[0].',      '.$drugcal[0].',	'.$unitcon[0].'],
          ["2",  '.$agents[1].',      '.$drugcal[1].', '.$unitcon[1].'],
          ["3",  '.$agents[2].',        '.$drugcal[2].', '.$unitcon[2].'],
          ["4",  '.$agents[3].',     '.$drugcal[3].' , '.$unitcon[3].'],
		  ["5",  '.$agents[4].',      '.$drugcal[4].', '.$unitcon[4].'],
		  ["6",  '.$agents[5].',      '.$drugcal[5].', '.$unitcon[5].'],
		  ["7",  '.$agents[6].',      '.$drugcal[6].', '.$unitcon[6].'],
		  ["8",  '.$agents[7].',      '.$drugcal[7].', '.$unitcon[7].'],
		  ["9",  '.$agents[8].',      '.$drugcal[8].', '.$unitcon[8].'],
		  ["10",  '.$agents[9].',     '.$drugcal[9].', '.$unitcon[9].']
		  
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