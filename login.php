<?php
session_start();
include "./api/db.php";

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM `admin` WHERE `username` = '$name' AND `password` = '$password'";
$result = $pdo->query($sql)->fetch();
if ($result) {
    $_SESSION['admin'] = true;
    echo $_SESSION['admin'] = true;
} else {
    $_SESSION['admin'] = false;
    echo $_SESSION['admin'] = false;
}

?>