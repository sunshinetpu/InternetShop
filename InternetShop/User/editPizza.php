<?php
	require ('connectDatabase.php');
	include('AntiXSS.php');
	session_start();
	if(isset($_POST['name']) || isset($_POST['price']) || isset($_POST['description']))
	{
		$name = AntiXSS::setFilter($_POST['name'],"whitelist","string");
		$price = AntiXSS::setFilter($_POST['price'],"whitelist","number");
		$description = AntiXSS::setFilter($_POST['description'],"whitelist","everything");
		$id = $_POST['ID'];
		$query = "update pizza set Name='$name', Price= $price, Description= '$description' WHERE ID = $id";
		mysql_query($query);
		unset($_SESSION['id_edit']);
		header("location:../index.php?page=listProduct");
	}
?>