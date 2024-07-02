<?php
include "db.php";

$station = $_POST['station'];
$drive = $_POST['drive'];
$stop = $_POST['stop'];
$id = $_POST['id'];

$sql = "UPDATE `station` SET `station`='$station',`stop`='$stop',`drive`='$drive' WHERE `id`='$id'";

$check = $pdo->exec($sql);

if ($check) {
    echo "資料上傳成功";
} else {
    echo "啊 抱歉出啦一點小狀況";
}

?>