
		<?php
			if(!isset($_SESSION['user']))
			{
				echo '<h1>Введитe правильную информацию для входа в систему</h1>';
				echo '<form action="User/checkLogin.php" method = "POST">';
					echo '<table>';
						echo '<tr>';
							echo '<td>Пользователь</td>';
							echo '<td><input type= "text" name="login" size=25></input></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td>Пароль</td>';
							echo '<td><input type= "text" name="password" size=25></input></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td></td>';
							echo '<td><input type= "submit" value="Вход" size=25></input></td>';
						echo '</tr>';
					echo '</table>';
				echo '</form>';
			}
			else
			{
				$user = $_SESSION['user'];
				if($user == "admin" || $user == "editor")
				{
					echo '<a href="?page=listProduct">Смотреть список пиццы</a>';
				}
				if($user == "admin" || $user == "manager")
				{
					echo '<br/><a href="?page=listOrder">Смотреть список заказов</a>';
				}
				if($user == "admin" )
				{
					echo '<br/><a href="User/loadXML.php">Загрузать данных в формате XML</a>';
				}
			}
		?>
