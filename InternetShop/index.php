<?php
	include ('header.php');
	if(!isset($SESSION['cart']))
	{
		$SESSION['cart'] = array();
	}
	/*if(!isset($_SESSION['orderList_ID']))
	{
		$_SESSION['orderList_ID'] = array();
		$_SESSION['orderList_Amount']=array();
		
	}
	if(isset($_POST['ID_pizza']))
	{
		if(!in_array($_POST['ID_pizza'],$_SESSION['orderList_ID']))
		{
			$_SESSION['orderList_ID'][count($_SESSION['orderList_ID'])] = $_POST['ID_pizza'];
			$_SESSION['orderList_Amount'][count($_SESSION['orderList_Amount'])] = 1;
		}
		else
		{
			$ref = array_search($_POST['ID_pizza'],$_SESSION['orderList_ID']);
			$_SESSION['orderList_Amount'][$ref]++;
		}
	}*/
?>
		<div id="bigContent">
			<div id="content">
				<div id="main">
				<?php
					include("User/content.php");
				?>
				</div>
				<div id="right_side">
				</div>
			</div>
			<div id="clear">
			</div>
		</div>
<?php
	include ('footer.php');
?>
		