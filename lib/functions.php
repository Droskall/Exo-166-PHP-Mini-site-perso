<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

/**
 *  Function path to pages
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

/**
 * @param $name
 * Function path to shares
 */
function getPart($name) {
    include __DIR__ . '/../parts/'. $name . '.php';
}

/**
 * Function convert json data to php arrays and display them
 */
function getUserData() {

    if (file_exists('../data/user.json')) {
        $datas = file_get_contents('../data/user.json');
        $arrayDatas = json_decode($datas);
        foreach ($arrayDatas as $keys => $values) {
            if (is_array($values)) {
                foreach ($values as $value) {
                    foreach ($value as $key => $val) {
                        echo $key . ' : ' . $val . '<br>';
                    }
                }
            }
            else {
                echo $keys . ' : ' . $values . '<br>';
            }
        }
    }
}

/**
 * @param string $name
 * @return string
 * Function secured string data
 */
function getSecuredStringPostData(string $name): string {
    $data = $_POST[$name] ?? '';
    return strip_tags(trim($data));
}

/**
 * @param string ...$inputNames
 * @return bool
 */
function issetMandatoryPostValue(string ...$inputNames): bool {
    foreach ($inputNames as $inputName) {
        if (!isset($_POST[$inputName])) {
            return false;
        }
    }
    return true;
}

/**
 * @param int $min
 * @param int $max
 * @param string $inputName
 * @param string $redirectURL
 */
function validateRange(int $min, int $max, string $inputName, string $redirectURL): void {
    $len = strlen(trim($_POST[$inputName]));
    if ($len < $min || $len > $max) {
        header('Location: ' . $redirectURL);
        exit();
    }
}