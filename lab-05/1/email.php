<?php

// require_once('connection.php');
$ispost  = False;
$sucpost = False;

if(isset($_POST['submit']))
{
	$ispost = True;

	if(
		isset($_POST['title'])   and !empty($_POST['title']) and
		isset($_POST['article']) and !empty($_POST['article'])
	)
	{
		mail('random-mail@server.domain', $_POST['title'], $_POST['article']);
		$sucpost = True;
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
	<input type="submit" value="Создать запись" name='submit'>
</form>

<?php
}

if($ispost and !$sucpost)
{
	?> <p class='error'> Заполните форму </p> <?php
}

if($sucpost)
{
	echo 'Запись успешно отправлена!';
}

?>
