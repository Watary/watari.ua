<?php

	$connect = mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('watari', $connect) or die(mysql_error());

?>