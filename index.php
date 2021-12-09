<?php
if (empty($_GET['x'])) {
    echo "<script>window.location='login.php';</script>";
} elseif (isset($_GET['x'])) {
    $link = array("login","home","profile");

    foreach ($link as $value) {
        if ($value == $_GET['x']) {
            require "$value" . ".php";
        }
    }
} else {
    require "home.php";
}