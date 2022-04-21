<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stemmeteller</title>

        <!-- importering av stylesheet og php funksjoner -->
        <link rel="stylesheet" href="CSS/style.css">
        <?php include 'PHP/DBR.php';?>

        <!-- Hente ut data fra databasen og lagre dem i js arrayer for bruk i f.eks diagramm (ville ikke vert her på en ekte side.) -->
        <script>
            let partier = [<?php
                $partier = retrieve("parti");

                //Skriver ut innholdet i tabellen
                for ($i=0; $i < count($partier); $i++) {
                    $parti = $partier[$i];
                    echo ($i <= 0? "":", ") . "'$parti'";
                }
                
            ?>];
            let stemmer = [<?php
                $stemmer = retrieve("stemmer");

                //Skriver ut innholdet i tabellen
                for ($i=0; $i < count($stemmer); $i++) { 
                    echo ($i <= 0? "":", ") . $stemmer[$i];
                }
            ?>];
            //Partikoder Uten Null stemmer
            let partierUN = [];
            let stemmerUN = [];
            let piechartData = [['Partier', 'Stemmer']];
            for (let i = 0; i < stemmer.length; i++) {
                if (stemmer[i] != 0) {
                    stemmerUN.push(stemmer[i]);
                    partierUN.push(partier[i]);
                    let temparray = [partier[i], stemmer[i]];
                    piechartData.push(temparray);
                }
            }

        </script>
    </head>
    <body>
        <header><h1>Stemmeteller</h1></header>
        <div id="vote">
            <h2>Stem</h2>
            <!-- Form med post til PHP/post.php, blir automatisk populert av script.js -->
            <form method="post" action="PHP/post.php">
                <select name="partivalg" id="partiValg"></select>
                <input type="submit">
            </form>
        </div>
        <!-- Resultater hentet fra databasen, (Gjøres i head + DBR.php) -->
        <div id="resultater">
            <h2>Resultat <span class="subheader">(Ville ikke vært her på ekte)</span></h2>
            <span id="resultatInfo"></span>
            <div id="resultCharts">
                <div id="piechart"></div>
            </div>
        </div>
        <footer>
            <span>Laget av Peder</span>
        </footer>


        
        <!-- Kake diagramm tegning, bruker google charts -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <!-- Importere script (Brukes til bl.a Easy reading mode bytting.) -->
        <script src="JS/script.js"></script>
    </body>
</html>