<?php

require_once 'fileutil.php';

function main()
{
	?>

	<h3> Загрузить новый файл </h3>

	<form enctype='multipart/form-data' method='post'>
	 	<input type="file" name="file">
		<input type="submit" name="submit_upload" value="Загрузить">
	</form>


	<?php

	$files = listdir('./files');

	echo "<h3> Удалить файл </h3>";
	echo "<form method=post>";
	echo "<select name='remove_file'>";
	foreach($files as $file)
		echo "<option name='$file'> $file </option>";
	echo "</select> ";
	echo "<input type='submit' name='submit_remove' value='Удалить'>";
	echo "</form>";

	echo '<h3> Имеющиеся на сайте файлы: </h3>';

	foreach($files as $file)
		echo "<p> <a href='/files/$file'> $file </a> </p>";
	
	return;
}

if(isset($_POST['submit_upload']))
	load_file('./files', '');
else if(isset($_POST['submit_remove']))
	remove_file('./files');

main();

?>
