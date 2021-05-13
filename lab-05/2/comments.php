<?php

require_once('connection.php');

$note_id = $_GET['note_id'];

if(empty($note_id))
{
	echo '<h3> Все комментарии: </h3>';
	$comments = $mysql->query('select * from comments');
}
else
{
	echo '<h3> Комменатии к записи ' . $note_id . ' </h3>';
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
