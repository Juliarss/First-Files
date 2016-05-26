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

include("../config.php");
$obj=new sast1com();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];
$id=$_GET['id'];
?>

<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<title>Cms admin</title>
<link href="images/stile.css" rel="stylesheet">
</head>

<body>
<center>
<b>Seleziona pagine</b>
<?
if($_GET['op']=="del"){
$obj->connessione();
$id=$_GET['id'];
$query="delete from altrepagine where id=$id";
$dati=mysql_query("$query");

if($dati)echo"elminazione fatta<br>";
else echo"elminazione non fatta<br>";

}
?>
<table width="630" bordercolor="#FFFFFF" cellpadding="2" style="font-size: 10px; font-family: Verdana; border-size: 1px" width="630">
<tr>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">ID</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">Nome</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                </tr>

<?
$obj=new sast1com();
echo"<form method=\"post\" action=\"sel_pagine_HTML.php?op=massmode&idmenu=$idmenu\">";
$obj->connessione();
$dati=mysql_query("select * from altrepagine");

$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){
if($i%2)echo "<tr bgcolor=#cecece>";
else echo "<tr>";
echo"<td>$array[id]</td>";
echo"<td>$array[nome]</td>";
echo"<td><a href=\"mod_pagine_HTML.php?id=$array[id]\"><img border=\"0\" src=\"images/pen16.gif\" alt=\"Modifica\"></a></td><td><a href=\"sel_pagine_HTML.php?id=$array[id]&op=del\"><img border=\"0\" src=\"images/delete16.gif\" alt=\"Elimina\"></a>"."</td>";
echo"</tr>";
$i++;
}
}
?>
</table>
<br>
<img src="images/filenew.gif" border=0> <a href="ins_pagine_HTML.php"> Inserisci pagina</a>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>