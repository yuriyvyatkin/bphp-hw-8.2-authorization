<?php declare(strict_types=1);

function sanitizeTextInput(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$userName = sanitizeTextInput($_POST['user_name']);

if ($userName !== '') {
    session_start();

    $_SESSION['user_name'] = $userName;
}

header('Location: index.php');
