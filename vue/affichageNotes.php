<?php
include ('../modele/connectDB.php');
?>

<?php
include ('header.inc.php');
?>
        <h1 class="text-center">Affichage des notes</h1></>
        <section>
            <h2 class="text-center">Année 2018/2019</h2>

            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
		            <tr>
		                <th class="th-sm">Nom matiére</th>
		                <th class="th-sm">Notes</th>
		                <!--<th class="th-sm">Moyenne</th>-->
		            </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Maths</td>
                    <td>
                    	<?php
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 1", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	?>
                    </td>
                </tr>
                <tr>
                    <td>Français</td>
                    <td>
                    	<?php
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 2", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	?>
                    </td>
                </tr>
                <tr>
                    <td>Anglais</td>
                    <td>
                    	<?php
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 3", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	?>
                    </td>
                </tr>
                <?php
                	if($_SESSION['classe'] == "SIO")
                	{
                	echo"
                	<tr>
                    <td>Informatique</td>
                    <td>";
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 4", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	echo"</td>
                </tr>";}?>
                <?php
                	if($_SESSION['classe'] == "GPME")
                	{
                	echo"
                	<tr>
                    <td>Gestion</td>
                    <td>";
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 5", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	
                    echo"</td>
                </tr>";}?>
                <?php
                	if($_SESSION['classe'] == "MUC")
                	{
                	echo"
                	<tr>
                    <td>Comptabilité</td>
                    <td>";
                    
                    		$array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 6", array($_SESSION['id']));
        					$array_notes = $array_notes->fetchAll();
        					foreach($array_notes as $an) {
        						echo $an['note']." ,";
        					}
                    	
                    echo"</td>
                </tr>";
                	}
                ?>

                </tbody>
            </table>
        </section>


<?php
    include('footer.inc.php')
    ?>
