<?php
	
require_once('connection.php');

function main($mysql)
{
	$query = $_GET['query'];

	if(empty($query))
	{
		echo 'Запрос пуст';
		return;
	}

	$query = explode(' ', $query);
	$likes = [];
	foreach($query as $word)
		$likes[] = "title like '%$word%' or article like '%$word%'";

	$notes = $mysql->query(
		"select id, title, article from notes where " .
		implode(' or ', $likes) .  " order by created desc"
	);

	$was = false;
	while($note = mysqli_fetch_array($notes))
	{
		$was          = true;
		$note_id      = $note['id'];
		$note_title   = $note['title'];
		$note_article = $note['article'];
		echo "<h3> $note_title </h3>";
		echo "<p> $note_article </p>";
		echo "<p> <a href='/comments?note_id=$note_id'> Ссылка </a> </p> <br>";
	}

	if(!$was)
		echo 'Ничего не найдено';

	return;
}

main($mysql);

?>
