<?php
include "../db.php";

$num = $_POST['num'];

if (empty($num)) {
    echo 0;
} else {
    $users = $pdo->query("SELECT count(*) FROM `feedback`")->fetchColumn();
    $sujust = ceil($users/$num);
    echo $sujust;
}
?>