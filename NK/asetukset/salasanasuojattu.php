<?php
if ($_SESSION['authenticated'] == true) {
} else {
    header('Location: login.php');
    die();
}