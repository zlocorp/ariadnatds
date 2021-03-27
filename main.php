<?php

//echo '<pre>';
//var_export($_GET, true);
//print_r($_REQUEST);
//print_r($_SERVER);
//print_r($GLOBALS);
//echo '</pre>';

if (isset($_SERVER['REQUEST_URI'])) {
    $urlRedirect = htmlspecialchars(trim($_SERVER['REQUEST_URI'], '/'));
//    echo $urlRedirect;
    $url = getRedirectLink($pdo, $urlRedirect);
//    echo $url;
//    header("Location: " . $url)
    if (!empty($url)) {
        updateCount($pdo, $urlRedirect);
        header("Refresh:0; url={$url}");
    }

    exit();
}

//echo PHP_EOL . 'not found';

exit();