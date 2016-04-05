
<?php
include ("header.php");
if (!isset($_SESSION['question'])) $_SESSION['question'] = 0;
else $_SESSION['question'] = 0;
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;
else $_SESSION['score'] = 0;
?>
            <div id="right">
                <div id="content">
                    <h2>Unit conversions.</h2>
                    <p style="margin-top: 20px;">
                        Unit conversions.
                    </p>        
                    <p style="margin-top: 20px;">
                        <form method="POST" action="quizview.php">
                            <input type="submit" value="Start">
                            <input type="hidden" name="quiztype" value="unitconversionquiz">
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>