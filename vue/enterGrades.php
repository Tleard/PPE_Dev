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
<form>
    <table class="center">
        <tr>
            <td>Choisir l'élève :</td><td><select id="name"><?php

        $array_message = $DB->query("SELECT id, nom, prenom FROM profil WHERE rang = 1");
        $array_message = $array_message->fetchAll();
        foreach($array_message as $bn) {
            echo"<option value='".$bn['id']."'>".$bn['nom'].$bn['prenom']."</option>";
        }
                    ?></select></td><br>
        </tr>
        <tr>
            <td>Matière :</td><td><select id="name"><?php

                $array_message = $DB->query("SELECT idMatiere, nomMatiere FROM matiere");
                $array_message = $array_message->fetchAll();
                foreach($array_message as $an) {
                    echo"<option value='".$an['idMatiere']."'>".$an['nomMatiere']."</option>";
                }
                    ?></select></td><br>
        </tr>
        <tr>
            <td>Note sur 20 :</td><td><input name="note" id="note" type="number" min="0" max="20"/></td><br/>
        </tr>
        <tr>
            <td></td><td><input name="entergrade" id="entergrade" type="submit" /></td>
        </tr>
    </table>
</form>
<?php
include "footer.inc.php";
?>
</body>

