<!doctype html>
<html lang="fr">
    <body class="text-center">
    <?php

    include "header.inc.php";

    if (isset($_SESSION['id']))
    {
        if ($_SESSION['rang'] != 3 );
        {
            echo "<script language='javascript'>alert('Seul les administrateurs ont accés à cette page.');
            window.location.href ='index.php';
            </script>";
            exit;
        }
    }


    ?>
    <h2>Profil en attente de validation</h2>







    <?php
    include "footer.inc.php"
    ?>
    </body>
</html>
