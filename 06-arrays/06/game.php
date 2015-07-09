<?php
session_start();
$_SESSION['gameover'] = 123;
if (isset($_GET['again']) && $_GET['again']==1) {
	session_destroy();
	header('Location: game.php');
}
function UniqueRandom($level) {
	include 'questions.php';
	switch ($level) {
		case 1:
		$max = count($questions1);
		$max--;
		break;
		case 2:
		$max = count($questions2);
		$max--;
		break;
		case 3:
		$max = count($questions3);
		$max--;
		break;
		default:
		echo '<h1>Error!!!</h1>';exit;
		break;
	}
	$min = 0;
	$numbers = range($min, $max);
	shuffle($numbers);
	return array_slice($numbers, 1, 5);
}
function generateQuestion($qNum){
	if ($qNum >= 1 && $qNum <= 5) {
		$level = 1;
	}elseif ($qNum >= 6 && $qNum <= 10) {
		$level = 2;
	}elseif ($qNum >= 11 && $qNum <= 15) {
		$level = 3;
	}
	include 'questions.php';
	switch ($level) {
		case 1:
		$id = $qNum - 1;
		$id = $_SESSION['questions1'][$id];
		$question = $questions1[$id]['question'];
		$answers = $questions1[$id]['answers'];
		$right_answer = $questions1[$id]['right_answer'];
		$right_answer++;
		$answers = explode('#-@-#', $answers);
		$answer1 = $answers[0];
		$answer2 = $answers[1];
		$answer3 = $answers[2];
		$answer4 = $answers[3];
		break;
		case 2:
		$a = 5;
		$id = $qNum - $a - 1;
		$id = $_SESSION['questions2'][$id];
		$question = $questions2[$id]['question'];
		$answers = $questions2[$id]['answers'];
		$right_answer = $questions2[$id]['right_answer'];
		$right_answer++;
		$answers = explode('#-@-#', $answers);
		$answer1 = $answers[0];
		$answer2 = $answers[1];
		$answer3 = $answers[2];
		$answer4 = $answers[3];
		break;
		case 3:
		$a = 10;
		$id = $qNum - $a - 1;
		$id = $_SESSION['questions3'][$id];
		$question = $questions3[$id]['question'];
		$answers = $questions3[$id]['answers'];
		$right_answer = $questions3[$id]['right_answer'];
		$right_answer++;
		$answers = explode('#-@-#', $answers);
		$answer1 = $answers[0];
		$answer2 = $answers[1];
		$answer3 = $answers[2];
		$answer4 = $answers[3];
		break;
		default:
		echo '<h1>Error!!!</h1>';exit;
		break;
	}

	$result=array('question'=>$question, 'answer1'=>$answer1, 'answer2'=>$answer2, 'answer3'=>$answer3, 'answer4'=>$answer4, 'right_answer'=>$right_answer);
	return $result;
}
$prizes = array(0, 50, 100, 150, 200, 250, 500, 1000, 1500, 2000, 2500, 5000, 10000, 25000, 50000, 100000);
if (!empty($_POST)) {
	if ($_SESSION['questionAnswer'] == $_POST['useranswer']) {
		if ($_SESSION['qNum'] == 15) {
			$_SESSION['gameover'] = 333;
			$_SESSION['profit'] = 100000;
		}else{
			if ($_SESSION['qNum'] == 5) {
				$_SESSION['profit'] = 250;
			}elseif ($_SESSION['qNum'] == 10) {
				$_SESSION['profit'] = 2500;
			}elseif ($_SESSION['qNum'] == 15) {
				$_SESSION['profit'] = 100000;
			}
			$_SESSION['qNum']++;
			$question=generateQuestion($_SESSION['qNum']);
			$_SESSION['status'] = 1;
			$_SESSION['questionAnswer'] = $question['right_answer'];
		}
	}else{
		$_SESSION['status'] = 2;
		$_SESSION['gameover'] = 333;
		$_SESSION['wrongQuestion'] = true;
		$wrongQuestion=generateQuestion($_SESSION['qNum']);
	}
}else{
	if (isset($_GET['gameover']) && $_GET['gameover']==1) {
		$b = $_SESSION['qNum'] - 1;
		$_SESSION['gameover'] = 333;
		$_SESSION['profit'] = $prizes[$b];
	}else{
		$_SESSION['questions1'] = UniqueRandom(1);
		$_SESSION['questions2'] = UniqueRandom(2);
		$_SESSION['questions3'] = UniqueRandom(3);
		$_SESSION['qNum'] = 1;
		$question=generateQuestion($_SESSION['qNum']);
		$_SESSION['profit'] = 0;
		$_SESSION['status'] = 0;
		$_SESSION['questionAnswer'] = $question['right_answer'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Стани Богат</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="wrap">
		<div id="title">Стани Богат</div>
		<div id="leftsidebar">
			<div id="left1">
				<?php
				if ($_SESSION['gameover'] == 333) {
					echo '<div id="gameover">
					<h1>ПОЗДРАВЛЕНИЯ!</h1>
					<h3>Вие си тръгвате от "Стани Богат" с</h3>
					<h1 id="profit"> '.number_format($_SESSION['profit']).' лева </h1>
					<h2>по-богат!</h2>
					<h6><strong>Внимание!</strong> Това е само игра и парите не са истински!</h6>
				</div>
				<br/><br/>
				<a href="game.php?again=1" style="display: block; font-size: 25px; text-align: center;">ИГРАЙ ОТНОВО</a>
				';
			}else{?>
			<form method="post">
				<div id="question"><?php echo $question['question']?></div>
				<div class="hbr"></div>
				<label for="useranswer1">
					<div class="answer">
						<input type="radio" onclick="javascript: submit()" name="useranswer" id="useranswer1" value="1" /><span class="optletter">А) </span><span class='radionLabel'><?php echo $question['answer1']?></span>
					</div>
				</label>
				<label for="useranswer2">
					<div class="answer">
						<input type="radio" onclick="javascript: submit()" name="useranswer" id="useranswer2" value="2" /><span class="optletter">Б) </span><span class='radionLabel'><?php echo $question['answer2']?></span>
					</div>
				</label>
				<label for="useranswer3">
					<div class="answer">
						<input type="radio" onclick="javascript: submit()" name="useranswer" id="useranswer3" value="3" /><span class="optletter">В) </span><span class='radionLabel'><?php echo $question['answer3']?></span>
					</div>
				</label>
				<label for="useranswer4">
					<div class="answer">
						<input type="radio" onclick="javascript: submit()" name="useranswer" id="useranswer4" value="4" /><span class="optletter">Г) </span><span class='radionLabel'><?php echo $question['answer4']?></span>
					</div>
				</label>
			</form>
			
			<?php } ?>
		</div>
		<?php
		if ($_SESSION['status'] == 1) {
			echo '<div id="left2"><div class="statusOK">
			Правилно!
		</div></div>';
	}elseif($_SESSION['status'] == 2){
		echo '<div id="left2"><div class="statusWrong">
		Грешно!
	</div>';
	if (isset($_SESSION['wrongQuestion']) && $_SESSION['wrongQuestion'] == true) {
		?>
		<div id="question"><?php echo $wrongQuestion['question']?></div>
		<div class="hbr"></div>
		<label for="useranswer1">
			<div class="answer" <?php if($_POST['useranswer'] == 1){echo 'style="background-color: red;"';}elseif($wrongQuestion['right_answer'] == 1){echo 'style="background-color: yellow;"';}?>>
				<span class="optletter">А) </span><span class='radionLabel'><?php echo $wrongQuestion['answer1']?></span>
			</div>
		</label>
		<label for="useranswer2">
			<div class="answer" <?php if($_POST['useranswer'] == 2){echo 'style="background-color: red;"';}elseif($wrongQuestion['right_answer'] == 2){echo 'style="background-color: yellow;"';}?>>
				<span class="optletter">Б) </span><span class='radionLabel'><?php echo $wrongQuestion['answer2']?></span>
			</div>
		</label>
		<label for="useranswer3">
			<div class="answer" <?php if($_POST['useranswer'] == 3){echo 'style="background-color: red;"';}elseif($wrongQuestion['right_answer'] == 3){echo 'style="background-color: yellow;"';}?>>
				<span class="optletter">В) </span><span class='radionLabel'><?php echo $wrongQuestion['answer3']?></span>
			</div>
		</label>
		<label for="useranswer4">
			<div class="answer" <?php if($_POST['useranswer'] == 4){echo 'style="background-color: red;"';}elseif($wrongQuestion['right_answer'] == 4){echo 'style="background-color: yellow;"';}?>>
				<span class="optletter">Г) </span><span class='radionLabel'><?php echo $wrongQuestion['answer4']?></span>
			</div>
		</label>
	</div>
	<?php
}else{
	echo '</div>';
}
}
?>
</div>
<div id="rightsidebar">
	<div id="right1">
		<table>
			<tr <?php if ($_SESSION['qNum'] == 15) { echo 'class="whie active"';}else{echo 'class="whie"';}?>>
				<td>15.</td><td>100,000 лева</td>
			</tr>
			<tr <?php if ($_SESSION['qNum'] == 14) { echo 'class="active"';}?>><td>14.</td><td>50,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 13) { echo 'class="active"';}?>><td>13.</td><td>25,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 12) { echo 'class="active"';}?>><td>12.</td><td>10,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 11) { echo 'class="active"';}?>><td>11.</td><td>5,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 10) { echo 'class="whie active"';}else{echo 'class="whie"';}?>><td>10.</td><td>2,500 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 9) { echo 'class="active"';}?>><td>9.</td><td>2,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 8) { echo 'class="active"';}?>><td>8.</td><td>1,500 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 7) { echo 'class="active"';}?>><td>7.</td><td>1,000 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 6) { echo 'class="active"';}?>><td>6.</td><td>500 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 5) { echo 'class="whie active"';}else{echo 'class="whie"';}?>><td>5.</td><td>250 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 4) { echo 'class="active"';}?>><td>4.</td><td>200 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 3) { echo 'class="active"';}?>><td>3.</td><td>150 лева</td></tr>
			<tr <?php if ($_SESSION['qNum'] == 2) { echo 'class="active"';}?>><td>2.</td><td>100 лева</td></tr> 
			<tr <?php if ($_SESSION['qNum'] == 1) { echo 'class="active"';}?>><td>1.</td><td>50 лева</td></tr>
		</table>
		<a href="game.php?gameover=1" style="text-decoration: none;"><button id="getmoney">
			Вземам си парите
		</button></a>
	</div>
</div>
<div id="clearit"></div>
</div>
<div id="footer">
	Играта е създадена от Вилиян Иванов - 2015г.
</div>
<div id="counter">БРОЯЧ</div>
</body>
</html>