<?  include("config.php");

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

$obj=new sast1com();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];

$id=$_GET['id'];
$scelto=$_GET['tm'];
?>

<?if($temput==$obj->user){if($temppass==$obj->password){ ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<title>Admin</title>
<link href="images/stile.css" rel="stylesheet">
</head>

<body>
<p>
<b>Modifica template</b>
<br><br>
<form action="mod_template.php" method="post">
<input type="hidden" value="mod" name="op">
<input type="hidden" value="<?echo $id?>" name="id">

  <?
  $obj->connessione();
  $dati=mysql_query("select template from configurazione where id='1'");
  $numero_righe=mysql_num_rows($dati);
  if($numero_righe>0){
  while($array=mysql_fetch_array($dati)){
  echo"<table>";
  $scelto=$array[template];
  }
  }else echo "<table>";
  ?>

</table>
<table>
<?
//procedura carico file templates
$od=opendir("../html/");
if(!$od){echo"Errore apertura cartella html";exit;}
while(gettype($file=readdir($od))!=boolean){
if($file!="." && $file!="..")
if(is_dir("../html/".$file)) mostratemplate("../html/".$file,$scelto);
}
closedir($od);
?>
</table>

<br><br>
<input type="submit" value="Modifica">
</form>

<br>


<?
if ($_POST['op']=="mod"){


$template =$_POST['template'];

$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("update configurazione set template='$template' where id='1'");
if($dati) echo "modificato correttamente";
else echo "non è stato modificato per motivi tecnici: ".mysql_error();

echo"<script>";
echo"document.location.href='mod_template.php';";
echo"</script>";
}
?>

</p>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>
</center>
</body>


<?
function mostratemplate($percorso,$scelto){
//$menopercorso=str_replace("../","",$percorso);
if($scelto==$percorso)echo"<tr><td><input checked type=\"radio\" value=\"$percorso\" name=\"template\"><img src=\"$percorso/anteprima.gif\"></td><td>".leggiconfFromFile("$percorso/info.txt")."</td></tr><tr><td></td></tr>";
else echo"<tr><td><input type=\"radio\" value=\"$percorso\" name=\"template\"><img src=\"$percorso/anteprima.gif\"></td><td>".leggiconfFromFile("$percorso/info.txt")."</td></tr><tr><td></td></tr>";
}
?>

<?
function leggiconfFromFile($percorso){
$fp=fopen("$percorso","r");
$conta=1;
$testo="";
while (!feof($fp)) {
$buffer = fgets($fp, 4096);
$testo.=$buffer."<br>";
$conta++;
}
fclose ($fp);
return $testo;
}
?>