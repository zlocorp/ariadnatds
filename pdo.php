<?php
/** @var PDO $pdo */
/** @var string $host */
/** @var string $db */
/** @var string $charset */
/** @var string $user */
/** @var string $pass */


$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


/**
 * @param PDO $pdo
 * @return int
 */
function countRows($pdo): int
{
    return $pdo->query('SELECT COUNT(*) FROM items')->fetchColumn();
}


/**
 * @param PDO $pdo
 * @param string $name
 * @return string
 */
function findRows($pdo, $name): string
{
//    /** @var PDO $pdo */
//    $name = "%$name%";
//    if ($name === '%%') return 'Задайте условие для поиска вида ВАШ ЗАПРОС';
//
////    $stm = $pdo->prepare('SELECT * FROM `items` WHERE `name` LIKE ? UNION SELECT * FROM `items` WHERE `gos_number` LIKE ?');
//    $stm = $pdo->prepare('SELECT * FROM `items` WHERE `type` LIKE ?');
//    $stm->execute(array($name));
//    $data = $stm->fetchAll();
//    $count = count($data);
//
//    if ($count === 0) {
//        return "\u{2B55} Ничего не найдено";
//    }
//
//    $info = "\u{27A1} Найдено: {$count} совпадений\n\r\n\r";
//
//    if ($count > 7) {
//        $info .= "\u{26A0} Найдено слишком много результатов для отображения. Задайте более точное условие для поиска";
//        return $info;
//    }
//
//    foreach ($data as $item){
//        $info .= "Наименование СИ: {$item['name']}\n\r";
//        $info .= "Номер в госреестре: {$item['gos_number']}\n\r";
//        $info .= "Срок свидетельства: {$item['cert_date']}\n\r";
//        $info .= "Обозначение типа СИ: {$item['type']}\n\r";
//        $info .= "Изготовитель: {$item['manufacture']}\n\r";
//        $info .= "Подробнее: {$item['other']}\n\r";
//        $info .= "-----------------------\n\r\n\r";
//    }
//
//    return $info;
}

