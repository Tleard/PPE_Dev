<?php
session_start();
?>
<!doctype html>
<html lang="fr">
    <body class="text-center">
    <?php
    include ('../modele/connectDB.php');
    include "header.inc.php";
    if (isset($_SESSION['id']))
    {
        $rang = $_SESSION['rang'];
        if ($rang != 3)
        {
            echo "<script language='javascript'>alert('Seul les administrateurs ont accés à cette page.');</script>";
            header('index.html');
            exit;
        }
    }
    ?>
    <h2>Profil en attente de validation</h2><br>

    <?php
    $array_profil = $DB->query("SELECT * FROM profil WHERE rang = 0",
        array($_SESSION['id']));
    $array_profil = $array_profil->fetchAll();
    ?>

    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse mail</th>
            <th>Statut</th>
            <th>Confirmer</th>
        </tr>
        <?php
        foreach($array_profil as $ap){
            ?>
            <tr>
                <td><?= $ap['nom'] ?></td>
                <td><?= $ap['prenom'] ?></td>
                <td><?= $ap['mail']?></td>
                <td>En attente de confirmation</td>
                <td style="padding-top: 0px">
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ; ?>"> <input name="profil" value="<?=$ap['id']?>" type="submit" class="btn-admin btn-success btn"></form></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <?php
    if (isset($_POST['profil'])){
        $DB->insert("UPDATE profil SET rang = '2'WHERE id = ?",
            array($_POST['profil']));
        echo'<script type="text/javascript">
        alert("Le compte a bine été validé");
        </script>
        ';
    }
    ?>




    <?php
    include "footer.inc.php"
    ?>
    </body>
</html>
