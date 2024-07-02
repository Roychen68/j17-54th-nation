<?php
include_once "../db.php";

$stations = $pdo->query("SELECT * FROM `station` ORDER BY `rank`")->fetchAll();

foreach ($stations as $key => $station) {
    $prev = $pdo->query("SELECT SUM(`drive` + `stop`) FROM `station` WHERE `rank` < {$station['rank']}")->fetchColumn();
    $arrive = $prev + $station['drive'];
    $leave = $arrive + $station['stop'];
    $bus = $pdo->query("SELECT * FROM `bus` WHERE `time` <= $leave ORDER BY `time` DESC")->fetch();

    if (!empty($bus)) {
        $station['closest'] = $bus['plate'];
        if ($bus['time'] < $arrive) {
            $station['bus'] = $bus['plate']."<br>"."約" . ($arrive - $bus['time']) . "分鐘到站";
        } else {
            $station['bus'] = "已到站";
            $station['class'] = "text-danger";
        }
    } else {
        $station['bus'] = "<br>"."未發車";
        $station['class'] = "text-secondary";
    }
    
    $stations[$key] = $station;
}

echo json_encode($stations, JSON_UNESCAPED_UNICODE);
?>
