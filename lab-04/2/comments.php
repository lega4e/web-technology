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
		<a href="./index"> Войти </a> | 
		<a href="./index"> Новая запись </a> | 
		<a href="./index"> Отправить сообщение </a> | 
		<a href="./index"> Фото </a> | 
		<a href="./index"> Файлы </a> | 
		<a href="./index"> Администратору </a> | 
		<a href="./inform.html"> Информация </a> | 
		<a href="./index"> Выйти </a>
	</nav>

	<div class=sep></div>

<?php

require_once('connection.php');

$note_id = $_GET['note_id'];

if(empty($note_id))
{
	echo '<h3> All comments: </h3>';
	$comments = $mysql->query('select * from comments');
}
else
{
	echo '<h3> Comments for note ' . $note_id . ' </h3>';
	$comments = $mysql->query('select * from comments where art_id = ' . $note_id);
}

if(!$comments)
{
	echo 'No comments <br>';
}

$was = False;
while($com = mysqli_fetch_array($comments))
{
	$was = True;
	echo '<p>';
	echo 'id:      ' . $com['id']      . "<br>\n";
	echo 'created: ' . $com['created'] . "<br>\n";
	echo 'author:  ' . $com['author']  . "<br>\n";
	echo 'comment: ' . $com['comment'] . "<br>\n";
	echo 'art_id:  ' . $com['art_id']  . "<br>\n";
	echo '</p>';
}

if(!$was)
{
	echo '<p> Записи отсутствуют </p>';
}

?>

</body>
</html>
