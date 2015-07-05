<?php
$n = 11;
$flag = true;
for ($i=2; $i < $n; $i++) { 
	if ($n % $i == 0) {
		$flag = false;
		break;
	}
}
if ($flag == true) {
	echo $n.' is prime! <br/>';
}else{
	echo $n.' is not prime!';
}

?>
