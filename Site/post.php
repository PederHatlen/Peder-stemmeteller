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
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $parti_id = $_POST['parti_id'];
            if (empty($parti_id)) {
                echo "Ingen parti er valgt";
            } else {
                addVote($parti_id);
                echo "Du stemte ", $parti_id;
            }
        }
        ?>
    </body>
</html>