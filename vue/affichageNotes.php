<?php
session_start();
include ('../modele/connectDB.php');
?>

<?php
include ('header.inc.php');
?>
    <body>
        <header>
            <table class="titre">
                <tr>
                    <td><h1>Affichage des notes</h1></td>
                </tr>
            </table>
        </header>
        <section>
            <h2>Année 2018/2019</h2>
            <article>
                <table class="table">
                <?php
                $array_notes = $DB->query("SELECT matiere.nomMatiere, note.note
                from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.idProfil
                WHERE profil.idProfil = 20");
                $array_notes = $array_notes->fetchAll();
                foreach($array_notes as $an) {

                    echo "<tr> <td>" . $an['note'] . "</td>";
                    echo"<td>". $an['nomMatiere'] ."</td>";
                    echo"</tr>";
                }
                ?>

                </table>
            </article>
        </section>
    <?php
    include('footer.inc.php')
    ?>