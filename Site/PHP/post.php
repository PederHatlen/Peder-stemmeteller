<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="/CSS/style.css">
    </head>
    <body>
        <?php
        include 'DBrepo.php';

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