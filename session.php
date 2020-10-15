<?php
ob_start();
session_start();

if (isset($_SESSION['semailadmin'])) {
} else {
    header('Location:index.php');
}
