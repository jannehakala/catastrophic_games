<?php

include("header.php");
include("drugdbinit.php");


?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>                    
                       <?php get_stats($_SESSION['login_user'], 1);?>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>