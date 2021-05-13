<?php

require_once('connection.php');

$notes_count    = $mysql->query('select count(*) count from notes');
$notes_count    = mysqli_fetch_array($notes_count)['count'];
$comments_count = $mysql->query('select count(*) count from comments');
$comments_count = mysqli_fetch_array($comments_count)['count'];

$date       = getdate();
$begin_date = date('Y.m.d', mktime(0, 0, 0, $date['mon'],   1, $date['year']));
$end_date   = date('Y.m.d', mktime(0, 0, 0, $date['mon']+1, 0, $date['year']));

$notes_month_count = $mysql->query(
	"select count(*) count from notes " .
	"where created between '$begin_date' and '$end_date'"
);
$notes_month_count = mysqli_fetch_array($notes_month_count)['count'];

$comments_month_count = $mysql->query(
	"select count(*) count from comments " .
	"where created between '$begin_date' and '$end_date'"
);
$comments_month_count = mysqli_fetch_array($comments_month_count)['count'];

$last_note       = $mysql->query('select id, title from notes order by created desc limit 1');
$last_note       = mysqli_fetch_array($last_note);
$last_note_id    = $last_note['id'];
$last_note_title = $last_note['title'];

$pop_note = $mysql->query(
	"select n.id id, n.title title, count(n.id) count from notes n " .
	"join comments c on c.art_id = n.id " .
	"group by n.id order by count desc limit 1"
);
$pop_note       = mysqli_fetch_array($pop_note);
$pop_note_id    = $pop_note['id'];
$pop_note_title = $pop_note['title'];



echo "<p> Общее число записей: $notes_count </p>";
echo "<p> Общее число комментариев: $comments_count </p>";
echo "<p> Записей в этом месяце: $notes_month_count </p>";
echo "<p> Комментариев в этом месяце: $comments_month_count </p>";
echo "<p> Последняя заметка: <a href='/comments?note_id=$last_note_id'> $last_note_title </a> </p>";
echo "<p> Наиболее комментируемая заметка: <a href='/comments?note_id=$pop_note_id'> $pop_note_title </a> </p>";


?>

