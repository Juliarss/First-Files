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
$idp=$_GET['idp'];
$n=$_GET['n'];
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
                                <img border="0" src="images/prodotti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione prodotti File allegati
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
<a href="sel_prodotti.php">Prodotti</a> <b>Ins files per <?echo $n;?></b>
<br>

<?
if($_GET['op']=="del"){
$obj->connessione();
$dati=mysql_query("delete from allegati where id='$id'");
if($dati){echo"cancellata";}
else {echo"non cancellata";}
}
?>

<?
if ($_POST['op']=="ins"){
$idx=$_POST['idx'];
$uploaddir = '../uploads/';
//foto1

$uploadfile = $uploaddir . $_FILES['foto1']['name'];
if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile)) {
    print "Foto 1 ".$_FILES['foto1']['tmp_name']." allegata<br>";
} else {
    print "Foto 1 non allegata<br>";
}
$foto1=$_FILES['foto1']['name'];
/* fine caricamento img*/

$obj=new sast1com();
$obj->connessione();

if(strlen($foto1)>0){
$dati2=mysql_query("insert into allegati (idp,percorso) values('$idx','$foto1')");
if($dati2) {
echo "inerito correttamente";
}else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}

}
?>
<br>
<table width="630" bordercolor="#FFFFFF" cellpadding="2" style="font-size: 10px; font-family: Verdana; border-size: 1px" width="630">
                <tr>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">ID</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF">allegati</td>
                        <td bgcolor="#0A64C8" style="font-size: 10px; font-family: Verdana; font-weight: bold; color: #FFFFFF" width="16"></td>
                </tr>

<?
$obj->connessione();
$dati=mysql_query("select * from allegati where idp='$idp' order by id ");

//echo"select * from annunci order by id desc limit $minimo,$numperpag";
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){
$id=$array[id];
echo "<tr><td>".$array[id]."</td><td>".$array[percorso]."</td><td><a href=\"foto_gallery.php?id=$id&op=del&idp=$idp&n=$n\"><img border=\"0\" src=\"images/delete16.gif\" alt=\"Elimina\"></a>"."</td></tr>";
}
}else echo "0 files";
?>
</table>
<br>
<form action="allegati.php?n=<?echo $n;?>&idp=<?echo $idp;?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="hidden" value="ins" name="op">
<input type="hidden" value="<?echo $idp?>" name="idx">
files:<input type="file" name="foto1"><INPUT type="submit" value="Invia" id=submit1 name=submit1>
</form>
<br><br>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>

<?
function nomecat($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select nome from categorie where id='$id'");
while($array=mysql_fetch_array($dati)){
return $array[nome];
}
}
?>