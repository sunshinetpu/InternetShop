<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		if( ($_SESSION['user']== 'admin') || ($_SESSION['user']== 'manager'))
		{
			require ('connectDatabase.php');
			if(isset($_GET['id']))
			{
				$id_order = $_GET['id'];
				if(is_numeric($id_order))
				{
					$query = "delete from order_details where ID_order = $id_order";
					mysql_query($query);
					$query = "delete from `order` where ID = $id_order";
					mysql_query($query);	
					header("location:../index.php?page=listOrder");
				}
				else
				{
					echo "<script type='text/javascript'>alert('ID is not number')</script>" ;
                 echo "<head>
				<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
				</head>";
				}
			}
			else 
			header("location:../index.php?page=admin");
			
		}
		else 
			header("location:../index.php?page=admin");
	}
	else 
	{
		header("location:../index.php?page=admin");
	}
?>