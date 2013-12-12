<?php
$conn = mysql_connect("localhost","root","123") or die ("Can't connect server");
						mysql_select_db("pizza",$conn) or die ("Can't connect database");
?>