<?php

require_once 'fileutil.php';

function main()
{
	?>

	<h3> Загрузить новую фотограию </h3>

	<form enctype='multipart/form-data' action='/photo' method='post'>
		<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
	 	<input type="file" name="file">
		<input type="submit" name="submit_upload" value="Загрузить">
	</form>


	<?php

	$imgs = listdir('./photos');

	echo "<h3> Удалить фото </h3>";
	echo "<form method=post>";
	echo "<select name='remove_file'>";
	foreach($imgs as $img)
		echo "<option name='$img'> $img </option>";
	echo "</select> ";
	echo "<input type='submit' name='submit_remove' value='Удалить'>";
	echo "</form>";

	echo '<h3> Имеющиеся на сайте изображения: </h3>';

	foreach($imgs as $img)
		echo "<p> <a href='/photos/$img'> $img </a> </p>";
	
	return;
}

if(isset($_POST['submit_upload']))
	load_file('./photos', 'image');
else if(isset($_POST['submit_remove']))
	remove_file('./photos');

main();

?>
