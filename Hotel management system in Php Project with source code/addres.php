<html>
<body bgcolor="#fff3e5">
<?php
	

	$cid=$_POST["cmdday"]."-".$_POST["cmdmonth"]."-".$_POST["cmdyear"];
	 $cod=$_POST["cmbday"]."-".$_POST["cmbmonth"]."-".$_POST["cmbyear"];
	 $norm=$_POST["txtroom"];
	 $type=$_POST["txttype"];
	 $name=$_POST["txtname"];
	 $email=$_POST["txtemail"];
	 $comp=$_POST["txtcompany"];
	 $tele=$_POST["txtnumber"];
	 $addr=$_POST["txtaddress"];
	 $spreq=$_POST["txtspanyreq"];

       
	
	include "connection.php";
	
	$qusr="select r_email,r_chkindt from reservation where r_email='".$email."' and r_chkindt='".$cid."'";
	$rsuser=mysql_query($qusr);
	
	$qq=mysql_query("select * from reservation");
	$row1=mysql_fetch_array($qq,MYSQL_BOTH);
	$id1=$row1[0];
	$id1=$id1+1;
	
	if(mysql_num_rows($rsuser)>0)
	{
		echo "<font color=#7c0000 size=5>PLEASE CHECK IN YOUR E-MAIL & CHECK IN DATE</font>";
		
	}


     $qins="insert into reservation (r_id,r_chkindt,r_chkoutdt,r_rooms,r_type,r_name,r_email,r_company,r_phone,r_address,r_spanyreq)values('".$id1."','".$cid."','".$cod."',".$norm.",'".$type."','".$name."','".$email."','".$comp."',".$tele.",'".$addr."','".$spreq."')";
		
		
  	/*$q=mysql_query("insert into reservation (r_id,r_chkindt,r_chkoutdt,r_rooms,r_type,r_name,r_email,r_company,r_phone,r_address,r_spanyreq) values('$id1','$cid','$cod','$norm','$type','$name','$email','$comp','$tele','$addr','$spreq')",$con),;*/
	echo $qins;
	$s=mysql_query($qins);
	//echo mysql_affected_rows();
	//$ins=mysql_query("insert into reservation values('".$cid."','".$cod."',".$norm.",'".$type."','".$name."','".$email."','".$comp."',".tele.",'".$addr."','".$spreq."')");
	echo "<script>window.location='reservation.php';</script>";
?>
</body>
</html>