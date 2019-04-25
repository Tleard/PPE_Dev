<?php
include "header.inc.php"
?>
    <aside>
        <?php
        echo "Bienvenue " . $_SESSION["logged"] . ", vous êtes connecté !";
        ?>
        <form action="index.php" method="post">
            <input id="logout" name="logout" type="hidden" value="logout">
            <input type="submit" value="Logout" />
        </form>
    </aside>
    <section>
        <h1>Bienvenue sur le site du PPE</h1>
        <br/>
        <article>
            <p> Rien n'est fait, tout reste à faire. </p>
        </article>
    </section>
<?php
include "footer.inc.php"
?>