<?php
session_start();
date_default_timezone_set("Asia/Kolkata");


define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","My_Test");

$db= new MySQLi(DB_HOST,DB_USER,DB_PASS,DB_NAME);