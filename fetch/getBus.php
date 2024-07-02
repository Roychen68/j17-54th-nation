<?php
include "../db.php";
$id = $_POST['Hoverid'];
$buses = "SELECT * FROM `bus`";
$stations = "SELECT sum(`drive` + `stop`) FROM `station` WHERE `id` < $id";
$Bus = $pdo->query($buses);
$time = $pdo->query($stations)->fetchColumn();
while ($bus = $Bus->fetch()) {
    $arrive = $time-$bus['time'];
    if ($arrive<0) {
        echo '<span style="color: grey;"> 已過站</span>';
    } else {
        echo '<span style="color: red;">'.$bus['plate'].':'.$arrive.'分鐘後到站</span>';
    }
   
}
?>