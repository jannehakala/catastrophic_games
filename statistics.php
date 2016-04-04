<?php

include("header.php");
include("BL.php")

?>
            <div id="right">
                <div id="content">
                    <h2>Your stats</h2>
                    <p>
                        <?php echo get_stats($_SESSION['login_user'],1);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>