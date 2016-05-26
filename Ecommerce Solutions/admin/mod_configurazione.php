<?

/*
 * Ecommerce solutions
 * Copyright (C) 2006-2100 Sandro Stracuzzi <info@persefone.it> <sandrostracuzzi@hotmail.com>
 *
 * http://www.ecommercesolutions.it
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * Note sulla licenza:
 * E' vietato distribuire il software dietro pagamento di denaro oppure ricevere un compenso
 * per la gestione del software. Il software è personale e puoi essere distribuito solo gratuitamente.
 * L'autore del software è sandro stracuzzi e va citato insieme al sito ufficiale http://www.ecommercesolutions.it
 * in ogni pagina del sito.
 * E' severamente vietato eliminare i riferimenti all'autore o al sito web dalle pagine del sito.
 *
 * Chiunque non accetti queste note o è contrario ad esse è pregato di non utilizzare il software altrimenti
 * verrà perseguito legalmente.
 *
*/

include("config.php");
$obj=new sast1com();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];

//$id=$_GET['id'];
$id=1;
?>
<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<title>Cms admin</title>
<link href="images/stile.css" rel="stylesheet">
 <script type="text/javascript" src="instantedit_configurazione.js"></script>
</head>

<body>
<script type="text/javascript">
setVarsForm("pageID=profileEdit&userID=<?echo $id;?>");
</script>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/aspetto.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Configura
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>
<center>
<br>
<strong>Modifica logo</strong>
<form method="post" action="mod_configurazione.php" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="hidden" name="op" value="ins">
Immagine <input type="file" name="banner"><input type="submit" value="Modifica">
<br>

<? if($_POST['op']=="ins"){

//img 1
$fname1 = $_FILES['banner']['name'];
if (move_uploaded_file($_FILES['banner']['tmp_name'], "../images/$fname1")){
echo "<b>$fname1</b> successo \r\n";
}
else{
echo "Errore... $fname1 non riuscito<br><br>\r\n";
}

$obj->connessione();
$dati=mysql_query("update configurazione set logo ='$fname1' where id=1");
if($dati){
echo "inserito correttamente";
}
else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}?>

<br><br>

<?
//$id=$_GET['id'];
$pagina=$_GET['pagina'];

$obj->connessione();
$dati=mysql_query("select * from configurazione where id=$id");
while($array=mysql_fetch_array($dati)){
echo "<b>Logo negozio:</b> <br><span id=\"logo\"><img src=../images/".$array[logo]." width=\"200\"></span><br><br>";
echo "<b>Nome negozio:</b> <br><span id=\"nome\" class=\"editText\">".$array[nome]."</span><br><br>";
//echo "<b>Chi siamo:</b> <br><span id=\"chisiamo\" class=\"editText\">".$array[chisiamo]."</span><br><br>";
//echo "<b>Dovesiamo:</b><br><span id=\"dovesiamo\" class=\"editText\">".$array[dovesiamo]."</span></b><br><br>";
//echo "<b>Contatti:</b> <br><span id=\"contatti\" class=\"editText\">".$array[contatti]."</span><br><br>";
echo "<b>Email sito:</b><br><span id=\"email_ordini\" class=\"editText\">".$array[email_ordini]."</span></b><br><br>";
//echo "<b>Email paypal:</b> <br><span id=\"email_paypal\" class=\"editText\">".$array[email_paypal]."</span><br><br>";
echo "<b>Piva:</b><br><span id=\"piva\" class=\"editText\">".$array[piva]."</span></b><br><br>";
echo "<b>Telefono:</b><br><span id=\"telefono\" class=\"editText\">".$array[telefono]."</span></b><br>";

}
?>
<br>
* per modificarne il valore occorre cliccare sui campi

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>