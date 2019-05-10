<?php
session_start();
include ('../modele/connectDB.php');
?>

<body class="text-center">
<?php
    include "header.inc.php";
    if (isset($_SESSION['id']))
    {
        if ($_SESSION['rang'] == 0)
        {
            echo"
            <script type=text/javascript>
            alert('Votre compte est en attente de validation par un administrateur, pour en savoir plus consulté votre profil.')
            </script>
            ";
            header('index.php');

        } elseif ($_SESSION['rang'] == 1)
        {
            echo"
            <script type=text/javascript>
            alert('Vous ne pouvez pas accêder à cette page.');
            </script>
            ";
            header('index.php');
        }
    }
    ?>
<?php
include "footer.inc.php";
?>
</body>

