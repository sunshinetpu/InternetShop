<?php
	session_start();
	ob_start();
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	if(is_numeric($id))
	{
	if(isset ($_SESSION['cart'])){
		$cart=$_SESSION['cart'];
    //проверить существование id
		if(array_key_exists($id, $cart)){
			if($_GET['change'] == "plus")
			{
				$cart[$id]++;
			}
			else if($_GET['change']== "minus")
			{
				$cart[$id]--;
			}
			
		}
		$_SESSION['cart']=$cart;
		}  else {
    
	}
	}
//	echo $_SESSION['cart'];
header('location:../index.php?page=cart');
?>