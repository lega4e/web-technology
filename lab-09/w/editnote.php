<?php


function main($mysql)
{
	$note_id = $_GET['note_id'];

	if(!$note_id or empty($note_id))
	{
		echo 'ID записи не указан';
		return;
	}
	
	$note = $mysql->query('select title, article from notes where id = ' . $note_id);
	$note = mysqli_fetch_array($note);

	if(!$note)
	{
		echo 'Запись с указанным ID не найдена';
		return;
	}

?>
<form method=post>
	<p> Тема сообщения: <input type="text" name="title" maxlength=20 value="<?php echo $note['title']; ?>"> </p>	
	<p>
		Сообщение: <br>
		<textarea type="text" name="article" maxlength=255 rows=6 cols=50><?php echo $note['article']; ?></textarea>
	</p>	
	<input type="submit" value="Изменить запись" name='submit'>
</form>
<?php
}

function post($mysql)
{
	$title   = $_POST['title'];
	$article = $_POST['article'];
	$note_id = $_GET['note_id'];

	if(!empty($title) and !empty($article))
	{
		$mysql->query(
			'update notes set title = "' . $title .
			'", article = "' . $article .
			'" where id = ' . $note_id
		);

		echo 'Запись успешно изменена';
	}
	else
	{
		main($mysql);
		echo '<p class=error> Заполните все поля формы </p>';
	}
}

require_once 'connection.php';

if(isset($_POST['submit']))
	post($mysql);
else
	main($mysql);


?> 
