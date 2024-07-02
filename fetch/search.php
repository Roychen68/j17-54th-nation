<?php
include "../db.php";
$mail = $_POST['mail'];
$name = $_POST['name'];

$check = $pdo->query("SELECT count(*) FROM `feedback` WHERE  `name` = '$name' AND `mail`= '$mail'")->fetchColumn();
if ($check) {
    $search = $pdo->query("SELECT * FROM `feedback` WHERE  `name`='$name' AND `mail`='$mail'")->fetchAll();
    foreach ($search as $bus) {
        echo "你的接駁車車牌為".$bus['bus'];
    }
} else {
    echo "你並不再參與當中";
};
?>