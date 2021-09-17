<!-- 
    DataBase Repo
    Her er alle php in - out funksjonene.
-->

<?php
// Funksjon som løager en tilkobling til serveren, brukes egentlig bare i de andre funksjonene
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

//Legge til en stemme på det partiet i input variabelen.
function addVote($parti)
{
    $con = connect();

    //sql koden
    $sql = "UPDATE partier set stemmer = stemmer + 1 where parti = '$parti'";
    
    //gjøre selve opperasjonen + sjekke om det virket.
    if (mysqli_query($con, $sql)) {echo "Stemmen er telt!";}
    else {echo "Det oppsto en feil: " . mysqli_error($con);}

    $con->close();
}

function retrieve($subjekt)
{
    //verdi array som blir returnert
    $verdier = array();
    $con = connect();

    $sql = "SELECT $subjekt FROM partier";
    //Gjennomfør spørringen
    $resultat = $con->query($sql);

    $con->close();

    //Går gjennom alle variablene og legger det til i verdier arrayen.
    while($rad = $resultat->fetch_assoc()) {
        $verdi = $rad[$subjekt];
        array_push($verdier, $verdi);
    }
    
    return $verdier;
}
?>