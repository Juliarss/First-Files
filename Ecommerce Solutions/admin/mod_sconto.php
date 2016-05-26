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
<link href="images/stile.css" rel="stylesheet">
<title>Cms admin</title>
</head>

<body>

<b>Modifica sconto</b>
<br>
<form action="mod_sconto.php" method="post">
<input type="hidden" value="mod" name="op">
<input type="hidden" value="<?echo $id?>" name="idx">

  <?
  $obj->connessione();
  $dati=mysql_query("select * from utenti where id='$id'");
  $numero_righe=mysql_num_rows($dati);
  if($numero_righe>0){
  while($array=mysql_fetch_array($dati)){
    $sconto=$array[sconto];
  echo"Sconto <input type=\"text\" value=\"$sconto\" name=\"sconto\"> %";
  }
  }else echo "Vuoto";
  ?>


<input type="submit" value="Modifica">
</form>
<br><br>


<?
if ($_POST['op']=="mod"){
$idx=$_POST['idx'];
$sconto=$_POST['sconto'];


$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("update utenti set sconto='$sconto' where id='$idx'");
if($dati) echo "modificato correttamente";
else echo "non è stato modificato per motivi tecnici: ".mysql_error();

echo"<script language=javascript>";
echo"document.location.href='sel_utenti.php'";
echo"</script>";
}
?>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>