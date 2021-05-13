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

$query = $mysql->query("create table comments (
	id      int          not null auto_increment,
	created date         not null,
	author  varchar(20)  not null,
	comment varchar(256) not null,
	art_id  int          not null,
	primary key          (id)
)");

if($query)
{
	echo 'Table comments created';
}
else
{
	echo 'Table comments don\'t created';
}
	
?>
