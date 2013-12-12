

	<?php
	$ok=1;
	if(isset ($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
    foreach ($cart as $ke => $va) {
        if($va>0){
            $ok=2;
			}
		}
	}
	if($ok==2){
		if(isset($_SESSION['cart'])){
			echo '<div><p>Ваш заказ</p></div>';
			echo '<form id="cart_form" action="User/UpdateCart">';
			echo '<table id="cart_table" border="0" 	cellspacing="5">
						<th>Название</th>
						<th>Описание</th>
						<th>Цена</th>
						<th>Количество</th>
						<th>Изменить</th>';
			require 'connectDatabase.php';
						$total = 0;
						foreach ($_SESSION['cart'] as $key => $value)
						{
							if($value > 0)
							{
								$query= mysql_query('Select * from pizza where ID ='.$key);
								if(mysql_num_rows($query)<>0)
								{
									while($rows= mysql_fetch_row($query))
									{
										echo '<tr>';
										echo '<td >'.$rows[1].'</td>';
										echo '<td >'.$rows[3].'</td>';
										echo '<td  >'.$rows[2].'</td>';
										echo '<td class="amount" >'.$value.'</td>';
										echo '<td width="100">';
										echo '		<a class="minus" href="User/UpdateCart.php?id='.$key.'&change=minus"><img alt="" src="images/minus.png"/></a>';
										echo '	<a class="plus" href="User/UpdateCart.php?id='.$key.'&change=plus"><img alt="" src="images/plus.png"/></a>';
										echo '	</td>';
										echo '</tr>';
										$total = $total + $value * $rows[2];
									}
								}
							}
						}
						$_SESSION['total']= $total;
						
			echo '</table>';
			echo '</form>';
			echo '<div id="total"><p>Общая сумма заказа: '.$total.'</p></div>';
			echo '<a href="?page=createOrder">Оформить Ваш заказ</a>';
			
		}
	}
	else{
		UNSET($_SESSION['cart']);
		echo '<div <p>Ваша корзина пуста</p></div>';
	}
		?>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
				$('.plus').click(function(){
					$col_amount = $(this).parent().parent().find('.amount');
					var amount = parseInt($col_amount.text());
					amount++;
					$col_amount.text(amount.toString());
				});
			});
	</script>

