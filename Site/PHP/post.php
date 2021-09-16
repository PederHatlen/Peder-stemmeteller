<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post</title>

        <link rel="stylesheet" href="/CSS/post.css">

        <meta http-equiv="refresh" content="1; URL=/index.php"/>
    </head>
    <body>
        <?php
        include 'DBR.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $parti = $_POST['partivalg'];
            if (empty($parti)) {
                addVote("Blankt");
            } else {
                addVote($parti);
            }
        }
        ?>
    </body>
</html>