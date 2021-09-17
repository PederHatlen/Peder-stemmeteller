<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post</title>

        <link rel="stylesheet" href="/CSS/post.css">

        <!-- Går tilbake til index etter 1. sekund -->
        <meta http-equiv="refresh" content="1; URL=/index.php"/>
    </head>
    <body>
        <?php
        include 'DBR.php';

        // Hente data fra post dataen og legge til stemmen, hvis det var post data.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $parti = $_POST['partivalg'];
            addVote($parti);
        }
        ?>
    </body>
</html>