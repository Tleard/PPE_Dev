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
    $afficher_profil = $DB->query("SELECT * FROM profil WHERE classe = 2 ",
        array($_SESSION['id']));
    $afficher_profil = $afficher_profil->fetchAll();
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse mail</th>
            <th scope="col">Statut</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"></th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>

    <?php
    include "footer.inc.php"
    ?>
    </body>
</html>
