<?php
$a=4;
$b=2;
$c=3;
if ($a<$b && $a<$c) {
	if ($b<$c) {
		echo 'a='.$a.', b='.$b.', c='.$c;
	}else{
		echo 'a='.$a.', c='.$c.', b='.$b;
	}
}elseif ($b<$a && $b<$c) {
	if ($a<$c) {
		echo 'b='.$b.', a='.$a.', c='.$c;
	}else{
		echo 'b='.$b.', c='.$c.', a='.$a;
	}
}elseif ($c<$a && $c<$b) {
	if ($a<$b) {
		echo 'c='.$c.', a='.$a.', b='.$b;
	}else{
		echo 'c='.$c.', b='.$b.', a='.$a;
	}
}
?>
