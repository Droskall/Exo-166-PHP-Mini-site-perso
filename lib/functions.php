<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

function getContent() {
    if(!isset($_GET['page'])){
        include __DIR__.'/../pages/home.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "bio") {
        include __DIR__.'/../pages/bio.php';
    }
    elseif(isset($_GET['page']) && $_GET['page'] == "contact") {
        include __DIR__.'/../pages/contact.php';
    }
}

function getPart($name) {
    include __DIR__ . '/../parts/'. $name . '.php';
}

function getUserData() {
    if(isset($_GET['page']) && $_GET['page'] == "bio") {
        if(file_exists(__DIR__.'/../data/user.json')) {
            $user = file_get_contents(__DIR__.'/../data/user.json');
            $user= json_decode($user);
            foreach ($user as $item => $value) {
                if(is_array($value)) {
                    echo "<p class='item'>$item: </p><br>";
                    foreach ($value as $array) {
                        foreach ($array as $subItem => $subValue) {
                            echo "<p class='subItem'>$subItem: <span>$subValue</span></p>";
                        }
                    }
                }
                else {
                    echo "<p class='item'>$item: <span>$value</span></p>";
                }
            }
        }
    }
}
