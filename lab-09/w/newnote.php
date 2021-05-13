<?php


$ispost  = False;
$sucpost = False;

if(isset($_POST['submit']))
{
	$ispost = True;

	if(
		isset($_POST['title'])   and !empty($_POST['title'])   and
		isset($_POST['article']) and !empty($_POST['article']) and
		isset($_POST['created']) and !empty($_POST['created'])
	)
	{
		$sucpost = True;

		$title   = $_POST['title'];
		$article = $_POST['article'];
		$created = $_POST['created'];

		require_once 'connection.php';
		$mysql->query(
			'insert into notes (title, article, created) values ("' .
			$title . '", "' .  $article . '", "' .  $created . '")'
		);
	}
}

if(!$ispost or !$sucpost)
{
?>

<form method=post>
	<p> Тема сообщения: <input type="text" name="title" maxlength=20> </p>	
	<p>
		Сообщение: <br>
		<textarea type="text" name="article" maxlength=255 rows=6 cols=50></textarea>
	</p>	
	<input type="text" name='created' value="<?php echo date("Y.m.d"); ?>" hidden>
	<input type="submit" value="Создать запись" name='submit'>
</form>

<?php
}

if($ispost and !$sucpost)
{
	?> <p class='error'> Заполните поля формы </p> <?php
}

if($sucpost)
{
	echo 'Запись успешно отправлена!';
}

?>
