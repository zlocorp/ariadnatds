<?php

echo '<pre>';
var_export($_GET, true);
print_r($_REQUEST, true);
var_export($_SERVER, true);
//print_r($GLOBALS);
echo '</pre>';

if (isset($_REQUEST['q'])) {
    $urlRedirect = ltrim(htmlspecialchars($_REQUEST['q']), '\\');
    $url = getRedirectLink($pdo, $urlRedirect);
    echo $url;
    header("Location: " . $url);
}

echo PHP_EOL . 'not found';

exit;