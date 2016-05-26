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
$id=$_GET['id'];
?>
<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<html>
<body>
<link href="images/stile.css" rel="stylesheet">

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/mail.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Newsletter
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
<br><br>
<?
if($_GET['op']=="del"){
$obj->connessione();
$dati=mysql_query("delete from newsletter where id='$id'");
}
?>


<table width="100%">
<tr>
<td valign="top" width="50%">
<form action="sel_email.php" method="post">
Mittente <input type="text" name="mittente" value="sito <no-reply@sito.it>" size="30">
Oggetto <input type="text" name="oggetto"><br>
Testo<br> <textarea rows=7 cols=60  name="testo"></textarea> <br>

<input type="hidden" name="op" value="send">
<input type="submit" value="invia Mail">
</form>
</td>
<td width="50%">
<table border=0 width="96%">

<?
$i=1;
$obj->connessione();
$dati=mysql_query("select * from newsletter");
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){

if($i%2)echo "<tr bgcolor=#cecece>";
else echo "<tr>";

echo"<td>$i. $array[email]</td><td><a href=\"sel_email.php?op=del&id=$array[id]\"><img src=\"images/delete.png\" border=0></a></td></tr>";
$i++;

}
}else echo "<tr><td>Vuoto</tr></td>";
?>
</table>
</tD>
</tr>
</table>


</center> <br>



<?
if($_POST['op']=="send"){

$testo=$_POST['testo'];
$mittente=$_POST['mittente'];

$tutto="";

$oggetto=$_POST['oggetto'];
$obj->connessione();
$dati=mysql_query("select * from  newsletter");
while($array=mysql_fetch_array($dati)){
if(@mail($array[email],$oggetto,$testo,"From: ".$mittente)) { // SE L'INVIO E' ANDATO A BUON FINE...
echo "La mail stata inoltrata con successo. a $array[email]<br>";
} else {// ALTRIMENTI...
echo "Si sono verificati dei problemi nell'invio della mail. <br>";
}
}
}

?>

</body>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>