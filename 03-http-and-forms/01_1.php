<!DOCTYPE html>
<html>
<head>
	<title>Events in the cities</title>
	<style type="text/css">
		div{border: 1px solid black; padding: 5px; width: 500px;}
	</style>
</head>
<body>
	<h1>Find events</h1>
	<form method="get" action="01_2.php">
		<p><strong>Choose category:</strong></p>
		Music <input type="radio" name="category" value="1" /><br/>
		Sport <input type="radio" name="category" value="2" /><br/>
		Education <input type="radio" name="category" value="3" /><br/>
		<p><strong>Choose city</strong></p>
		<select name="city">
			<option value="1">Sofia</option>
			<option value="2">Vratsa</option>
		</select><br/><br/>
		<input type="submit" value="Find"/>
	</form>
</body>
</html>
