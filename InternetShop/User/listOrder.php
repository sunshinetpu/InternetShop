
		<?php
			if(isset($_SESSION['user']))
			{
				if($_SESSION['user'] == "admin" || $_SESSION['user'] == "manager")
				{
					require ('connectDatabase.php');
						$query = 'Select * from `order`';
								$result= mysql_query($query);
								if(mysql_num_rows($result)> 0)
								{
									echo '<h1>Список заказов</h1>';
								echo '<div>';
								echo '<table id="list_prder" border="1">
								<tr>
								<th>Заказчик</th>
								<th>Телефон</th>
								<th>Адрес</th>
								<th>Время</th>
								<th>Сумма</th>
								<th>Оплатен</th>
								<th>Комментарий</th>
								<th>Операция</th>
								</tr>';
									while($rows= mysql_fetch_row($result))
									{
										echo '<tr class = "item_order">';
											echo '<td class="order_name">'.$rows[1].'</td>';
											echo '<td class="order_telephone">'.$rows[2].'</td>';
											echo '<td class="order_address">'.$rows[3].'</td>';
											echo '<td class="order_time" >'.$rows[4].'</td>';
											echo '<td  class="order_sum">'.$rows[5].'</td>';
											echo '<td  class="order_pay">';
											if($rows[6] == 0) echo 'Нет';
											else echo 'Да';
											echo '</td>';
											echo '<td  class="order_comment">'.$rows[7].'</td>';
											echo '<td class="order_action">';
											echo '		<a class="click_view" href="javascript:void(0)">Смотреть</a>';
											echo '		<a  href="User/deleteOrder.php?id='.$rows[0].'">Удалить</a>';
											echo '	</td>';
											echo '</tr>';
										echo '<tr class = "order_details_view"><td colspan="8">';
											$id= $rows[0];
											$query=" Select B.Name, A.Amount from order_details A join pizza B on A.ID_pizza = B.ID WHERE A.ID_order = $id";
											$result2= mysql_query($query);
											if(mysql_num_rows($result2)>0)
											{
												while($rows2= mysql_fetch_row($result2))
												{
													echo 'Пицца '.$rows2[0].' Количество: '.$rows2[1].'<br/>';
												}
											}
										echo '</td></tr>';
										
									}
									echo '</table>';
									echo '</div>';
								}
								else echo '<h1>Нет заказов</h1>';
					
				}
						
				
			}
			else
			{
				header("location:admin.php");
			}
		?>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.click_view').click(function(){
					$(this).parent().parent().next().toggle(1000);
				});
			});
		</script>
