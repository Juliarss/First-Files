<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>registration form</title>
<script language="JavaScript">
function RePasswordValidataion(sPassword,sRePassword)
{
	if(sPassword.toString()!=sRePassword.toString())
	{
		alert("Re-Type Password Has to be same as the Password");
		return false;
	}
	else{return true;}
}
</script>
<style type="text/css">
<!--
.style1 {color: #7c0000}
.style3 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bold;
	font-style: italic;
	color: #CC0066;
}
.style4 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-style: italic;
	color: #C60063;
}
.style6 {font-family: Georgia, "Times New Roman", Times, serif; font-style: italic; color: #99FF66; }
.style10 {font-size: 5}
-->
</style>
<?php
include "index.php";
?>
</head>
<body bgcolor="#fff2e5" alink="#0000FF" vlink="#0000FF">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<TR></tr>
<div align="center" class="style1"><strong><a href="file:///C|/xampp/htdocs/Online Vehical/vehicles/valid.js">valid</a>User Detail</strong></div>
<form action="userdetailinsert.php" method="post" name="userinfo"><TR></tr>
  

<table  align="center" width="380" border="3" cellspacing="1" cellpadding="1" bordercolor="#0000CC" bgcolor="#fff2e5">
<tr>
	<td><span class="style1"><strong>Enter user name:</strong></span> </td>
    <td width="232"><input type="text" name="username"/></td>
  </tr>
  <tr>
    <td><span class="style1"><strong>Enter password:</strong></span></td>
    <td><input type="password" name="pwd" maxlength="8" /></td>
  </tr>
  <tr>
    <td><span class="style1"><strong>Confirm password:</strong></span></td>
    <td><input type="password" name="password" maxlength="8" onchange="return RePasswordValidataion(document.userinfo.pwd.value,document.userinfo.password.value)"/></td>
  </tr>
  
</table>
	<div align="center"><input class="button" type="submit" value="Submit" name="ok" align="right" />
	<input name="reset" type="reset" value="Cancel"/>
</div>
</form>
</body>
</html> 		  



