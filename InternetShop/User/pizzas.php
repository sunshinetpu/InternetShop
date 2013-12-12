<?php
						require 'connectDatabase.php';
						$query= mysql_query("Select * from pizza");
						if(mysql_num_rows($query)<>0)
						{
							$count = 1;
							while($rows= mysql_fetch_row($query))
							{
								echo '<div class="pizza">';
									echo'<div class="piz_img">';
										echo'<img src="images/Pizza/piz'.$count.'.jpg" alt=""/>';
									echo '</div>';
									echo '<div class="piz_name">';
										echo '<p>'.$rows[1].'</p>';
									echo '</div>';
									echo '<div class="piz_discription">';
										echo '<p>'.$rows[3].'</p>';
									echo '</div>';
										echo '<div class="piz_price">';
											echo '<p>'.$rows[2].' rub</p>';
										echo '</div>';
										echo '<a href="User/sendToCart.php?id='.$rows[0].'">Заказать</a>';
								echo "</div>";
								$count++;
							}
						}
						
					?>
				