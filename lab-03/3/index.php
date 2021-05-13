<?php

$mysql = new mysqli('localhost', 'admin', 'admin');

if ($mysql->connect_error)
{
    die('Connect Error (' . $mysql->connect_errno . ') ' . $mysql->connect_error);
}

if(!$mysql->query('use mysitebd'))
{
	die('Use error');
}

$query = $mysql->query("create table notes (
	id int not null auto_increment,
	created date,
	title varchar(20),
	article varchar(255),
	primary key (id)
) ");

if($query)
{
	echo 'Table created';
}
else
{
	echo 'Table don\'t created';
}
	
?>

