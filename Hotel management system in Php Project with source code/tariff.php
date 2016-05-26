<html>
<head>
	<title>tariff</title>
	<link rel="stylesheet" type="text/css" href="link.php">
</head>
<body bgcolor="#fff2e5">
<?php
	include "index.php";
?>
<br><br>
<center><font color=choco size=4><b><i><u>TARIFF & POLICIES</u></i></b></font></center>
<br><br>
<?php
	include "connection.php";
	$qrysel="select * from tariff";
	$rs=mysql_query($qrysel);
	if(!$rs)
	{
		echo "<font color=purple size=4>In correct mysql select Query.</font>";
		die($qrysel);
	}
	echo "<center>";
	echo "<table border=1>";
	echo "<caption><font color='#7c0000' size=4><b><i>ROOM TARIFF</i></b></font></caption>";
	echo "<tr><th>ROOM</th><th colspan=2>INR</th><th colspan=2>USD</th><th>AVAILABLE</th><th>TOTAL</th></tr>";
	echo "<tr><th>TYPE</th><th>SINGLE</th><th>DOUBLE</th><th>SINGLE</th><th>DOUBLE</th><th>ROOM</th><th>ROOM</th></tr>";
	
	while($v=mysql_fetch_array($rs))
	{
		echo "<tr>";
		echo "<td>".$v['type']."</td>";
		echo "<td>".$v[1]."</td>";
		echo "<td>".$v[2]."</td>";
		echo "<td>".$v[3]."</td>";
		echo "<td>".$v[4]."</td>";
		echo "<td>".$v[5]."</td>";
		echo "<td>".$v[6]."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
<br><br>
<center><table>
<tr>
	<td>
	<ul type=square>
	<font color="#7c0000" size=4><li>POLICIES:</font>
	<ul type=disc><font color=darkpink>
		<li>Check in 12 hours.
		<li>Check out 12 hours.
		<li>Early arrival is subject to availability,For guaranted early check<br>
			in,reservation needs to be made starlings form previous night.
		<li>Goverment taxes & levies extra as applicable
		<li>Inr Rs.700 (usd*20) for extra person/bed.
	</ul>
	<br>
	<font color="#7c0000" size=4><li>RESERVATION GURANTEE :</font>
	<ul type=disc><font color=darkpink>
		<li>All booking must be guaranteed at time of reservation bye money<br>
		order or travel agency.
	</ul>	
	<br>
	<font color="#7c0000" size=4><li>RESERVATION CANCELLATION :</font>
	<ul type=disc><font color=darkpink>
		<li>Reservation must be cancelled 24 hours prior to the <br>planned arrivaltime.
		<li>One night room charge will be levied in case of non arrival.
	</ul>
	</ul>
</table>
<marquee behavior=alternate bgcolor="#7e0000"><b><i><a href=contectus.php><font color="white">Devloped By :- Finava Vipul & Metaliya Nikunj </a></i></b></font></marquee>
</body>
</html>
	