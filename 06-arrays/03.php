<?php
// Task 1
$m = 3;
$n = 4;
$arr = array(array());
$num = 5;
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) { 
		$arr[$i][$j] = $num;
		$num++;
	}
}
echo '<br/>';
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) { 
		echo $arr[$i][$j]." ";
	}
	echo '<br/>';
}
echo '<br/>';

// Task 2
$m = 4;
$n = 4;
$arr = array(array());
$num = 0;
for ($i=0; $i < $m ; $i++) {
	for ($j=0; $j < $n ; $j++) {
		$num++;
		$arr[$i][$j] = $num;
	}
	$num *= (-2);
	$num--;
}
echo '<br/>';
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) { 
		echo $arr[$i][$j]." ";
	}
	echo '<br/>';
}
echo '<br/>';

// Task 3
$m = 4;
$n = 4;
$arr = array(array());
$num = 1;
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) {
		if ($i >= $j) {
			$arr[$i][$j] = $num;
			$num++;
		}else{
			$arr[$i][$j] = 0;
		}
	}
	$num = 1;
}
echo '<br/>';
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) { 
		echo $arr[$i][$j]." ";
	}
	echo '<br/>';
}
echo '<br/>';

// Task 4
$m = 4;
$n = 4;
$arr = array(array());
$arrPositions = array(array(0,0), array(0,1), array(0,2), array(0,3), array(1,3), array(2,3), array(3,3), array(3,2), 
	array(3,1), array(3,0), array(2,0), array(1,0), array(1,1), array(1,2), array(2,2), array(2,1));
$num = 1;
for ($i=0; $i < count($arrPositions); $i++) { 
	$arr[$arrPositions[$i][0]][$arrPositions[$i][1]] = $num;
	$num++;
}
echo '<br/>';
echo '<table border="1">';
for ($i=0; $i < $m ; $i++) {
	echo '<tr>';
	for ($j=0; $j < $n ; $j++) {
		echo '<td>'.$arr[$i][$j].'</td>';
	}
	echo '</tr>';
}
echo '</table>';
echo '<br/>';
?>
