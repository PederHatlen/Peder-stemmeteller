<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stemmeteller</title>

        <!-- Stylesheet importering -->
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <header><h1>Stemmeteller</h1></header>
        <div id="vote">
            <h2>Stem</h2>
            <form method="post" action="/PHP/post.php">
                <select name="partivalg" id="partiValg">
                    <?php
                        include 'PHP/DBR.php';
                        retrieve();
                    ?>
                </select>
                <input type="submit">
            </form>
        </div>
        <div id="results">
            <h2>Resultat <span class="subheader">(Ville ikke vært her på ekte)</span></h2>
        </div>
        <footer>
            <span> Laget av Peder</span>
        </footer>

        <!-- Importere script (Brukes til bl.a Easy reading mode bytting.) -->
        <script src="JS/script.js"></script>
    </body>
</html>