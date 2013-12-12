<?php
session_start();
ob_start();
$id = isset($_GET['id']) ? $_GET['id'] : "";
if(is_numeric($id))
{
//проверить существование ид в базе данных
	require 'connectDatabase.php';
	$query= mysql_query('Select * from pizza where ID ='.$id);
	if(mysql_num_rows($query)<>0)
	{
									//проверить существование товара в массиве
		if(isset ($_SESSION['cart'])){
		$cart=$_SESSION['cart'];
		//проверить существование id
		if(array_key_exists($id, $cart)){
       
			$cart[$id]++;
		}
		else {
        $cart[$id]=1;
		}
		$_SESSION['cart']=$cart;
	}  else {
    $cart[$id]=1;
    $_SESSION['cart']=$cart;
	}
	}

}
//	echo $_SESSION['cart'];
header('location:../index.php');
?>
