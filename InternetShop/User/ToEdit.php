<?php
	session_start();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if(is_numeric($id))
		{
			$_SESSION['id_edit'] = $id;
		}
	}
	header('location:../index.php?page=listProduct');
?>