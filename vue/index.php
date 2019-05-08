    <!doctype html>
    <html lang="en">

    <body class="text-center">

    <?php
    include "header.inc.php"
    ?>

    <section>

        <h1>Bienvenue sur le site du PPE</h1>
        <br/>

            <?php
            if (isset($_SESSION['id'])){
             echo 'Bienvenue' . ' '. $_SESSION['prenom'] .' '. $_SESSION['nom'] ;

             echo '<a href="deconnexion.php">
            Deconnexion
            </a>';
            }else
                include 'formlogin.php'
            ?>





    </section>
    <?php
    include "footer.inc.php"
    ?>
    </body>
    </html>

