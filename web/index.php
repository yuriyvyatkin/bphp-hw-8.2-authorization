<?php declare(strict_types=1);

session_start();

if (!isset($_SESSION['user_name'])) {
    include './authorization.html';
} else {
    echo "Здравствуйте, {$_SESSION['user_name']}!"
        . '</br>'
        . '<a href="./exit.php">Выйти</a>';
}

$html = '<!DOCTYPE html>
  <html lang="ru-RU">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Критическая ошибка</title>
    <style type="text/css">
      html {
        background: #f1f1f1;
      }
      body {
        background: #fff;
        border: 1px solid #ccd0d4;
        color: #444;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        margin: 2em auto;
        padding: 1em 2em;
        max-width: 700px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
      }
      #error-page {
        margin-top: 50px;
      }
      #error-page p,
      #error-page .die-message {
        font-size: 14px;
        line-height: 1.5;
        margin: 25px 0 20px;
      }
    </style>
  </head>
  <body id="error-page">
    <div class="die-message"><p>Возникла критическая ошибка. Служба поддержки занимается ее устранением.</p><p><a href="index.php">Вернуться на главную</a></p></div></body>
  </html>';

    function fatalErrorShutdownHandler(string $html)
    {
      ob_clean();

      echo $html;

      $last_error = error_get_last();

      if ($last_error['type'] === E_ERROR) {

        var_dump($last_error);
      }
    }

    register_shutdown_function('fatalErrorShutdownHandler', $html);

    $article = 1;

    http_build_query($article);
