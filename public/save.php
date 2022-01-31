<?php

require __DIR__ . '/../lib/functions.php';

$name = getSecuredStringPostData($_POST['name']);
$firstname = getSecuredStringPostData($_POST['vorname']);
$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
$message = getSecuredStringPostData($_POST['message']);

validateRange(3, 20, 'name', '/public/index.php?page=contact&error=1');
validateRange(3, 20, 'vorname', '/public/index.php?page=contact&error=2');
validateRange(6, 100, 'email', '/public/index.php?page=contact&error=3');
validateRange(10, 300, 'message', '/public/index.php?page=contact&error=4');


$to = "damien.olivier.do@gmail.com";
$from = trim($_POST["email"]);
$subject = 'Sujet';
$message = htmlentities(trim($_POST["message"]));
$headers = array(
    "Reply-To" => $from,
    "X-Mailer" => "PHP/".phpversion()
);


if (isset($_POST["email"], $_POST["message"])){
    mail($to, $subject, $message, $headers, "-f ".$from);
}

header('Location: message.php');

$arrayMessage = array($message);

$jsonEncode = json_encode($arrayMessage);
file_put_contents("../data/last_message.json", $jsonEncode);


