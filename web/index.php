<?php declare(strict_types=1);

session_start();

if (!isset($_SESSION['user_name'])) {
    include './authorization.html';
} else {
    echo "Здравствуйте, {$_SESSION['user_name']}!"
        . '</br>'
        . '<a href="./exit.php">Выйти</a>';
}
