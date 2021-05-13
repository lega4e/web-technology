<?php

switch(explode('?', $_SERVER['REQUEST_URI'])[0])
{
case '/comments':
	require 'comments.php';
	break;

case '/': case '/index':
	require 'notes.php';
	break;

default:
	echo 'Unknown url';
	break;

}

?>
