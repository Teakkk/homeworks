<?php
$arr = array('element1'=>14, 'element2'=>5, 'element3'=>15, 'element4'=>11, 'element5'=>3, 'element6'=>17,);
$max1 = $arr['element1'];
$max2 = $arr['element1'];
foreach ($arr as $value) {
	if ($max1 < $value) {
		$max1 = $value;
	}
}
foreach ($arr as $value) {
	if ($max2 < $value && $value < $max1) {
		$max2 = $value;
	}
}
echo $max1.' - '.$max2;
?>
