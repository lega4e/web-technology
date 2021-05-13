<?php
	
function listdir($dir)
{
	$files = scandir($dir);
	$result = [];
	foreach($files as $file)
	{
		if($file != '.' and $file != '..')
			$result[] = $file;
	}
	return $result;
}

function remove_file($dir)
{
	$filename = $_POST['remove_file'];
	if(unlink($dir . '/' . $filename))
		echo '<p> Файл успешно удалён </p>';
	else
		echo '<p class=error> Файл удалить не получилось </p>';
	return;
}

function load_file($dir, $filetype)
{
	if($_FILES['file']['size'] == 0)
	{
		echo '<p class=error> Слишком большой файл </p>';
		return;
	}

	if(!empty($filetype) and substr($_FILES['file']['type'], 0, 5) != $filetype)
	{
		echo '<p class=error> Недопустимый формат файла; загружать можно только изображения </p>';
		return;
	}

	$source_name = $_FILES['file']['tmp_name'];
	$target_name = basename($_FILES['file']['name']);

	if(move_uploaded_file($source_name, $dir . '/' . $target_name))
		echo '<p> Файл успешно загружен </p>';
	else
		echo '<p> Файл загрузить не удалось </p>';
	return;
}

?>
