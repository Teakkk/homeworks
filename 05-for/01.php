<?php
$x = 1;
$y = 100;
for ($i=$x; $i <= $y; $i++) { 
	if ($i % 3 == 0 || $i % 7 == 0) {
		echo $i.'<br/>';
	}
}
?>
