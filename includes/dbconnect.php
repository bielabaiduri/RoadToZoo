<?php

/*Define constant to connect to database */
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', '');
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_NAME', 'r2z');
date_default_timezone_set('UTC');

// Connection
$dbc = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>
