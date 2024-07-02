<?php
include "./db.php";

$sql = "SELECT * FROM `feedback` WHERE `bus` IS NOT NULL ORDER BY `bus`, `id`";
$participants = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 按接駁車分組參與者
$buses = [];
foreach ($participants as $participant) {
    $bus = $participant['bus'];
    if (!isset($buses[$bus])) {
        $buses[$bus] = [];
    }
    $buses[$bus][] = [
        'id' => $participant['id'],
        'name' => $participant['name'],
        'email' => $participant['mail'], // 根據你的字段名稱
    ];
}

// 構建最終的 JSON 結構
$result = [];
foreach ($buses as $bus => $participants) {
    $result[] = [
        'bus' => $bus,
        'participants' => $participants
    ];
}

// 設置 header 為 JSON 格式
header('Content-Type: application/json');

// 輸出 JSON 結果
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
