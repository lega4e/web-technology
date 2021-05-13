<?php
	
function warning($mysql)
{
	$note_id = $_GET['note_id'];

?>
Вы действительно хотите удалить заметку?
<a href='/delnote?note_id=<?php echo $note_id; ?>&proof=1'>Да</a>
<a href='/comments?note_id=<?php echo $note_id; ?>'>Нет</a>
<?php

	return;
}

function remove($mysql)
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

function main($mysql)
{
	if(isset($_GET['proof']))
		return remove($mysql);
	else
		return warning($mysql);
}

require_once 'connection.php';

main($mysql);


?>

