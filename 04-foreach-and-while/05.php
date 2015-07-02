<?php
// encode
$text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
$text2 = $text;
$num = 0;
while ($num < strlen($text)) {
	switch ($text[$num]) {
		case 'a':
			$text2[$num] = '@';
			break;
		case 'e':
			$text2[$num] = '3';
			break;
		default:
			continue;
			break;
	}
	$num++;
}
echo $text.'<br/> <br/>'.$text2.'<br/> <br/>';

// decode
$text3 = $text2;
$num = 0;
while ($num < strlen($text2)) {
	switch ($text2[$num]) {
		case '@':
			$text3[$num] = 'a';
			break;
		case '3':
			$text3[$num] = 'e';
			break;
		default:
			continue;
			break;
	}
	$num++;
}
echo $text3;
?>
