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
?>

<?
$op=$_GET['op'];
$id=$_GET['id'];
$nome=$_GET['nome'];
$stato=$_GET['stato'];
$minimo=$_GET['minimo'];
?>
<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<link href="images/stile.css" rel="stylesheet">
<title>Cms admin</title>
</head>

<body>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/ordini.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione ordini
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
<?
if($_GET['op']=="del"){
$obj->connessione();
$dati=mysql_query("delete from ordini where id='$id'");

$dati=mysql_query("delete from prodottiordini where id='$id'");
}
?>
<br>
 <form method="get" action="sel_ordini.php">
                <SELECT size = "1" name = "stato" style="border: 1px solid #000000;font-family:verdana;">
                  <OPTION value="0">In accettazione</OPTION>
                  <OPTION value="1">Confermato</OPTION>
                  <OPTION value="2">Spedito</OPTION>
                  <OPTION value="3">Consegnato</OPTION>
                  <OPTION value="4">In attesa di disponibilit&#224;</OPTION>
                  <OPTION value="5">Annullato</OPTION>
                  <OPTION value="6">Archiviato</OPTION>
                  </SELECT>

                <input type="submit" value="Filtra">
                </form>

<br>

<table width="630" bordercolor="#FFFFFF" cellpadding="2" style="font-size: 10px; font-family: Verdana; border-size: 1px">
                <tr>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">ID</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">UserId</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Data</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Stato</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                </tr>

<?
$obj->connessione();
$numperpag=100;
if(strlen($stato)<=0)$numresults=mysql_query("select * from ordini order by id desc");
else $numresults=mysql_query("select * from ordini where stato=$stato");
$numrows = mysql_num_rows($numresults);
if (empty( $minimo)){
$minimo = 0;
}
?>

<?
$obj->connessione();
if(strlen($stato)<=0)$dati=mysql_query("select * from ordini order by id desc limit $minimo,$numperpag");
else $dati=mysql_query("select * from ordini where stato=$stato limit $minimo,$numperpag");

//echo"select * from annunci order by id desc limit $minimo,$numperpag";
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){
$id=$array[id];
echo "<tr><td>".$array[id]."</td><td>".$array[user]."</td><td>".$array[dataora]."</td>";
if($array[stato]==0)echo"<td>In accettazione</td>";
if($array[stato]==1)echo"<td>Confermato</td>";
if($array[stato]==2)echo"<td>Spedito</td>";
if($array[stato]==3)echo"<td>Consegnato</td>";
if($array[stato]==4)echo"<td>In attesa di disponibilita</td>";
if($array[stato]==5)echo"<td>Annullato</td>";
if($array[stato]==6)echo"<td>Archiviato</td>";
echo"<td><a href=\"sel_ordini.php?op=del&id=$array[id]\"><img border=\"0\" src=\"images/delete16.gif\" alt=\"Sotto-categorie\"></a>"."</td><td><a href=\"dettaglio_ordini.php?id=$id\"><img border=\"0\" src=\"images/search-document16.gif\" alt=\"vedi\"></a>"."</td></tr>";
}
}else echo "0 ordini";
?>
</table>

<br>
<?
if ( $minimo >= 3){
$prevoffset = $minimo - $numperpag;
print "<a href=\"sel_ordini.php?minimo=$prevoffset&stato=$stato\">PREV</a>&nbsp;\n";
}

$pages = intval( $numrows / $numperpag);
if ( $pages < ( $numrows / $numperpag)){
$pages = ( $pages + 1);
}

for ( $i = 1; $i <= $pages; $i++){
$nuovominimo = $numperpag * ( $i-1);
if ( $nuovominimo == $minimo){
print "$i&nbsp;\n";
}else{
print "<a href=\"sel_ordini.php?minimo=$nuovominimo&stato=$stato\">$i</a>&nbsp;\n";
}
}

if ( ! ( ( $minimo / $numperpag) == ( $pages - 1)) && ( $pages != 1)){
$nuovominimo = $minimo + $numperpag;
print "<a href=\"sel_ordini.php?minimo=$nuovominimo&stato=$stato\">NEXT</a><p>\n";
}
?>
<br>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>