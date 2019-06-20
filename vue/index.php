    <!doctype html>
    <html lang="en">

    <body class="text-center">

    <?php
    include "header.inc.php";
    session_start();
    include ('../modele/connectDB.php');
    ?>

    <?php
        if (isset($_SESSION['id'])){
            include "connect.php";
        }else {
            header("Location: login.php");
        }
    ?>
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
    </body>
    </html>

