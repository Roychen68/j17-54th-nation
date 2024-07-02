<?php
include "db.php";

$mail = $_POST['mail'];
$name = $_POST['name'];

$sql = "INSERT INTO `form` (`mail`, `name`) VALUES ('$mail','$name')";

$pdo->query($sql);
?>