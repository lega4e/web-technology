<?php

$mysql = new mysqli('localhost', 'debian-sys-maint', 'q1U7whK9tj9W8xwK');

if ($mysql->connect_error)
{
    die('Connect Error (' . $mysql->connect_errno . ') ' . $mysql->connect_error);
}

$link1 = $mysql->query("create user 'admin'@'localhost' identified by 'admin'");
$link2 = $mysql->query("grant all privileges on *.* to 'admin'@'localhost' with grant option;");

if($link1 and $link2)
{
	echo 'Пользователь admin успешно создан';
}
else
{
	echo 'Не получилось создать пользователя admin';
}

?>
