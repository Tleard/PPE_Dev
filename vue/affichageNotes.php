<?php
session_start();
include ('../modele/connectDB.php');
?>

<?php
include ('header.inc.php');
?>
    <?php
    /*$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                    from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                    WHERE profil.id = ?", array($_SESSION['id']));
    $array_notes = $array_notes->fetchAll();*/
    ?>
    <!--Matiere Specifique requette-->
    <?php
        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ?", array($_SESSION['id']));
        $array_notes = $array_notes->fetchAll();
    ?>
        <h1 class="text-center">Affichage des notes</h1></>
        <section>
            <h2 class="text-center">Année 2018/2019</h2>

            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Nom matiére</th>
                    <th class="th-sm">Notes</th>
                    <th class="th-sm">Moyenne</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    /** Si les notes ont le même Id l'insérér dans une string commune,
                     * Determiner le nombre de string néccésaires avec un parseur qui fait toutes les notes
                     */

                    /**
                     * Determine le nombre de matiére pour l'affichage
                     */
                    foreach($array_notes as $an) {
                        echo "<tr> <td>" . $an['nomMatiere'] . "</td>";
                        echo "<td>" . $an['note'] . "</td>";
                        echo "<td>" . $an['note'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </section>


<?php
    include('footer.inc.php')
    ?>