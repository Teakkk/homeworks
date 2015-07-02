<?php
$text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
$colorText = explode(' ', $text);
$br = 1;
echo '<div style="background-color: #c3c3c3;">';
foreach ($colorText as $value) {
	if ($br == 1) {
		echo '<span style="color: white;">'.$value.'</span> ';
	} elseif ($br == 2) {
		echo '<span style="color: green;">'.$value.'</span> ';
	} elseif ($br == 3) {
		echo '<span style="color: red;">'.$value.'</span> ';
		$br = 0;
	}
	$br++;
}
echo '</div>';
?>
