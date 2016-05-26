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
$idcat=$_GET['idcat'];
$minimo=$_GET['minimo'];
?>
<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<link href="images/stile.css" rel="stylesheet">
<title>Cms admin</title>
</head>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/prodotti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione prodotti
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
$id=$_GET['id'];
$obj->connessione();
$dati=mysql_query("delete from prodotti where id='$id'");
if($dati){echo"cancellato";}
else {echo"non cancellato";}

$dati=mysql_query("delete from prodotticorrelati where idp1='$id'");
}
?>
<br>
 <form method="get" action="sel_prodotti.php">
                <SELECT size = "1" name = "idcat" style="border: 1px solid #000000;font-family:verdana;">
<?
$obj->connessione();
$dati=mysql_query("select * from categorie order by id");
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){
echo "<option value=\"$array[id]\">$array[nome]</option>";
} }
?>

                <input type="submit" value="Filtra">
                </form>
<br>
<table width="630" bordercolor="#FFFFFF" cellpadding="2" style="font-size: 10px; font-family: Verdana; border-size: 1px">
                <tr>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">ID</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16">Hom</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16">Off</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16">Nov</td>

                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Nome</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Codice</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Marca</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Prezzo</td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Giacenza</td>

                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <!--<td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td> -->
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                </tr>

<?
$numperpag=50;
if(strlen($idcat)>0)$numresults=mysql_query("select * from prodotti where idcat='$idcat'");
else $numresults=mysql_query("select * from prodotti order by id desc");
$numrows = mysql_num_rows($numresults);
if (empty( $minimo)){
$minimo = 0;
}
?>


<?
$obj->connessione();
if(strlen($idcat)>0)$dati=mysql_query("select * from prodotti where idcat='$idcat' order by id desc limit $minimo,$numperpag");
else $dati=mysql_query("select * from prodotti order by id desc limit $minimo,$numperpag");

//xls
$datix="<table border=1>";
$datix.="<tr><td>nome</td>";
$datix.="<td>codice</td>";
$datix.="<td>marca</td>";
$datix.="<td>prezzo</td>";
$datix.="<td>sconto</td>";
//$datix.="<td>breve</td>";
$datix.="<td>giacenza</td></tr>";
//xls

while($array=mysql_fetch_array($dati)){
echo"<tr>";
echo"<td bgcolor=\"#F5F5F5\">$array[id]</td>";


if($array[ishome]==1)echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_hom.php?id=$array[id]&st=0\"><img src=\"images/si.gif\" border=0></a></td>";
else echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_hom.php?id=$array[id]&st=1\"><img src=\"images/no.gif\" border=0></a></td>";

if($array[isofferta]==1)echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_off.php?id=$array[id]&st=0\"><img src=\"images/si.gif\" border=0></a></td>";
else echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_off.php?id=$array[id]&st=1\"><img src=\"images/no.gif\" border=0></a></td>";

if($array[isnovita]==1)echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_nov.php?id=$array[id]&st=0\"><img src=\"images/si.gif\" border=0></a></td>";
else echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_nov.php?id=$array[id]&st=1\"><img src=\"images/no.gif\" border=0></a></td>";

echo"<td bgcolor=\"#F5F5F5\">$array[nome]</td>";
echo"<td bgcolor=\"#F5F5F5\">$array[codice]</td>";
echo"<td bgcolor=\"#F5F5F5\">$array[marca]</td>";
echo"<td bgcolor=\"#F5F5F5\">$array[prezzo]</td>";
echo"<td bgcolor=\"#F5F5F5\">$array[giacenza]</td>";
$id=$array[id];
echo"<td bgcolor=\"#F5F5F5\"><a href=\"sel_colori.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/colori16.gif\" alt=\"Colori\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"foto_piccola.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/photos.gif\" alt=\"Foto piccola\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"foto_gallery.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/fotogallery16.gif\" alt=\"Foto gallery\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"allegati.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/files16.gif\" alt=\"File Extra\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"correla_prodotti.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/table_relationship.gif\" alt=\"Prodotti correlati\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"sel_taglie.php?idp=$array[id]&n=$array[nome]\"><img border=\"0\" src=\"images/reload16.gif\" alt=\"Varianti\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"mod_prodotti.php?idp=$array[id]\"><img border=\"0\" src=\"images/pen16.gif\" alt=\"Modifica\"></a>";
echo"</td>";
echo"<td bgcolor=\"#F5F5F5\"><a href=\"sel_prodotti.php?op=del&id=$id\"><img src=\"images/delete16.gif\" border=0></a></td>";
echo"</tr>";

//per esportazione

$datix.="<tr><td>$array[nome]</td>";
$datix.="<td>$array[codice]</td>";
$datix.="<td>$array[marca]</td>";
$datix.="<td>$array[prezzo]</td>";
$datix.="<td>$array[sconto]</td>";
//$datix.="<td>$array[breve]</td>";
$datix.="<td>$array[giacenza]</td></tr>";
}
$datix.="</table>";
?>
</table>
<body> <br><br>
<?
if ( $minimo >= 3){
$prevoffset = $minimo - $numperpag;
print "<a href=\"sel_prodotti.php?minimo=$prevoffset&idcat=$idcat\">PREV</a>&nbsp;\n";
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
print "<a href=\"sel_prodotti.php?minimo=$nuovominimo&idcat=$idcat\">$i</a>&nbsp;\n";
}
}

if ( ! ( ( $minimo / $numperpag) == ( $pages - 1)) && ( $pages != 1)){
$nuovominimo = $minimo + $numperpag;
print "<a href=\"sel_prodotti.php?minimo=$nuovominimo&idcat=$idcat\">NEXT</a><p>\n";
}
?>

<br><br>
<img src="images/filenew.gif" border=0> <a href="ins_prodott.php">Inserisci prodotto</a>
<img src="images/esporta.gif" border=0> <a href="esportaxls.php?dati=<?echo $datix;?>">Esporta prodotti</a>

</center>
</body>
</html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}


function nomecat($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select nome from categorie where id='$id'");
while($array=mysql_fetch_array($dati)){
return $array[nome];
}
}
?>