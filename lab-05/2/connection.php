<?php

$host = 'localhost';
$db   = 'mysitedb';
$user = 'admin';
$pswd = 'admin';

$mysql = new mysqli($host, $user, $pswd);

if ($mysql->connect_error)
{
    die('Connect Error (' . $mysql->connect_errno . ') ' . $mysql->connect_error);
}

if(!$mysql->query('use mysitebd'))
{
	die('Use error');
}


?>
