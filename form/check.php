<?php
include "../db.php";

$name = $_POST['name'];
$mail = $_POST['mail'];

// Query to check feedback
$feedbackQuery = "SELECT count(*) FROM `feedback` WHERE `name` = '$name' AND `mail` = '$mail'";
$feedback = $pdo->query($feedbackQuery)->fetchColumn();

// Query to check form
$formQuery = "SELECT count(*) FROM `form` WHERE `name` = '$name' AND `mail` = '$mail'";
$form = $pdo->query($formQuery)->fetchColumn();

if ($feedback > 0) {
    echo "您已經參與過意見調查";
} else{
    if ($form > 0) {
    echo "感謝參與";
    $pdo->exec("INSERT INTO `feedback`(`name`, `mail`) VALUES ('$name','$mail')");
    } else if (!$form > 0) {
    echo "您不在參與者名單中";
    }
}
?>
