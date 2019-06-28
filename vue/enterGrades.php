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
<form method="post">
    <table class="center">
        <tr>
            <td>Choisir l'élève :</td><td><select id="student" name="student" ><option value="">Choisir un élève</option>
                <?php
                $array_message = $DB->query("SELECT id, nom, prenom FROM profil WHERE rang = 1");
                $array_message = $array_message->fetchAll();
                foreach($array_message as $bn) {
                    echo"<option value='".$bn['id']."'>".$bn['nom'].' '.$bn['prenom']."</option>";
                }
                ?>
        </select></td>
        </tr>
        <tr>
            <td>Matière :</td><td><select id="matiere" name="matiere" ><option value="">Choisir une matière</option>
                <?php
                $array_message = $DB->query("SELECT idMatiere, nomMatiere FROM matiere");
                $array_message = $array_message->fetchAll();
                foreach($array_message as $an) {
                    echo"<option value='".$an['idMatiere']."'>".$an['nomMatiere']."</option>";
                }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Note sur 20 :</td><td><input name="note" id="note" type="number" min="0" max="20"/></td>
        </tr>
        <tr>
            <td>Nom de la note :</td><td><input name="namenote" id="namenote" type="text" /></td>
        </tr>
        <tr>
            <td></td><td><button name="entergrade" id="entergrade" type="submit" >Envoyer la note</button></td>
        </tr>
    </table>
</form>
<?php

if (isset($_POST['entergrade'])) {
        $errorstudent = $_POST['student'];
        $errormatiere = $_POST['matiere'];
        $errornote = $_POST['note'];
        $errornamenote = $_POST['namenote'];
        if (empty($_POST['student'])) {
            echo "<p class=\"red\">ERREUR : Choisir un élève !</p>";
        }if (empty($_POST['matiere'])) {
            echo "<p class=\"red\">ERREUR : Choisir une matière !</p>";
        }if (empty($_POST['note'])) {
            echo "<p class=\"red\">ERREUR : Entrez une note !</p>";
        }if (empty($_POST['namenote'])) {
            echo "<p class=\"red\">ERREUR : Entrez un nom de note !</p>";
        }if(!empty($_POST['student'])&& !empty($_POST['matiere'])&& !empty($_POST['note'])&& !empty($_POST['namenote'])) {
            $note = $_POST['note'];
            $namenote = $_POST['namenote'];
            $id = $_POST['student'];
            $matiere = $_POST['matiere'];
            try {
                $DB->insert("INSERT INTO note(idProfil, idMatiere, note, nomNote) VALUES('" . $id . "','" . $matiere . "','" . $note . "','" . $namenote . "')");
                echo "
                <script type=text/javascript>
                alert('Note envoyée')
                </script>";
            } catch (Exception $bdd) {
                die('Erreur : ' . $bdd->getMessage());
            }
        }
}


?>

<footer class="page-footer font-small grey pt-4" style="position:absolute!important;width: 100%">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-12 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">Contact</h5>
                <p>Mail : bulletin@gmail.fr</p>

            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="mailto:bulletin@gmail.fr"> bulletin@gmail.fr</a>
    </div>
    <!-- Copyright -->

</footer>
</body>
