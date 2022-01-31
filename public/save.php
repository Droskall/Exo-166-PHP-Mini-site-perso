<?php

require __DIR__ . '/../lib/functions.php';

if (!isset($_POST['submit'])) {
    header('Location: /public/index.php?page=contact&error=0');
    exit();
}

$name = getSecuredStringPostData($_POST['name']);
$firstname = getSecuredStringPostData($_POST['firstname']);
$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
$message = getSecuredStringPostData($_POST['message']);

validateRange(3, 20, 'name', '/public/index.php?page=contact&error=1');
validateRange(3, 20, 'firstname', '/public/index.php?page=contact&error=2');
validateRange(6, 100, 'mail', '/public/index.php?page=contact&error=3');
validateRange(10, 300, 'message', '/public/index.php?page=contact&error=4');

$arrayMessage = array($message);

$jsonEncode = json_encode($arrayMessage);
file_put_contents("../data/last_message.json", $jsonEncode);

$from = "From: damien.olivier.do@gmail.com";
$to = $mail;
$mess = $message;
$sujet = 'Subject';
$message1 = wordwrap($mess, 70, "\r\n");
$headers = array(
    "Reply-To" => $from,
    "X-Mailer" => "PHP/".phpversion()
);

if (isset($_POST['submit'])) {
    if ($mail($to, $sujet, $mess, $from)) {
        echo "c'est bon!";
    }
    else {
        echo "Error !";
    }
}

if (isset($_POST["email"], $_POST["message"])){
    mail($to, $sujet, $mess, $headers, "-f ".$from);
}

header('Location: admin.php');


