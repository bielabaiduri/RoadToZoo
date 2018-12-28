<?php
session_name('r2z');
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

error_reporting(E_ALL ^ E_NOTICE);
define('DOC_ROOT', realpath(dirname(__FILE__) . '/'));
define('BASE_URL', 'http://localhost/r2z/');

require 'layout.php';
require_once("includes/dbconnect.php");




