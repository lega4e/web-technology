<!doctype html>
<html lang=ru>
<head>
	<meta charset="utf-8">
	<style>
		a      { color: blue; text-decoration: none }
		.sep   { border: 1px solid #BABABA; margin-top: 10px; margin-bottom: 10px; }
		.hello { font-style: italic; }
		.note  { font-weight: bold; font-size: 14pt; color: black; text-decoration: underline; }
	</style>
</head>

<body>
	<nav>
		<a href="/index"> Войти </a> | 
		<a href="/index"> Новая запись </a> | 
		<a href="/index"> Отправить сообщение </a> | 
		<a href="/index"> Фото </a> | 
		<a href="/index"> Файлы </a> | 
		<a href="/index"> Администратору </a> | 
		<a href="/inform.html"> Информация </a> | 
		<a href="/index"> Выйти </a>
	</nav>

	<div class=sep></div>

<?php

require_once('connection.php');

$notes = $mysql->query('select id, created, title, article from notes');

echo '<h3> Notes: </h3>';
while($note = mysqli_fetch_array($notes))
{
	echo '<p>';
	echo '<a class=note href="comments?note_id=' . $note['id'] . '"> Note ' . $note['id'] . '</a> <br>';
	echo $note['created'] . "<br>\n";
	echo $note['title']   . "<br>\n";
	echo $note['article'] . "<br>\n";
	echo '</p>';
}

?>

</body>
</html>
