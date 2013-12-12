<?php
	session_start();
	ob_start();
	include('AntiXSS.php');
	if(isset($_SESSION['cart']) && (count($_SESSION['cart'])>0))
	{
		if(isset($_POST['name']) && isset($_POST['telephone']) && isset($_POST['address']))
		{
			$total= $_SESSION['total'];
			$name = AntiXSS::setFilter($_POST['name'],"whitelist","everything");
			$telephone = AntiXSS::setFilter($_POST['telephone'],"whitelist","number");
			$address = AntiXSS::setFilter($_POST ['address'],"whitelist","everything");
			$comment = isset ($_POST['comment'])? $_POST['comment']: "";
			$comment = AntiXSS::setFilter($comment,"whitelist","everything");
			require ('connectDatabase.php');
			$timenow = date("Y-m-d H:i:s", time());
			$query = "insert into `order` values(NULL,'$name','$telephone','$address','$timenow','$total','0','$comment')";
			mysql_query($query);
			$query = "select ID from `order` where Created_at = '$timenow'";
			$ID_order = mysql_query($query);
			$row = mysql_fetch_array($ID_order);
			$cart = $_SESSION['cart'];
			foreach($cart as $key => $value)
			{
				if($value > 0)
				{
					$query = "insert into `order_details` values(NULL,$row[0],$key,$value)";
					mysql_query($query);
				}
			}
			unset ($_SESSION['cart']);
			unset($_SESSION['total']);
			header("location:../index.php");		
			
		}	
	}
	else
		echo "Корзина пустая";
?>