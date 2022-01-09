<?php
session_start();

if (empty($_GET['x']) or empty($_SESSION['username'])) {
    echo "<script>window.location='sign-in';</script>";
} elseif ($_GET['x'] == 'template') {
    echo "<script>window.location='view/';</script>";
} else {
    echo '<script>alert("Website sedang bermasalah, mohon kontak admin");</script>';
}