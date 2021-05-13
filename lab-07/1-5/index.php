<html lang=ru>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<nav>
		<a href="/index">   Главная             </a> |
		<a href="/index">   Войти               </a> |
		<a href="/newnote"> Новая запись        </a> |
		<a href="/index">   Отправить сообщение </a> |
		<a href="/index">   Фото                </a> |
		<a href="/index">   Файлы               </a> |
		<a href="/index">   Администратору      </a> |
		<a href="/inform">  Информация          </a> |
		<a href="/index">   Выйти               </a>
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

default:
	echo 'Unknown url';
	break;
}

?>

</body>
</html>
