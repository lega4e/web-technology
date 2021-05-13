<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
<?php





// functions
function li($content)
{
	echo "<li> " . $content . "</li>";
}





// Start list
echo '<ol>';



/* EX 1 */
$a = 10;
$b = 20;

echo li('a = ' . $a .', b = ' .$b);


/* EX 2 */
$c = $a + $b;
echo li('c = a + b = ' . $c);


/* EX 3 */
$c *= 3;
echo li('c *= 3; c = ' . $c);


/* EX 4 */
$c /= $b - $a;
echo li('c /= (b - a); c = ' . $c);


/* EX 5 */
$p = 'Программа';
$b = 'работает';
echo li('p = ' . $p . ', b = ' . $b);


/* EX 6 */
$result = $p . ' ' . $b;
echo li('result = p + " " + b = ' . $result);


/* EX 7 */
$result .= ' хорошо';
echo li('result = ' . $result);


/* EX 8 */
$q = 5;
$w = 7;

$tmp = $w;
$w = $q;
$q = $tmp;
echo li('q = ' . $q . ', w = ' . $w);



// End list
echo '</ol>';





?>
</body>
</html>
