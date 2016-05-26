<?php
	$l=mysql_connect("localhost","root","");
	mysql_select_db('hotel',$l);

    $username=$_POST['username'];
	$password=$_POST['password'];
	
	
	mysql_query ("INSERT INTO `user`
	(`username`,`password`)VALUES
	('$username',
	'$password');",$l);
	header("location:login.php?flag=1");
	
?>
