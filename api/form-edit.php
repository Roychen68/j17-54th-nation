<?php
include "db.php";

$mail = $_POST['mail'];
$name = $_POST['name'];
$id = $_POST['id'];

$sql = "UPDATE `form` SET `mail`='$mail',`name`='$name' WHERE `id`='$id'";

$check = $pdo->exec($sql);

if ($check) {
    echo "資料上傳成功";
} else {
    echo "啊 抱歉出啦一點小狀況";
}
?>