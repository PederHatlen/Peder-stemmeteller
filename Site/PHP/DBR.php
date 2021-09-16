<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stemmetellerdb";

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //Angi UTF-8 som tegnsett
    $con->set_charset("utf8");

    return $con;
}

function addVote($parti)
{
    $con = connect();

    $sql = "UPDATE partier set stemmer = stemmer + 1 where parti = '$parti'";

    if (mysqli_query($con, $sql)) {
        echo "Stemmen er telt!";
    } else {
        echo "Det oppsto en feil: " . mysqli_error($con);
    }
    $con->close();
}

function retrieve($subjekt)
{
    $verdier = array();
    $con = connect();

    $sql = "SELECT $subjekt FROM partier";
    $resultat = $con->query($sql);

    $con->close();

    while($rad = $resultat->fetch_assoc()) {
        //lager variabler med resultatet fra spørringen
        $verdi = $rad[$subjekt];

        array_push($verdier, $verdi);
    }
    
    return $verdier;
}
?>