<?php
$m = 4;
$n = 4;
$arr = array(array());
$minCols = array();
$totalMin = 0;
for ($i=0; $i < $m ; $i++) { 
	for ($j=0; $j < $n ; $j++) { 
		$arr[$i][$j] = rand(1,100);
	}
}
echo '<br/>';
for ($i=0; $i < $m ; $i++) {
	$minCols[$i] = $arr[0][$i];
	for ($j=0; $j < $n ; $j++) {
		if ($minCols[$i] < $arr[$j][$i]) {
			$minCols[$i] = $arr[$j][$i];
		}
		echo $arr[$i][$j]." ";
		//echo "[$i][$j] ";
	}
	echo '<br/>';
}
echo '<br/>';
for ($i=0; $i < count($minCols); $i++) { 
	echo $minCols[$i].' ';
	$totalMin += $minCols[$i];
}
echo '<br/>';
echo 'Total: '.$totalMin;
?>
