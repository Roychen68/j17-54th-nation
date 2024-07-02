<?php
include "../api/db.php";
$sql = "SELECT * FROM `bus`";

$result = $pdo->query($sql)->fetchAll();
echo json_encode($result,JSON_UNESCAPED_UNICODE)
?>