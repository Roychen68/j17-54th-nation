<?php
session_start();


if ($_SESSION['form'] == false) {
    echo "true";
    $_SESSION['form'] = true ;
} else {
    $_SESSION['form'] = false ;
    echo "false";
}

?>