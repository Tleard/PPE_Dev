<section>
    <h1>Bienvenue sur Bulettin.fr</h1>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">  <h4 >Vos informations</h4></div>
                    <div class="panel-body">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">
                                        <input id="profile-image-upload" class="hidden" type="file">
                                        <div style="color:#999;" >Cliquez ici pour changer votre photo de profil</div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <h4 style="color:#00b1b1;"><?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' <br/> ';
                                        echo '<a href="deconnexion.php">Deconnexion</a>'; ?> </h4>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">


                                <div class="col-sm-12" >Votre nom d'utilisateur:</div><div class="col-sm-12 "><?php echo $_SESSION['login']?></div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-12 tital " >Votre nom:</div><div class="col-sm-12"><?php echo $_SESSION['nom']?></div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-12 tital " >Votre prénom:</div><div class="col-sm-12"><?php echo $_SESSION['prenom']?></div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-12 tital " >Votre adresse mail:</div><div class="col-sm-12"><?php echo $_SESSION['mail']?></div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-12 tital " >Votre classe:</div><div class="col-sm-12"><?php echo $_SESSION['classe']?></div>

                                <!--<div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-12 tital " >Compte crée depuis:</div><div class="col-sm-12"><?php echo $_SESSION['login']?></div>-->

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-12 tital " >Votre rang:</div><div class="col-sm-12">
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
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(function() {
                    $('#profile-image1').on('click', function() {
                        $('#profile-image-upload').click();
                    });
                });
            </script>
        </div>
    </div>
    <div class="container">
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
                                    <div class="col-sm-12 tital " >Changer votre nom d'utilisateur</div><div class="col-sm-12 "><input name="newlogin" id="newlogin" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-12 tital " >Changer votre adresse mail</div><div class="col-sm-12"><input name="newadress" id="newadress" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-12 tital " >Changer votre mot de passe</div><div class="col-sm-12"><input name="newpassword" id="newpassword" type="text" /></div>
                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-12 tital " >Vérifiez votre mot de passe</div><div class="col-sm-12"><input name="newpassword2" id="newpassword2" type="text" /></div>

                                    <div class="clearfix"></div>
                                    <div class="bot-border"></div>

                                    <div class="col-sm-12 tital " ></div><div class="col-sm-12"><input name="postchange" id="postchange" type="submit" /></div>
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