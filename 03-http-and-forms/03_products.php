<?php
session_start();
if (!(isset($_SESSION['logged']) && $_SESSION['logged']==true)) {
	header('Location: 03_index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Commerce - Products</title>
</head>
<body>
	<h1>e-Commerce "Mania"</h1>
	<?php
	echo '<h3>Welcome '.$_SESSION['username'].' -> <a href="03_index.php">Home</a> | <a href="03_logout.php">Logout</a></h3>';
	?>
	<h2>Products</h2>
	<?php
	if (isset($_GET['opt'])) {
		$opt=$_GET['opt'];
		if ($opt==1) {
			echo '<font color="green">You successfully buy: '.$_SESSION['orderInfo']['products'].' for $'.$_SESSION['orderInfo']['total'].'</font>';
		}else{
			echo '<font color="orange">You cancelled a order with products: '.$_SESSION['orderInfo']['products'].' for $'.$_SESSION['orderInfo']['total'].'</font>';
		}
	}else{
	$productsPrices=array('product1'=>450, 'product2'=>50, 'product3'=>125);
	$productsNames=array('product1'=>'Computer', 'product2'=>'Clothes', 'product3'=>'Wardrobe');
	if (!empty($_POST)) {
		$products=$_POST['products'];
		$cardnumber=$_POST['cardnumber'];
		$funds=$_POST['funds'];
		$total=0;
		foreach ($products as $value) {
			$total+=$productsPrices['product'.$value];
		}
		$vProducts='';
		foreach ($products as $value) {
			$vProducts.=$productsNames['product'.$value].',';
		}
		$vProducts=substr($vProducts, 0, -1);
		if ($total > $funds) {
			echo '<font color="red">You have no funds to buy choosen products!</font>';
		}else{
			$overage=$funds-$total;
			echo 'Products you will buy: '.$vProducts.'. Your funds will be: $'.$overage;
			echo '<br/> <a href="03_products.php?opt=1">Confirm</a> | <a href="03_products.php?opt=2">Cancel</a>';
			$orderInfo=array('products'=>$vProducts, 'total'=>$total);
			$_SESSION['orderInfo']=$orderInfo;
		}
	}else{
	?>
	<form method="post" action="03_products.php">
		<p><strong>Choose products you want to buy:</strong></p>
		<table>
			<tr>
				<td>&nbsp;</td>
				<td>Name</td>
				<td>Price</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="products[]" value="1" /></td>
				<td>Computer</td>
				<td>450$</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="products[]" value="2" /></td>
				<td>Clothes</td>
				<td>50$</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="products[]" value="3" /></td>
				<td>Wardrobe</td>
				<td>125$</td>
			</tr>
		</table>
		Card number: <input type="text" name="cardnumber"/><br/>
		Funds Available: <input type="text" name="funds"/><br/>
		<input type="submit" value="Buy"/>
	</form>
	<?php
	}
	}
	?>
</body>
</html>
