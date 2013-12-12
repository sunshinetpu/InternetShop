<?php
session_start();
if(isset($_SESSION['user']) && ($_SESSION['user']== 'admin'))
{
	header("Content-Type: text/xml");
	require 'connectDatabase.php';
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<export>';
		echo '<catalog>';
			$query= 'select * from pizza';
			$result= mysql_query($query);
								if(mysql_num_rows($result)<>0)
								{
									while($rows= mysql_fetch_row($result))
									{
										echo '<pizza id="'.$rows[0].'">';
											echo '<name>';
												echo $rows[1];
											echo '</name>';
											echo '<price>';
												echo $rows[2];
											echo '</price>';
											echo '<description>';
												echo $rows[3];
											echo '</description>';
										echo '</pizza>';
									}
								}
		echo '</catalog>';
		echo '<listOrders>';
						$query = 'Select * from `order`';
								$result= mysql_query($query);
								if(mysql_num_rows($result)> 0)
								{
									while($rows= mysql_fetch_row($result))
									{
										echo '<order id="'.$rows[0].'">';
											echo '<customer>';
												echo $rows[1];
											echo '</customer>';
											echo '<telephone>';
												echo $rows[2];
											echo '</telephone>';
											echo '<address>';
												echo $rows[3];
											echo '</address>';
											echo '<createAt>';
												echo $rows[4];
											echo '</createAt>';
											echo '<total>';
												echo $rows[5];
											echo '</total>';
											echo '<isPayed>';
												if($rows[6] == 0) echo 'Нет';
												else echo 'Да';
											echo '</isPayed>';
											echo '<comment>';
												echo $rows[7];
											echo '</comment>';
											echo '<details>';
												$id= $rows[0];
												$query=" Select A.ID,B.ID,B.Name, A.Amount from order_details A join pizza B on A.ID_pizza = B.ID WHERE A.ID_order = $id";
												$result2= mysql_query($query);
												if(mysql_num_rows($result2)>0)
												{
													while($rows2= mysql_fetch_row($result2))
													{
														echo '<detail id="'.$rows2[0].'">';
															echo '<pizzaID>';
																echo $rows2[1];
															echo '</pizzaID>';
															echo '<pizzaName>';
																echo $rows2[2];
															echo '</pizzaName>';
															echo '<amount>';
																echo $rows2[3];
															echo '</amount>';
														echo '</detail>';
													}	
												}
											echo '</details>';
										echo '</order>';
										
									}
									
								}
			
		echo '</listOrders>';
	echo '</export>';
}
else
{
		echo "<head>
					<meta http-equiv='refresh' content='0;url=../index.php?page=admin' />
					</head>";
}

?>