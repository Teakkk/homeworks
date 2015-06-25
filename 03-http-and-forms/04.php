<?php session_start(); 
if (isset($_GET['again']) && $_GET['again']==1) {
	session_destroy();
	header('Location: 04.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Game of Solving</title>
	<style type="text/css">
		body{
			background-color: #e5e5e5;
		}
		#wrap{
			width: 300px;
			margin: 0 auto;
			padding: 30px;
			border: 2px dashed green;
			text-align: center;
		}
		.hrow{
			height: 1px;
			background: #000;
		}
		#result{
			color: blue;
		}
		#resultNegative{
			color: red;
		}
		#level{
			color: #00B800;
		}
		#taskNumber{
			color: #FF6600;
		}
		#title{
			font: 35px sans-serif;
			font-weight: bold;
			background: #339966;
		}
		#task{
			padding-right: 20px;
			margin: 20px 0 0 70px;
			font: 35px Impact;
			float: left;
		}
		#answer{
			top: 20px;
			left: -15px;
			position: relative;
			display: block;
			width: 40px; 
			height: 30px;
			font: 25px Impact;
		}
		#solve {
			width: 80px;
			height: 40px;
			color: #900;
			background: #FF0;
			font-weight: bold;
			font-size: 20px;
			text-transform: uppercase;
			border: 1px solid #900;
			position: relative;
			top: 20px;
			right: 100px;
		}

		#solve:hover {
			color: #FFF;
			background: #900;
		}
		#cl{
			clear: both;
		}
		#rules{
			text-decoration: underline;
		}
		ul li{
			list-style-type: circle;
		}
		#correct{
			color: #00A300;
			font-size: 25px;
			font-family: inherit;
		}
		#wrong{
			color: #FF0000;
			font-size: 25px;
			font-family: inherit;
		}
		#mark{
			color: #B2476B;
			font-size: 30px;
			font-family: inherit;
		}
		#mark span{
			margin-top: 10px;
			color: #0000FF;
			font-size: 70px;
			font-family: inherit;
		}
	</style>
</head>
<body>
	<div id="wrap">
		<?php
		function generateTask($level){

			switch ($level) {
				case 1:
				$act=mt_rand(1, 2);
				if ($act==1) {
					$a=mt_rand(1, 10);
					$b=mt_rand(1, 10);
					$answer=$a+$b;
					$taskName="$a + $b";
				}else{
					$a=mt_rand(3, 20);
					$b=mt_rand(1, ($a-1));
					$answer=$a-$b;
					$taskName="$a - $b";
				}
				break;
				case 2:
				$act=mt_rand(1, 2);
				if ($act==1) {
					$a=mt_rand(1, 50);
					$b=mt_rand(1, 50);
					$answer=$a+$b;
					$taskName="$a + $b";
				}else{
					$a=mt_rand(3, 100);
					$b=mt_rand(1, ($a-1));
					$answer=$a-$b;
					$taskName="$a - $b";
				}
				break;
				case 3:
				$act=mt_rand(1, 2);
				if ($act==1) {
					$a=mt_rand(2, 10);
					$b=mt_rand(2, 10);
					$answer=$a*$b;
					$taskName="$a * $b";
				}else{
					$a=mt_rand(2, 10);
					$b=mt_rand(2, 10);
					$c=$a*$b;
					$answer=$c / $a;
					$taskName="$c / $a";
				}
				break;
				case 4:
				$act=mt_rand(1, 2);
				if ($act==1) {
					$a=mt_rand(2, 10);
					$b=$a*$a;
					$answer=$b;
					$taskName="$a<sup>2</sup>";
				}else{
					$a=mt_rand(2, 10);
					$b=$a*$a;
					$answer=$a;
					$taskName="&radic;<span style=\"text-decoration: overline\">$b</span>";
				}
				break;
				case 5:
				$a=mt_rand(1,9);
				$b=mt_rand(1,9);
				$c=$b*10;
				$perc=$a*10;
				$answer=$a*0.1*$c;
				$taskName="$perc % of $c";
				break;
				default:
				echo '<h1>Error!!!</h1>';exit;
				break;
			}

			$task=array('task'=>$taskName, 'answer'=>$answer);
			return $task;
		}

		if (!empty($_POST)) {
			$answer=$_POST['answer'];
			$correctAnswer=$_POST['correctAnswer'];
			if ($answer==$correctAnswer) {
				$_SESSION['mess']=1;
				$_SESSION['result']+=5;
			}else{
				$_SESSION['mess']=2;
				$_SESSION['result']-=5;
				$_SESSION['correctedAnswer']=$correctAnswer;
			}
			if ($_SESSION['level']==5 && $_SESSION['taskNumber']==5) {
				$_SESSION['finish']=true;
				if ($_SESSION['result']<=60) {
					$_SESSION['mark']='Poor (2)';
				}elseif ($_SESSION['result']>60 && $_SESSION['result']<=80) {
					$_SESSION['mark']='Average (3)';
				}elseif ($_SESSION['result']>80 && $_SESSION['result']<=100) {
					$_SESSION['mark']='Good (4)';
				}elseif ($_SESSION['result']>100 && $_SESSION['result']<=115) {
					$_SESSION['mark']='Very Good (5)';
				}elseif ($_SESSION['result']>115 && $_SESSION['result']<=125) {
					$_SESSION['mark']='Excellent (6)';
				}else{
					$_SESSION['mark']='Poor (2)!';
				}
			}else{
				if ($_SESSION['taskNumber']==5) {
					$_SESSION['level']++;
					$_SESSION['taskNumber']=1;
				}else{
					$_SESSION['taskNumber']++;
				}
				$_SESSION['start']=true;
				$task=generateTask($_SESSION['level']);
			}
		}else{
			$_SESSION['result']=0;
			$_SESSION['level']=1;
			$_SESSION['taskNumber']=1;
			$task=generateTask(1);
		}
		?>
		<div id="title">Game of Solving</div>
		<div class="hrow"></div>
		<h1>Result: <span id="result<?php if($_SESSION['result']<0){echo 'Negative';}?>"><?php echo $_SESSION['result']; ?></span> points</h1>
		<h2>Level: <span id="level"><?php echo $_SESSION['level']; ?></span></h2>
		<h3>Task: <span id="taskNumber"><?php echo $_SESSION['taskNumber']; ?></span></h3>
		<div class="hrow"></div>
		<?php
		if (isset($_SESSION['finish']) && $_SESSION['finish'] == true) {
			echo '<div id="mark">Your mark is: <br/> <span>'.$_SESSION['mark'].'</span></div> <br/> <a href="04.php?again=1">Play Again!</a>';
		}else{
			?>
			<form method="post" action="04.php">
				<input type="hidden" name="correctAnswer" value="<?php echo $task['answer']; ?>">
				<div id="task"><?php echo $task['task']; ?> = </div><input type="text" id="answer" name="answer" autofocus="autofocus" /><br/>
				<div class="cl"></div>
				<input type="submit" id="solve" value="Solve">
			</form>
			<br/>
			<br/>
			<?php
			if (isset($_SESSION['mess'])) {
				if ($_SESSION['mess']==1) {
					echo '<div id="correct">CORRECT! Way to go!</div>';
				}elseif ($_SESSION['mess']==2) {
					echo '<div id="wrong">WRONG! Answer: <strong>'.$_SESSION['correctedAnswer'].'</strong></div>';
				}
			}
		}
		?>
		<br/>
		<div class="hrow"></div>
		<h3 id="rules">Rules</h3>
		<ul>
			<li>5 levels</li>
			<li>5 tasks on each levels</li>
			<li>5 points on each task</li>
			<li>For correct answer you win: 5 points</li>
			<li>For wrong answer you lose: 5 points</li>
		</ul>
	</div>
</body>
</html>
