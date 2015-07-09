<?php
$arr = array();
$sum = 0;
$sumEven = 0;
$sumOdd = 0;
for ($i=0; $i <= 10; $i++) { 
	$arr[$i] = rand(1,100);
}
for ($i=0; $i <= 10; $i++) { 
	$sum += $arr[$i];
	if ($arr[$i] % 2 == 0) {
		$sumEven += $arr[$i];
	}else{
		$sumOdd += $arr[$i];
	}
}
echo $sum.' - '.$sumEven.' - '.$sumOdd;
echo '<br/>';
if ($sumOdd > $sumEven) {
	echo 'Odd sum > Even sum';
}else{
	echo 'Even sum > Odd sum';
}
?>
