<?php
$messagesError = [
    "Error: Une entrée est vide !",
    "Error: Le nom saisi doit être compris entre 3 et 20 caractères !",
    "Error: Le prénom saisi doit être compris entre 3 et 20 caractères !",
    "Error: Le mail d'entrée doit être compris entre 6 et 100 caractères !",
    "Error: Votre message doit faire entre 10 et 300 caractères !",
    "Error: L'identifiant ou le mot de passe est incorrect",
];

if(isset($_GET['error'])) {
    $feedback = (int)$_GET['error'];
    if(in_array($feedback, array_keys($messagesError))) {
        $backgroundClass = strpos($messagesError[$feedback], 'Error: ') === 0 ? 'feedback-error' : 'feedback-success'; ?>
        <div class="feedback-message <?= $backgroundClass ?>"><?= $messagesError[$feedback] ?></div> <?php
    }
}
?>