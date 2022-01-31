<?php
session_start();

$_SESSION['username'] = 'Damien';
$_SESSION['password'] = 'azerty001';

if ($_POST['username'] !== $_SESSION['username'] || $_POST['password'] !== $_SESSION['password']) {
    header('Location: /public/index.php?error=5');
}

if (isset($_GET['error'])) {
    echo "<p>Le nom d'utilisateur ou le mot de passe est incorrect !</p>";
}
?>

    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/style.css">
        <title>Space Administration</title>
    </head>
    <body>
    <h1>Space administation</h1>
    <p id="name"><?= 'Bienvenue ' . $_SESSION['username'] ?></p>
    </body>
    </html>

<?php
$content = file_get_contents('../data/last_message.json');
if ($content !== false) {
    echo "Last message : ";
    print_r($content);
}