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
		                <th class="th-sm">Moyenne</th>
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
                    <td>
                        <?php
                        $moyenne = 0;
                        $total = 0;
                        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 1", array($_SESSION['id']));
                        $array_notes = $array_notes->fetchAll();
                        foreach($array_notes as $an) {
                            /*echo $an['note']." ,";*/
                            $moyenne = $moyenne + $an['note'];
                            $total = $total +1;
                        }
                        $moyenne2 = substr($moyenne / $total,0 , 4);
                        echo $moyenne2;
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
                    <td>
                        <?php
                        $moyenne = 0;
                        $total = 0;
                        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 2", array($_SESSION['id']));
                        $array_notes = $array_notes->fetchAll();
                        foreach($array_notes as $an) {
                            /*echo $an['note']." ,";*/
                            $moyenne = $moyenne + $an['note'];
                            $total = $total +1;
                        }
                        $moyenne2 = substr($moyenne / $total,0 , 4);
                        echo $moyenne2;
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
                    <td>
                        <?php
                        $moyenne = 0;
                        $total = 0;
                        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 3", array($_SESSION['id']));
                        $array_notes = $array_notes->fetchAll();
                        foreach($array_notes as $an) {
                            /*echo $an['note']." ,";*/
                            $moyenne = $moyenne + $an['note'];
                            $total = $total +1;
                        }
                        $moyenne2 = substr($moyenne / $total,0 , 4);
                        echo $moyenne2;
                        ?>

                    </td>
                </tr>

                <?php
                	if($_SESSION['classe'] == "SIO") {
                        echo "
                	<tr>
                    <td>Informatique</td>
                    <td>";
                        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                        from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                        WHERE profil.id = ? AND matiere.idMatiere = 4", array($_SESSION['id']));
                        $array_notes = $array_notes->fetchAll();
                        foreach ($array_notes as $an) {
                            echo $an['note'] . " ,";
                        }
                        echo "</td>";
                    }
        					?>

                    <?php
                    if($_SESSION['classe'] == "SIO") {
                        echo "<td>";
                        $moyenne = 0;
                        $total = 0;
                        $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                            from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                            WHERE profil.id = ? AND matiere.idMatiere = 4", array($_SESSION['id']));
                        $array_notes = $array_notes->fetchAll();
                        foreach ($array_notes as $an) {
                            /*echo $an['note']." ,";*/
                            $moyenne = $moyenne + $an['note'];
                            $total = $total + 1;
                        }
                        $moyenne2 = substr($moyenne / $total, 0, 4);
                        echo $moyenne2;
                        echo "</td>";
                    }
                    ?>

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
                    	
                    echo"</td>";}?>
                <?php
                if($_SESSION['classe'] == "GPME") {
                    echo "<td>";
                    $moyenne = 0;
                    $total = 0;
                    $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                            from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                            WHERE profil.id = ? AND matiere.idMatiere = 5", array($_SESSION['id']));
                    $array_notes = $array_notes->fetchAll();
                    foreach ($array_notes as $an) {
                        /*echo $an['note']." ,";*/
                        $moyenne = $moyenne + $an['note'];
                        $total = $total + 1;
                    }
                    $moyenne2 = substr($moyenne / $total, 0, 4);
                    echo $moyenne2;
                    echo "</td>";
                }
                ?>

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
                    	
                    echo"</td>";
                	}
                ?>

                <?php
                if($_SESSION['classe'] == "MUC") {
                    echo "<td>";
                    $moyenne = 0;
                    $total = 0;
                    $array_notes = $DB->query("SELECT matiere.idMatiere, matiere.nomMatiere, note.note
                            from matiere INNER JOIN note on matiere.idMatiere = note.idMatiere INNER JOIN profil ON note.idProfil = profil.id
                            WHERE profil.id = ? AND matiere.idMatiere = 6", array($_SESSION['id']));
                    $array_notes = $array_notes->fetchAll();
                    foreach ($array_notes as $an) {
                        /*echo $an['note']." ,";*/
                        $moyenne = $moyenne + $an['note'];
                        $total = $total + 1;
                    }
                    $moyenne2 = substr($moyenne / $total, 0, 4);
                    echo $moyenne2;
                    echo "</td>";
                }
                ?>

                </tbody>
            </table>
        </section>


        <footer class="page-footer font-small grey pt-4" style="width: 100%; position: absolute">

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
