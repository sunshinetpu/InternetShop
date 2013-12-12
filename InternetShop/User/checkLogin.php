<?php
	session_start();
	if(!(isset ($_POST['login'])&& $_POST['login']!= NULL) )
	{
	echo "<script type='text/javascript'>alert('Введите имя пользователя, пожалуйста!!!')</script>" ;
	//header("location:admin.php");
	 echo "<head>
		<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
		</head>";
	}
	else if(!(isset ($_POST['password'])&& $_POST['password']!= NULL))
	{
		echo "<script type='text/javascript'>alert('Введите пароль, пожалуйста!!!')</script>" ;
	//header("location:admin.php");
	 echo "<head>
		<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
		</head>";
	}
	else
	{
		$user = $_POST['login'];
		$pass = $_POST['password'];
		require ('connectDatabase.php');
		$user= mysql_real_escape_string($user);
		$pass= mysql_real_escape_string($pass);
			$query="Select * from `login` where User='$user' and Password='$pass'";
			$result=mysql_query($query);
			if($result)
			{
				if(mysql_num_rows($result)>0)
				{	
					if($row=  mysql_fetch_array($result))
					{
						$_SESSION['user']=$row['User'];
						echo "<script type='text/javascript'>alert('Привет! ".$row['User']."')</script>" ;
					
					}
					echo "<head>
					<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
					</head>";
			
				}
				else{
				echo "<script type='text/javascript'>alert('Проверите данные!')</script>" ;
                 echo "<head>
				<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
				</head>";
				}					
		}
		else
		{
			echo "<script type='text/javascript'>alert('Test Test!')</script>" ;
                 echo "<head>
			<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
			</head>";
		}
	}
		
	
   
	
?>