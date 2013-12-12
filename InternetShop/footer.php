  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var color = 0;
				function changeColor()
				{
					if(color ==0)
					{
						//$('#myCart').css({color:yellow});
						$('#myCart').css({"color":"yellow"});
					//	alert('0');
						color = 1;
					}
					else
					{
						$('#myCart').css({"color":"red"});
						//alert('1');
						color = 0;
					}
				}
				setInterval(changeColor,200);
				//change position
				var curDirection = 1;
				var mustRandom = true;
				function changePosition()
				{
					if(mustRandom)
					{
						curDirection = Math.floor((Math.random()*4)+1);	
						if(curDirection == 1)
						{
							$('#myCart p').animate({'margin-right': '-=4px'},40);
							curDirection =2;
						}
						else if (curDirection == 2)
						{
							$('#myCart p').animate({'margin-right': '+=4px'},40);
							curDirection =1;
							
						}
						else if (curDirection == 3)
						{
							$('#myCart p').animate({'margin-top': '-=4px'},40);
							curDirection =4;
						}
						else
						{
							$('#myCart p').animate({'margin-top': '+=4px'},40);
							curDirection =3;
						}
						mustRandom = !mustRandom;
					}
					else
					{
						if(curDirection == 1)
						{
							$('#myCart p').animate({'margin-right': '-=4px'},40);
							curDirection =2;
						}
						else if (curDirection == 2)
						{
							$('#myCart p').animate({'margin-right': '+=4px'},40);
							curDirection =1;
							
						}
						else if (curDirection == 3)
						{
							$('#myCart p').animate({'margin-top': '-=4px'},40);
							curDirection =4;
						}
						else
						{
							$('#myCart p').animate({'margin-top': '+=4px'},40);
							curDirection =3;
						}
						mustRandom = !mustRandom;
					}
				}
				setInterval(changePosition,10);
				 // change banner
				 var number = 1;
				 var url = "";
				 function changeBanner ()
				 {
					url = 'url(images/banner' + number + '.png)';
					$('#banner').css({'background-image': url});
								
							
					if(number == 4)
					{
						number =1;
					}
					else number++;
					//alert("test");
				 }
				
				setInterval(changeBanner,2000);
			});
		</script>
<div id="bigFooter">
			<footer>
				<figure id="pay">
				<img src="images/pay.png" alt=''/>
				</figure>
				
				<p>2013 SUNSHINE PIZZA</p>
			</footer>
		</div>
	</body>
</html>