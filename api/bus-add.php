<?php
include "db.php";

$plate = $_POST['plate'];
$time = $_POST['time'];

$sql = "INSERT INTO `station`(`plate`, `time`) VALUES ('$plate','$time')";

$pdo->query($sql);
?>