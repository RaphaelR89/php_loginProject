<?php
require "functions.php";

session_unset();
session_destroy();
session_regenerate_id();


header("Location: login.php");
die;
