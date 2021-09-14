<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stemmerdb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function addVote(Int $var)
{
    $conn = connect();

    $sql = "UPDATE stemmer set stemmer = stemmer + 1 where parti_id = " . $var;

    if (mysqli_query($conn, $sql)) {
        echo "Stemmen er telt!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>