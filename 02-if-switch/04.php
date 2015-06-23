<?php
$a=5;
$b=-5;
// first solution
if ($a+$b>=0) {
	echo 'positive'.'<br/>';
}else{
	echo 'negative'.'<br/>';
}
// second solution
if (($a+$b) * -1 >= 0) {
	echo 'negative'.'<br/>';
}else{
	echo 'positive'.'<br/>';
}
?>
