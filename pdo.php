<?php
/** @var PDO $pdo */
/** @var string $host */
/** @var string $db */
/** @var string $charset */
/** @var string $user */
/** @var string $pass */


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


/**
 * @param PDO $pdo
 * @return int
 */
function countRows(PDO $pdo): int
{
    return $pdo->query('SELECT COUNT(*) FROM `links`')->fetchColumn();
}


/**
 * @param PDO $pdo
 * @param string $link
 * @return mixed
 */
function findLink($pdo, $link)
{
    if (empty($link)) {
        return false;
    }

    $stm = $pdo->prepare('SELECT * FROM `links` WHERE `redirect_from` = :redirect_from');
    $stm->execute(['redirect_from' => $link]);
    $data = $stm->fetch();

    return $data;
}

/**
 * @param PDO $pdo
 * @param string $link
 * @return string
 */
function getRedirectLink($pdo, $link): string
{
    /** @var PDO $pdo */
    if (empty($link)) {
        return 'Not found ((';
    }

    $stm = $pdo->prepare('SELECT `redirect_to` FROM `links` WHERE `redirect_from` = :redirect_from');
    $stm->execute(['redirect_from' => $link]);
    $redirect = $stm->fetchColumn();

    return $redirect;
}

/**
 * @param PDO $pdo
 * @param string $link
 * @return void
 */
function updateCount($pdo, $link): string
{
    if (empty($link)) {
        return false;
    }

    $query = "UPDATE `links` SET `count` = `count`+1, `updated_at` = UNIX_TIMESTAMP() WHERE `redirect_from` = :redirect_from";
    $params = [
        ':redirect_from' => $link,
    ];
    $stm = $pdo->prepare($query);
    $stm->execute($params);
}