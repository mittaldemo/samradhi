<?php
session_start();
session_unset($_SESSSION["myname"]);
header("location:login.php");

?>