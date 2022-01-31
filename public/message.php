<?php
$jsonMessage = file_get_contents("../data/last_message.json");
$message = json_decode($jsonMessage);
foreach ($message as $valueMessage) {
    echo "Le message : '".$valueMessage."', , a ete envoyer ! <br>";
}
?>

<a href="index.php">Home !</a>
