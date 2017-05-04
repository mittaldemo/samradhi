<?php
include('../model/functions.php');

header("location:index.php");
session_unset($_SESSION['id']);
?>