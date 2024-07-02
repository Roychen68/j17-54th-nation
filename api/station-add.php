<?php
include "db.php";
$get = "SELECT MAX(`rank`) FROM `station`";
$rank = $pdo->query($get)->fetchColumn();

$station = $_POST['station'];
$drive = $_POST['drive'];
$stop = $_POST['stop'];
$postRank = $rank+1;

$sql = "INSERT INTO `station`(`station`, `stop`, `drive` , `rank`) VALUES ('$station','$stop','$drive','$postRank')";

$pdo->query($sql);
?>