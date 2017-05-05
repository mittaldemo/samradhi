<?php
session_start();
session_unset($_SESSSION["userid"]);
header("location:login.php");

?>