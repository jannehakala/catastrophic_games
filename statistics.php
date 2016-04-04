<?php

include("header.php");
include("drugdbinit.php");


?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>
                    <p>
                       <?php get_stat($_SESSION['login_user'], 1);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>