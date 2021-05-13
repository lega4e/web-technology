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

$query = $mysql->query("alter table comments add foreign key (art_id) references notes(id)");

if($query)
{
	echo 'Foreign key has been added';
}
else
{
	echo 'Foreign key has\'t been added';
}
	
?>
