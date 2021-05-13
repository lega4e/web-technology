<html lang=ru>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<nav>
		<a href="/index">   Главная      </a> |
		<a href="/newnote"> Новая запись </a> |
		<a href="/inform">  Информация   </a> |
		<input id=search type=text name='query' style='font-size: 8.5pt; width: 170px;'>
		<input type=button value='Поиск'
			onclick='window.open(`/search?query=${getElementById("search").value}`, "_self");'
		>
	</nav>

	<div class=sep></div>

<?php

switch(explode('?', $_SERVER['REQUEST_URI'])[0])
{
case '/': case '/index':
	require 'notes.php';
	break;

case '/comments':
	require 'comments.php';
	break;

case '/newnote':
	require 'newnote.php';
	break;

case '/editnote':
	require 'editnote.php';
	break;

case '/delnote':
	require 'delnote.php';
	break;

case '/inform':
	require 'inform.php';
	break;

case '/search':
	require 'search.php';
	break;

default:
	echo 'Unknown url';
	break;
}

?>

</body>
</html>
