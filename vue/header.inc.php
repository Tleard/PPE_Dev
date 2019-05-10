<?php
    session_start();
?>
<html>
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
            <!-- Bootstrap core CSS -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="design.css">
            <!-- Material Design Bootstrap -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <!--JQuery-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
            <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

        <meta charset="UTF-8" />
        <title>Site PPE</title>
        <!--<link rel="stylesheet" href="design.css"/>-->
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
-->    </head>
    <body>
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
        <a class="navbar-brand" href="index.php">Bulletin.fr</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enterGrades.php"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="affichageNotes.php">Mes notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i>Contact</a>
                </li>

                <?php
                if (isset($_SESSION['id'])){
                    $rang = $_SESSION['rang'];
                    if ($rang == 3){
                        echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"admin.php\">Admin</a>
                        </li>
                        ";

                    }

                    if ($rang == 2 || $rang == 0){
                        echo"
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"enterGrades.php\">Entrée des notes</a>
                        </li>
                        ";
                    }
                }

                ?>

            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <?php

                    if (isset($_SESSION['id'])){

                        ?>

                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="deconnexion.php">
                                Deconnexion<i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                <?php

                    } else {

                        ?>

                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="login.php">
                                Connexion<i class="fas fa-sign-in-alt"></i>
                            </a>
                        </li>


                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>