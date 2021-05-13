<?php

$mysql = new mysqli('localhost', 'debian-sys-maint', 'q1U7whK9tj9W8xwK', 'anime');

if ($mysql->connect_error)
{
    die('Connect Error (' . $mysql->connect_errno . ') ' . $mysql->connect_error);
}

$link = $mysql->query('create database mysitebd');

if($link) {
	echo 'База данных успешно создана!';
}
else {
	echo 'А фиг там — базу данных создать не получилось';
}

?>
