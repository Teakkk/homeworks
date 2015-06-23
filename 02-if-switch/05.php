<?php
$x=1;
$y=1.65;
$centerX=0;
$centerY=0;
$radius=2;
//if ($x+$centerX <= $radius && $y+$centerY <= $radius) {
if (($x - $centerX)*($x - $centerX) + ($y - $centerY)*($y - $centerY) < $radius*$radius) {
	echo 'true';
}else{
	echo 'false';
}
?>
