<?php
$x = 1;
$y = 20;
$num = $x;
while ( $num <= $y ) {
	if ($num % 3 == 0 || $num % 7 == 0) {
		echo $num . '<br/>';
	}
	$num++;
}
?>
