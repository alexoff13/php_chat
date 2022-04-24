<?php

function is_authorized(): bool
{
    $users = json_decode(file_get_contents('data/users.json'));
    if (isset($_GET['login']) && isset($_GET['password'])) {
        foreach ($users as $login => $password) {
            echo $login;
            echo $password;
            if ($_GET['login'] === $login and $_GET['password'] == $password) {
                return true;
            }
        }
    }
    return false;
}

if (is_authorized()) {
    header('Location: chat.php?auth=true&login=' . $_GET['login']);
} else {
    header('Location: index.php?auth=false');
}
