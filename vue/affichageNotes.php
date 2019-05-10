<html>
    <head>
        <meta charset="utf-8"/>
        <title>Affichage des notes</title>
        <link rel="stylesheet" href="design/design.css"/>
    </head>
    <body>
        <header>
            <table class="titre">
                <tr>
                    <td><h1>Affichage des notes</h1></td>
                </tr>
            </table>
        </header>
        <section>
            <h2>Année 2018/2019</h2>
            <article>
                <table class="tableau">
                <?php
                    $bdd = new PDO("mysql:host=localhost;dbname=ppe;charset=utf8", "PPE_dev", "operations");
                    $req = $bdd->query('SELECT * FROM note, matiere');
                    while ($donnees = $req->fetch())
                    {
                        echo "<tr>";
                        echo "<td>".$donnees['nomMatiere']." : </td>";
                        echo "<td>".$donnees['note']."</td>";
                        echo "</tr>";
                    }
                ?>
                </table>
            </article>
        </section>
    </body>
</html>