<?php
	@session_start();
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PIZZA SUNSHINE</title>
        
        <link rel="stylesheet" type="text/css" href="myStyle.css" />
	</head>
	<body>
		<div id="bigHeader">
			<header>
				<figure id="logo">
					<a href="#">
					<img src="images/logo.png" alt=''/>
					</a>
					<img src="images/telephone.png" alt=''/>
					<div id="myCart" >
						<a href="?page=cart"><img src="images/cart.png" alt=''/></a>
						<p>
						<?php
							if(!isset($_SESSION['cart']) || (count($_SESSION['cart']) == 0 ))
								echo '0 руб';
							else 
							{
								require ('User/connectDatabase.php');
								$cart = $_SESSION['cart'];
								$sum = 0;
								foreach($cart as $key => $value)
								{
									$query = "Select Price from pizza where ID = $key";
									$result= mysql_query($query);
									if($result)
									{
										if(mysql_num_rows($result)>0)
										{
											if($row=  mysql_fetch_array($result))
											{
												$sum += $row[0] * $value;
					
											}
										}
									}
								}
								echo $sum. ' руб';
							}
						?>
						</p>
					</div>
				</figure>
				<nav id="menu">
						<a href="index.php">Главная</a>
						<a href="?page=aboutUs">О нас</a>
						<a href="?page=delivery">Доставка</a>
						<a href="?page=admin">Админ</a>
						<a href="?page=gallery">Галерея</a>
				</nav>
				<div id="banner">
				</div>
				<div id="user_logout">
					<?php
					if(isset($_SESSION['user'])) echo '	<a href="User/logout.php">'.$_SESSION['user'].', выход</a>';
				?>
				</div>
				<div id="time_order">
					
					<figure id="jakajat">
						<img src="images/jakajat.png" alt=""/>
					</figure>
					
				</div>
			</header>
			</div>