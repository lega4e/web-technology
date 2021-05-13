<?php

require_once('connection.php');

$notes = $mysql->query('select id, created, title, article from notes order by created desc');

echo '<h3> Все записи: </h3>';
while($note = mysqli_fetch_array($notes))
{
	echo '<p>';
	echo '<a class=note href="comments?note_id=' . $note['id'] . '"> Note ' . $note['id'] . '</a> <br>';
	echo 'Создана: ' . $note['created'] . "<br>\n";
	echo 'Тема:    ' . $note['title']   . "<br>\n";
	echo $note['article'] . "<br>\n";
	echo '</p>';
}

?>
