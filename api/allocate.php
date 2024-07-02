<?php
session_start();
include "../db.php";

$num = $_POST['num'];

$users = $pdo->query("SELECT count(*) FROM `feedback`")->fetchColumn();
$needBus = ceil($users / $num);

$Busplate = [];
for ($i = 0; $i < $needBus; $i++) {
    $start = $i * $num;

    do {
        $plate = "AUTO-" . sprintf("%04d", rand(1, 9999));
    } while (in_array($plate, $Busplate));

    $Busplate[] = $plate;

    $sql = "SELECT * FROM `feedback` LIMIT $start, $num";
    $members = $pdo->query($sql)->fetchAll();

    foreach ($members as $member) {
        $sql = "UPDATE `feedback` SET `bus` = '$plate' WHERE `id` = '{$member['id']}'";
        $pdo->exec($sql);
    }
}

$_SESSION['switch'] = false;
?>