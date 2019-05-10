    <!doctype html>
    <html lang="en">

    <body class="text-center">

    <?php
    include "header.inc.php";
    session_start();
    include ('../modele/connectDB.php');
    ?>

    <?php
        if (isset($_SESSION['id'])){
            include "connect.php";
        }else
            include 'formlogin.php'
    ?>
    <?php
    include "footer.inc.php"
    ?>
    </body>
    </html>

