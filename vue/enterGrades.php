<?php
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
            alert('Votre compte est en attente de validation par un administrateur, pour en savoir plus consultez votre profil.')
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
<h1>Entrez une note à un élève</h1>
<form action="enterGrades.php" method="post">
    <table class="center">
        <tr>
            <td>Choisir l'élève :</td><td><select id="student"><option value="">Choisir un élève</option><?php

        $array_message = $DB->query("SELECT id, nom, prenom FROM profil WHERE rang = 1");
        $array_message = $array_message->fetchAll();
        foreach($array_message as $bn) {
            echo"<option value='".$bn['id']."'>".$bn['nom'].$bn['prenom']."</option>";
        }
                    ?></select></td>
        </tr>
        <tr>
            <td>Matière :</td><td><select id="matiere"><option value="">Choisir une matière</option><?php

                $array_message = $DB->query("SELECT idMatiere, nomMatiere FROM matiere");
                $array_message = $array_message->fetchAll();
                foreach($array_message as $an) {
                    echo"<option value='".$an['idMatiere']."'>".$an['nomMatiere']."</option>";
                }
                    ?></select></td>
        </tr>
        <tr>
            <td>Note sur 20 :</td><td><input name="note" id="note" type="number" min="0" max="20"/></td>
        </tr>
        <tr>
            <td>Nom de la note :</td><td><input name="namenote" id="namenote" type="text" /></td>
        </tr>
        <tr>
            <td></td><td><input name="entergrade" id="entergrade" type="submit" /></td>
        </tr>
    </table>
</form>
<?php

if (!isset($_POST['student']) && !isset($_POST['matiere']) && !isset($_POST['note']) && !isset($_POST['namenote'])) {
    $errorstudent = $_POST['student'];
    $errormatiere = $_POST['matiere'];
    $errornote = $_POST['note'];
    $errornamenote = $_POST['namenote'];
    if (empty($_POST['student'])) {
        echo "<p class=\"red\">ERREUR : Choisir un élève !</p>";
    } elseif (empty($_POST['matiere'])) {
        echo "<p class=\"red\">ERREUR : Choisir une matière !</p>";
    } elseif (empty($_POST['note'])) {
        echo "<p class=\"red\">ERREUR : Entrez une note !</p>";
    } elseif (empty($_POST['namenote'])) {
        echo "<p class=\"red\">ERREUR : Entrez un nom de note !</p>";
    }
} else {
    $note = $_POST['note'];
    $namenote = $_POST['namenote'];
    $id = $bn['id'];
    $matiere = $an['idMatiere'];
        try {
            $DB->insert("INSERT INTO note(idProfil, idMatiere, note, nomNote) VALUES('" . $bn['id'] . "','" . $an['idMatiere'] . "','" . $note . "','" . $namenote . "')");
            echo "Note envoyée";
        } catch (Exception $bdd) {
            die('Erreur : ' . $bdd->getMessage());
        }
    }

?>

<?php
include "footer.inc.php";
?>
</body>