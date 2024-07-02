<?php
session_start();
if ($_SESSION['admin'] == true) {
    echo true;
} else {
    echo false;
}

?>