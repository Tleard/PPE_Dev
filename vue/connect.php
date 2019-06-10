<section>
    <h1>Bienvenue sur Bulettin.fr</h1>
    <br/>
    <table style="margin-left: 43%">
        <tr>
            <div class="col-md-12"><td>Votre nom d'utilisateur : </td><td><?php echo $_SESSION['login']?></td></div>
        </tr>
        <tr>
            <div class="col-md-12"><td>Votre nom : </td><td><?php echo $_SESSION['nom']?></td></div>
        </tr>
        <tr>
            <div class="col-md-12"><td>Votre prénom : </td><td><?php echo $_SESSION['prenom']?></td></div>
        </tr>
        <tr>
            <div class="col-md-12" ><td>Votre adresse mail : </td><td><?php echo $_SESSION['mail']?></td></div>
        </tr>
        <tr>
            <div class="col-md-12"><td>Votre classe : </td><td><?php echo $_SESSION['classe']?></td></div>
        </tr>
        <tr>
            <!--<div class="col-md-12" ><td>Compte crée depuis : </td><td><?php //echo $_SESSION['login']?></td></div>-->
        </tr>
        <tr>
            <div class="col-md-12" ><td>Votre rang : </td><td>
                    <?php
                    if($_SESSION['rang'] == 0){
                        echo 'En attente.<br>';
                    }
                    elseif($_SESSION['rang'] == 1){
                        echo 'Elève<br>';
                    }
                    elseif($_SESSION['rang'] == 2){
                        echo 'Professeur<br>';
                    }
                    elseif($_SESSION['rang'] == 3){
                        echo 'Admin<br>';
                    }
                    ?></td>
            </div>
        </tr>
    </table>
    <br>
    <div class="container" style="margin-left: 35%;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">  <h4 >Modifier vos informations</h4></div>
                    <div class="panel-body">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">
                                <form method="post" action="../modele/update.php">
                                    <div class="col-sm-5 col-xs-6 tital " >Changer votre nom d'utilisateur</div><div class="col-sm-7 col-xs-6 "><input name="newlogin" id="newlogin" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Changer votre adresse mail</div><div class="col-sm-7"><input name="newadress" id="newadress" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Changer votre mot de passe</div><div class="col-sm-7"><input name="newpassword" id="newpassword" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " >Vérifiez votre mot de passe</div><div class="col-sm-7"><input name="newpassword2" id="newpassword2" type="text" /></div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-5 col-xs-6 tital " ></div><div class="col-sm-7"><input name="postchange" id="postchange" type="submit" /></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "../modele/update.php"
    ?>
</section>