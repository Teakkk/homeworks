<?php
$a=3;
$b=5;
// first solution
if ($a*$b%2==0) {
	echo 'even'.'<br/>';
}else{
	echo 'odd'.'<br/>';
}
// second solution
if(($a*$b+2)%2==1) {
   echo 'odd'.'<br/>';
}else {
  echo 'even'.'<br/>';
}
?>
