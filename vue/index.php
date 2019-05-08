    <!doctype html>
    <html lang="en">

    <body class="text-center">

    <?php
    include "header.inc.php";
    session_start();
    include ('../modele/connectDB.php');
    ?>

    <section>

        <h1>Bienvenue sur le site du PPE</h1>
        <br/>

            <?php
            if (isset($_SESSION['id'])){
             echo 'Bienvenue' . ' '. $_SESSION['prenom'] .' '. $_SESSION['nom'] . '<br>' ;
             echo '<a href="deconnexion.php">
            Deconnexion
            </a><br>';
             echo 'Votre rang : ' .$_SESSION['rang'];
             echo "<br><br><br>";
             echo var_dump($_SESSION);
            }else
                include 'formlogin.php'
            ?>





    </section>
    <?php
    include "footer.inc.php"
    ?>
    </body>
    </html>

