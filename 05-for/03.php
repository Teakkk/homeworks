<?php
$m = 3;
$n = 4;
echo '<table border="1">';
for ($i=1; $i <= $m ; $i++) { 
	echo '<tr>';
	for ($j=1; $j <= $n ; $j++) { 
		echo '<td>'.$i.', '.$j.'</td>';
	}
	echo '</tr>';
}
echo '</table>';
?>
