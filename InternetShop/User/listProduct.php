
		<?php
			if(isset($_SESSION['user']))
			{
				if($_SESSION['user'] == "admin" || $_SESSION['user'] == "editor")
				{
					echo '<h1>Список продуктов</h1>';
					echo '<div>';
					echo '<form action = "User/editPizza.php" method = "POST">';
					echo '<table id="list_product" border="1">
						<tbody>
						<tr>
						<th>Название</th>
						<th>Цена</th>
						<th>Описание</th>
						<th>Операции</th>
						</tr>';
						require ('connectDatabase.php');
						$query = 'Select * from pizza';
						
								$result= mysql_query($query);
								if(mysql_num_rows($result)<>0)
								{
									while($rows= mysql_fetch_row($result))
									{
										echo '<tr class = "item_pizza">';
										echo '<td class="col_name">'.$rows[1].'</td>';
										echo '<td class = "col_price">'.$rows[2].'</td>';
										echo '<td class= "col_description">'.$rows[3].'</td>';
										
										echo '<td class= "col_action">';
										echo '		<a  href="User/ToEdit.php?id='.$rows[0].'">Редактировать</a>';
										echo '	</td>';
										echo '</tr>';
										if(isset($_SESSION['id_edit']) && ($rows[0] == $_SESSION['id_edit']))
										{
											echo '<tr class = "item_pizza_edit">';
												echo '<td class="col_name"><input type="text" name="name"   value="'.$rows[1].'" required ></input></td>';
												echo '<td class="col_price"><input type="number" name="price" value="'.$rows[2].'" pattern="[1-9]{1}[0-9]+" required></input></td>';
												echo '<td  class="col_description"><textarea cols="50" required name="description" maxlength="150">'.$rows[3].'</textarea></td>';
												echo '<td class="col_action">';
												echo '<input type="submit" value="Сохранить"></input>';
												echo '<input type = "hidden" name="ID" value = "'.$rows[0].'"></input>';
												echo '	</td>';
											echo '</tr>';
										}
										
									}
								}
							echo '</tbody>';
					echo '</table>';
					echo '</form>';
					echo '</div>';
				}
						
				
			}
			else
			{
				header("location:index.php");
			}
		?>

	

