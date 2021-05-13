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

echo 'Подключение прошло успешно'

/*
 * В Linux нет необходимости настраивать кодировку,
 * т.к. по умолчанию стоит utf-8, которая преспокойно
 * поддерживает кириллицу
 */

?>
