<?php
	
function main($mysql)
{
	$note_id = $_GET['note_id'];

	if(!$note_id or empty($note_id))
	{
		echo 'ID записи не указан';
		return;
	}

	$title = mysqli_fetch_array($mysql->query("select title from notes where id = $note_id"))['title'];
	if(empty($title))
	{
		echo 'Запись с таким ID не найдена';
		return;
	}

	$mysql->query("delete from comments where art_id = $note_id");
	$mysql->query("delete from notes where id = $note_id");

	echo 'Запись и комментарии к ней успешно удалены';
	return;
}


require_once 'connection.php';

main($mysql);


?>

