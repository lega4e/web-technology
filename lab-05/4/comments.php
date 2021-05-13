<?php

require_once('connection.php');

$note_id = $_GET['note_id'];

$note = $mysql->query('select title, article from notes where id = ' . $note_id);
$note = mysqli_fetch_array($note);

echo '<h3> ' . $note['title']   . ' </h3>';
echo '<p> '  . $note['article'] . ' </p>';
echo '<a href="editnote?note_id=' . $note_id . '"> Изменить запись </a> <br>';
echo "<a href='delnote?note_id=$note_id'> Удалить запись </a>";

$comments = $mysql->query('select * from comments where art_id = ' . $note_id);

$was = False;
while($com = mysqli_fetch_array($comments))
{
	$was = True;
	echo '<h4> '  . $com['author']  . ' от ' . $com['created'] . ' </h4>';
	echo '<p> > ' . $com['comment'] . ' </p>';
}

if(!$was)
{
	echo '<p> Отсутствуют </p>';
}

?>
