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
					 //   print_r(get_stats($_SESSION['login_user'], 1));
				//	   	$drugcal = array();
					//	$unitcon = array();
					//	$agents = array();
						
	
				     $stats = get_stats($_SESSION['login_user'], 1)
					  print_r($stats);
							tee_graafi();
							echo '<div id="curve_chart" style="width: 900px; height: 500px; float: right" float:right></div>';
							$laskuapu = 0;
						/*						foreach($stats as $rivi => $arvo){
								echo $apu."---------------------<br>";
								foreach($arvo as $avain => $apu2){
									if($avain == 0){
										if($apu2 == "Drugcalculations"){
											$laskuapu == 1;
										
										}
										if($apu2 == "Agents"){
											$laskuapu == 2;
										}
										if($apu2 == "Unit conversions"){
											$laskuapu == 3;
										}									
									}
									if($avain == 1){
										if($laskuapu == 1){		
$												echo "Laskuapu : ".$laskuapu."Vastaus:".$apu2;									
											//7array_push($drugcal, $apu2);
										}
										if($laskuapu == 2){
										//	array_push($agents, $apu2);
										echo "Laskuapu : ".$laskuapu."Vastaus:".$apu2;
										}
										if($laskuapu == 3){
										//	array_push($unitcon, $apu2);
										echo "Laskuapu : ".$laskuapu."Vastaus:".$apu2;
										}		
									}
							}
							}*/
							echo "drugcalc------------<br>";
						//	print_r($drugcal);
								echo "drugcalc------------<br>";
							//print_r($agents);
								echo "unitcon------------<br>";
							//print_r($unitcon);
							/*						foreach($aarray as $apu => $arvo){
								echo $apu." apu-----<br>";
								foreach($arvo as $avain => $ap2){
									echo $avain." avain<br>";
									echo $ap2." ap2<br>";
							}
							}*/
					
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
          ["1",  6,      5,	10],
          ["2",  5,      1, 6],
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