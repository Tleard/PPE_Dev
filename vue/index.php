    <!doctype html>
    <html lang="en">

    <body class="text-center">

    <?php
    include "header.inc.php"
    ?>

    <section>

        <h1>Bienvenue sur le site du PPE</h1>
        <br/>

        <form class="text-center border border-light p-5 col-md-4 col-md-offset-4" style="margin-left: 33%">

            <p class="h4 mb-4">Connexion</p>

            <input type="text" name="ndc" id="ndc" maxlength=20 class="form-control mb-4" placeholder="Votre pseudo(max20caract.)"/>
            <input type="password" name="mdp" id="mdp" maxlength=15 placeholder="*****" class="form-control mb-4" />


            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" value="connexion" type="submit" style="margin: 0">Sign in</button>

            <!-- Register -->
                <a href="account.php">Inscription</a>

            </form>


        <!--<form class="form-signin">
            <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <input type="text" name="ndc" id="ndc" maxlength=20 class="form-control" placeholder="Votre pseudo(max20caract.)"/>
            <input type="password" name="mdp" id="mdp" maxlength=15 placeholder="*****" class="form-control" />
            <button type="submit" value="connexion" class="btn btn-lg btn-primary btn-block"> Connecter vous</button>

            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
        <a href="account.php"><p>Créez un compte</p></a>-->


        <article>
            <p> Rien n'est fait, tout reste à faire. </p>
        </article>
    </section>
    <?php
    include "footer.inc.php"
    ?>
    </body>
    </html>

