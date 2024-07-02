<?php
include "db.php";

$plate = $_POST['plate'];
$time = $_POST['time'];
$id = $_POST['id'];

$sql = "UPDATE `bus` SET `plate`='$plate',`time`='$time' WHERE `id`='$id'";

$check = $pdo->exec($sql);

if ($check) {
    echo "資料上傳成功";
} else {
    echo "啊 抱歉出啦一點小狀況";
}

?>