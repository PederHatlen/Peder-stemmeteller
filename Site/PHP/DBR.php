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
    return $con;
}

function addVote($var)
{
    $con = connect();

    $sql = "UPDATE partier set stemmer = stemmer + 1 where parti = '$var'";

    if (mysqli_query($con, $sql)) {
        echo "Stemmen er telt!";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
    $con->close();
}

function retrieve()
{
    $con = connect();

    //Angi UTF-8 som tegnsett
    $con->set_charset("utf8");
    $sql = "SELECT * FROM partier";
    $resultat = $con->query($sql);
    
    //Skriver ut innholdet i tabellen
    while($rad = $resultat->fetch_assoc()) {

        //lager variabler medresultatet fra spørringen
        $parti = $rad["parti"];
        $stemmer = $rad["stemmer"];

        
        //Skriver ut innholdet i variablene
        echo "<option value=\"$parti\">$parti</option>";
    }
}
?>