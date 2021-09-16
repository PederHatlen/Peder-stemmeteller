<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stemmeteller</title>

        <!-- Stylesheet importering -->
        <link rel="stylesheet" href="CSS/style.css">
        <?php include 'PHP/DBR.php';?>
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
            for (let i = 0; i < stemmer.length; i++) {
                if (stemmer[i] != 0) {
                    stemmerUN.push(stemmer[i]);
                    partierUN.push(partier[i]);
                }
            }

        </script>
    </head>
    <body>
        <header><h1>Stemmeteller</h1></header>
        <div id="vote">
            <h2>Stem</h2>
            <form method="post" action="/PHP/post.php">
                <select name="partivalg" id="partiValg"></select>
                <input type="submit">
            </form>
        </div>
        <div id="results">
            <h2>Resultat <span class="subheader">(Ville ikke vært her på ekte)</span></h2>
            <div id="resultCharts">
                <div class="chartDIV">
                    <canvas id="pieChart_Canvas"></canvas>
                </div>
                <!-- <div class="chartDIV">
                    <canvas id="other_Canvas"></canvas>
                </div> -->
            </div>
        </div>
        <footer>
            <span>Laget av Peder</span>
        </footer>


        
        <!-- Kake diagramm tegning, hentet fra chartjs.org -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <!-- Importere script (Brukes til bl.a Easy reading mode bytting.) -->
        <script src="JS/script.js"></script>
    </body>
</html>