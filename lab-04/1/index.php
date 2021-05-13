<!doctype html>
<html lang=ru>
<head>
	<meta charset="utf-8">
	<style>
		a { color: blue; text-decoration: none }
		.sep { border: 1px solid #BABABA; margin-top: 10px; margin-bottom: 10px; }
		.hello { font-style: italic; }
	</style>
</head>

<body>
	<nav>
		<a href="./blog.html"> Войти </a> | 
		<a href="./blog.html"> Новая запись </a> | 
		<a href="./blog.html"> Отправить сообщение </a> | 
		<a href="./blog.html"> Фото </a> | 
		<a href="./blog.html"> Файлы </a> | 
		<a href="./blog.html"> Администратору </a> | 
		<a href="./inform.html"> Информация </a> | 
		<a href="./blog.html"> Выйти </a>
	</nav>

	<div class=sep></div>

<?php

require_once('connection.php');

$notes = $mysql->query('select id, created, title, article from notes');

if($notes)
{
	echo '<br> success get notes';
}

echo '<h3> Notes: </h3>';
while($note = mysqli_fetch_array($notes))
{
	echo '<p>';
	echo $note['id']      . "<br>\n";
	echo $note['created'] . "<br>\n";
	echo $note['title']   . "<br>\n";
	echo $note['article'] . "<br>\n";
	echo '</p>';
}

?>

</body>
</html>
