<?php
include "db.php";
$id = $_POST['id'];
$sql = "DELETE FROM `form` WHERE `id` = '$id'";
$result = $pdo->query($sql);
if ($result) {
    echo "資料刪除成功";
} else {
    echo "出了一點狀況 請再試一次";
}

?>