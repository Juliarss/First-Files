<html>
<head>
	<title>index page</title>
	<script language="javascript">
	function mouseover()
	{
		document.getElementById("img1").height=350;
		document.getElementById("img1").width=1050;
	}
	function mouseout()
	{
		document.getElementById("img1").height=200;
		document.getElementById("img1").width=1050;
	}
	</script>
</head>
<body bgcolor="#fff2e5">
<body>
	<marquee behavior=alternate bgcolor="#7e0000"><font color=white><b><i>WELCOME TO HOTEL PARAS</i></b></font></marquee>
	
	<form>
	<table>
		<tr>
			<td><img src="image/1234.jpg" name="img1" width=1386 height=216 id=img1 onMouseOver="mouseover()" onMouseOut="mouseout()"></td>
		</tr>
		<tr>
			<td align=center><a href=home.php>Home</a>	|
			<a href=location.php>Location</a>	|
			<a href=accommodation.php>Accomodation</a>	|
			<a href=tariff.php>Tariff & Policies</a>	|
			<a href=restaurant.php>Restaurant</a>	|
			<a href=bancon.php>Banquet & Conforance</a>	|
			<a href=aboutus.php>About us</a>  |
			<a href=login.php>Login</a>  |
			<a href=feedback.php>feedback</a>
			</td>
		</tr>
	</form>
	</table>

</body>
	
</html>