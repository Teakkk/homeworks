<?php
echo '<table border="1">';
for ($i=1; $i <= 10 ; $i++) { 
	echo '<tr>';
	for ($j=1; $j <= $i ; $j++) { 
		$a = $i*$j;
		echo "<td>$i * $j = $a</td>";
	}
	if ($i != 10) {
		$b = 10 - $i;
		echo '<td colspan="'.$b.'">&nbsp;</td>';
	}
	echo '</tr>';
}
echo '</table>';
?>
