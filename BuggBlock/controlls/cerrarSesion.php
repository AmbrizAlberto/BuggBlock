<?php
namespace controlls;
require_once('../autoload.php');
session_start();
session_destroy();
header("location:../views/index.php");
?>