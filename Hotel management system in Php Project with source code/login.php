<html>
<head>
<?php

	include "index.php";
?>
<script language="javascript" type="text/javascript">
function fun_val()
	{
		var l=document.loginsell.username.value;
		if(l=="")
		{
			alert("Please Enter User name");
			document.loginsell.username.focus;
			return false;
		}
		
		var p=document.loginsell.password.value;
		if(p=="")
		{
			alert("Please Enter Password");
			document.loginsell.password.focus;
			return false;
		}
	}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body bgcolor="#fff2e5" alink="#0000FF" vlink="#0000FF">

<p align="center">

<p align="center">

<p align="center">
<p align="center"><br><TR></tr>
<form name="loginform" action="loginsession.php" method="post"><TR></tr>
  <table width="400" height="178" align="center" cellpadding="1"cellspacing="1" border="3"  bordercolor="#FF0066" bgcolor="#fff2e5">
    <tr> 
      <td height="41" colspan="2" align="center"><h2><font color="#FF0000"><em><font face="Georgia, Times New Roman, Times, serif">Login Form</font></em></font></h2></td>
    </tr>
    <tr> 
      <td width="170" height="40"  align="center"><h3><font color="#7c0000"><em><font face="Georgia, Times New Roman, Times, serif">User Name</font></em></font></h3></td>
      <td width="213"><font color="#7c0000">
         <input type="text" name="username" style="background" />
      </font></td>
    </tr>
    <tr> 
      <td height="38" align="center"><h3><font color="#7c0000"><em><font face="Georgia, Times New Roman, Times, serif">password</font></em></font></h3></td>
      <td><font color="#7c0000">
        <input type="password" name="password" maxlength="8">
        </font></td>
    </tr>
    <tr> 
      <td height="48" colspan="2" align="center"><font color="#7c0000">
        <input type="submit"  value="Submit" name="ok" onClick="return fun_val();"/>
        <a href="userinfo.php">
      <em><strong><font color="#7c0000" size="4" face="Georgia, Times New Roman, Times, serif">     New User?</font></strong></em> <font color="#7c0000"></a></font></td>
    </tr>
  </table>
<p>&nbsp;</p>
</form>

<p>
  <?php
 
					 if($_POST['flag']==1)
					{
					?>
  <script language="JavaScript">
							alert("Please Do Login Properly");
						</script>
      <?
					}
?>
</p>
<marquee behavior=alternate bgcolor="#7e0000"><b><i><a href=contectus.php><font color="white">Devloped By :- Finava Vipul & Metaliya Nikunj </a></i></b></font></marquee>
</body>
</html>

