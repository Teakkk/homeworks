<?php
	$city1 = array('name'=>'Sofia', 'event1'=>'Jazz Do It Summer 2015', 'event2'=>'Ice Skating Winter 2015', 'event3'=>'Mathematical Games');
	$city2 = array('name'=>'Vratsa', 'event1'=>'Vola Open Air 2015', 'event2'=>'Street Ball', 'event3'=>'Train Devs - PHP & MySQL');
	$categories = array('cat1'=>'Music', 'cat2'=>'Sport', 'cat3'=>'Education');
	if (!empty($_GET)) {
		$category = $_GET['category'];
		$city = $_GET['city'];
		if ($city==1) {
			echo '<div>Event in <strong>'.$city1['name'].'</strong> with category '.$categories['cat'.$category].' is: <strong>'.$city1['event'.$category].'</strong></div>';
		}elseif ($city==2) {
			echo '<div>Event in <strong>'.$city2['name'].'</strong> with category '.$categories['cat'.$category].' is: <strong>'.$city2['event'.$category].'</strong></div>';
		}else{
			echo '<div>Error! No found city!</div>';
		}
	}
?>
