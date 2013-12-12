
		<div ><h1>Информация для заказа</h1></div>
		<form action="User/AcceptOrder.php" method="POST">
			<table  border="0" align="center">
				<tbody>
					<tr>
						<td >Заказчик</td>
						<td ><input type="text" name="name" size="50" required></input></td>
					</tr>
					<tr>
						<td >Телефон</td>
						<td ><input type="tel" name="telephone" size="30"
						required size="50" pattern="[78]{1}9[0-9]{9}"></input></td>
					</tr>
					<tr>
						<td>Адрес</td>
						<td ><input type="text" name="address" size="50" required></input></td>
					</tr>
					<tr>
						<td >Комментария</td>
						<td ><textarea  name="comment" rows="5" cols="42"></textarea></td>
					</tr>
					<tr>
						<td ></td>
						<td><input type="submit" value="Отправить"></input></td>
					</tr>
				</tbody>
			</table>
		</form>
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
