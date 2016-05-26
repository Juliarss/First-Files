<html>
<head>
	<title>Delete reservation</title>
</head>
<body bgcolor='#fff2e5'>
<form action=deleres.php method=POST>
<?php
	include "connection.php";
	include "index.php";

	$qrysel="select * from reservation";
	$rs=mysql_query($qrysel);
	echo "<table border=1>";
	echo "<tr>
		<th></th><th>r_checkindt</th><th>r_checkoutdt</th>
		<th>r_noofrooms</th><th>r_type</th><th>r_name</th>
		<th>r_email</th><th>r_company</th><th>r_telephone</th><th>r_address</th><th>r_spanyreq</th>
	</tr>";

	while($v=mysql_fetch_array($rs))
	{
		//$d=substr($v["r_chkindt"],8,2)."-".substr($v["r_chkindt"],5,2)."-".substr($v["r_chkindt"],0,4);
		
		//$dt=substr($v["r_chkoutdt"],8,2)."-".substr($v["r_chkoutdt"],5,2)."-".substr($v["r_chkoutdt"],0,4);

		echo"<tr>";
		echo "<td><input type=checkbox name=chkd".$v['r_id']." value=".$v['r_id']."></td>";
		echo "<td>".$v[1]."</td>";
		echo "<td>".$v[2]."</td>";
		echo "<td><input type=hidden name=txtq".$v['r_id']." value=".$v['r_rooms'].">".$v['r_rooms']."</td>";
		echo "<td><input type=hidden name=txtt".$v['r_id']." value=".$v['r_type'].">".$v['r_type']."</td>";
		echo "<td>".$v[5]."</td>";
		echo "<td>".$v[6]."</td>";
		echo "<td>".$v[7]."</td>";
		echo "<td>".$v[8]."</td>";
		echo "<td>".$v[9]."</td>";
		echo "<td>".$v[10]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysql_free_result($rs);
	mysql_close();
?>
<input type="submit" name="s1" value="delete">
</form>
</body>			
</html>