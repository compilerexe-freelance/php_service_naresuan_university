<?php
    if (empty($_SESSION["login"]) || $_SESSION["login"] != "success") {
        echo "<script type='text/javascript'>window.location='login.php';</script>";
    }
?>