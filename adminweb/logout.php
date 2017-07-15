<?php
error_reporting(0);
session_start();
include "../../oaseast.com/config/connection.php";

session_destroy();

header("Location: index.php");
?>