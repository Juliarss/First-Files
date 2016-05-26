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
                                <img border="0" src="images/utenti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione utenti
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
$dati=mysql_query("delete from utenti where id='$id'");
if($dati){echo"cancellata";}
else {echo"non cancellata";}
}
?>

<table width="630" bordercolor="#FFFFFF" cellpadding="2" style="font-size: 10px; font-family: Verdana; border-size: 1px" width="630">
<tr>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">ID</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">UserId</td>

                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Nome</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Cognome</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Sesso</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Provincia</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Attivo</td>
                       <!-- <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Sconto</td>-->

                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                </tr>

<?
$obj->connessione();
$numperpag=50;
$numresults=mysql_query("select * from utenti order by cognome");
$numrows = mysql_num_rows($numresults);
if (empty( $minimo)){
$minimo = 0;
}
?>

<?
$dati=mysql_query("select * from utenti order by cognome limit $minimo,$numperpag");
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){

//xls
$datix="<table border=1>";
$datix.="<tr><td>nome</td>";
$datix.="<td>user</td>";
$datix.="<td>nome</td>";
$datix.="<td>cognome</td>";
$datix.="<td>fiscale</td>";
$datix.="<td>provincia</td>";
$datix.="<td>citta</td>";
$datix.="<td>email</td>";
$datix.="<td>telefono</td></tr>";
//xls

while($array=mysql_fetch_array($dati)){
$id=$array[id];
$stato=$array[stato];
if($stato==1){$st=0; $s="attivo";}
else {$st=1;$s="non attivo";}
echo "<tr><td>".$array[id]."</td><td>".$array[user]."</td><td>".$array[nome]."</td><td>".$array[cognome]."</td><td>".$array[sesso]."</td><td>".$array[provincia]."</td><td><a href=\"mod_stato_ut.php?id=$id&st=$st\">".$s."</a></td>";//<td><a href=\"mod_sconto.php?id=$array[id]\">".$array[sconto]."</a></td>
echo"<td><a href=\"mod_utenti.php?id=$id\"><img border=\"0\" src=\"images/pen16.gif\" alt=\"Modifica\"></a></td><td><a href=\"sel_utenti.php?id=$id&op=del\"><img border=\"0\" src=\"images/delete16.gif\" alt=\"Elimina\"></a>"."</td></tr>";

$datix.="<tr><td>$array[nome]</td>";
$datix.="<td>$array[user]</td>";
$datix.="<td>$array[nome]</td>";
$datix.="<td>$array[cognome]</td>";
$datix.="<td>$array[fiscale]</td>";
$datix.="<td>$array[provincia]</td>";
$datix.="<td>$array[citta]</td>";
$datix.="<td>$array[email]</td>";
$datix.="<td>$array[telefono]</td></tr>";
}
}else echo "0 utenti";
$datix.="</table>";
?>

</table>
<br>
<?
if ( $minimo >= 3){
$prevoffset = $minimo - $numperpag;
print "<a href=\"sel_utenti.php?minimo=$prevoffset\">PREV</a>&nbsp;\n";
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
print "<a href=\"sel_utenti.php?minimo=$nuovominimo\">$i</a>&nbsp;\n";
}
}

if ( ! ( ( $minimo / $numperpag) == ( $pages - 1)) && ( $pages != 1)){
$nuovominimo = $minimo + $numperpag;
print "<a href=\"sel_utenti.php?minimo=$nuovominimo\">NEXT</a><p>\n";
}
?>

<br><br>

<img src="images/filenew.gif" border=0> <a href="nuovo_utente.php">inserisci</a>
<img src="images/esporta.gif" border=0> <a href="esportaxls.php?dati=<?echo $datix;?>">Esporta utenti</a>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>