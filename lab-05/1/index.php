<html lang=ru>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<nav>
		<a href="/index">       Главная             </a> |
		<a href="/index">       Войти               </a> |
		<a href="/email">       Новая запись        </a> |
		<a href="/index">       Отправить сообщение </a> |
		<a href="/index">       Фото                </a> |
		<a href="/index">       Файлы               </a> |
		<a href="/index">       Администратору      </a> |
		<a href="/inform.html"> Информация          </a> |
		<a href="/index">       Выйти               </a>
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

case '/email':
	require 'email.php';
	break;

default:
	echo 'Unknown url';
	break;
}

?>

</body>
</html>
