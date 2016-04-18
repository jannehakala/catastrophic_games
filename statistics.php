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
                        printstatistics($_SESSION['login_user']);
                    ?>

                    <div id="curve_chart_Drug identification" style="width: 900px; height: auto; float: left"></div>
                    <div id="curve_chart_Drug calculations" style="width: 900px; height: auto; float: left"></div>
                    <div id="curve_chart_Unit conversions" style="width: 900px; height: auto; float: left"></div>
                    <div id="curve_chart_Exam" style="width: 900px; height: auto; float: left"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        <?php
                            printgraph("Drug identification");
                            printgraph("Drug calculations");
                            printgraph("Unit conversions");
                            printgraph("Exam");
                        ?>
                        }
                    </script>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
