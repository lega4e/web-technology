<?php



function get($mysql, $note_id)
{

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
		$id = $com['id'];
		echo '<h4> '  . $com['author']  . ' от ' . $com['created'] . ' </h4>';
		echo '<p> > ' . $com['comment'] . ' </p>';
		echo "<p> <a href='/comments?note_id=$note_id&remove_com=$id'> Удалить комментарий </a> </p>";
		echo '<br>';
	}

	if(!$was)
	{
		echo '<p> Комментарии отсутствуют </p>';
		echo '<p> Напишите свой </p>';
	}

	?>
		<form method=post>
			<p> Ваше имя: <input type="text" name="author" maxlength=20> </p>	
			<p>
				<textarea type="text" name="comment" maxlength=255 rows=6 cols=50></textarea>
			</p>	
			<input type="text" name='created' value="<?php echo date("Y.m.d"); ?>" hidden>
			<input type="submit" value="Ок" name='submit'>
		</form>
	<?php
}

function post($mysql, $note_id)
{
	$author  = $_POST['author'];
	$comment = $_POST['comment'];
	$created = $_POST['created'];

	if(empty($created))
		die('created is empty (comments.php)');

	if(empty($author) or empty($comment))
	{
		echo '<p class=error> Заполните все поля формы </p>';
		return;
	}

	$mysql->query(
		"insert into comments (created, author, comment, art_id)" .
		"values ('$created', '$author', '$comment', $note_id)"
	);

	echo '<p> Комментарий успешно добавлен! </p>';
	return;
}

function remove_comment($mysql, $comment_id)
{
	$mysql->query("delete from comments where id = $comment_id");
	return;
}


function main($mysql)
{
	$note_id = $_GET['note_id'];
	$remove_com = $_GET['remove_com'];

	if(empty($note_id))
	{
		echo "Запись с id = $note_id не найдена";
		return;
	}

	if(isset($_POST['submit']))
		post($mysql, $note_id);
	else if(!empty($remove_com))
		remove_comment($mysql, $remove_com);

	get($mysql, $note_id);
	return;
}



require_once('connection.php');

main($mysql);



?>
