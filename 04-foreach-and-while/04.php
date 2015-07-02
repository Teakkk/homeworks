<?php
$n = 25;
$num = 2;
$flag = true;
while ($num < $n) {
	if ($n % $num == 0) {
		$flag = false;
		break;
	}
	$num++;
}
if ($flag == true) {
	echo $n.' is simple!';
}else{
	echo $n.' isn\'t simple!';
}
?>
