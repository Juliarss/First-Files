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
$idcat=$_GET['idcat'];
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
                                <img border="0" src="images/opzioni.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Opzioni catalogo
                                        </td>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>
<center>

<br>
<form action="opzioni.php" method="post">
<input type="hidden" value="mod" name="op">

  <?
  $obj->connessione();
  $dati=mysql_query("select * from opzioni where id='1'");
  while($array=mysql_fetch_array($dati)){
  $modalita=$array[modalita];
  $statocarrello=$array[statocarrello];
  $statoiva=$array[statoiva];
  }
  ?>

<strong>Modalità di vendita</strong>:    <input type="radio" value="0" <?if($modalita==0)echo"checked";?> name="md"> Business to Business  <input type="radio" value="1" <?if($modalita==1)echo"checked";?> name="md">  Business to Consumer    <br>
<strong>Stato carrello</strong>:         <input type="radio" value="0" <?if($statocarrello==0)echo"checked";?> name="ca">  Disattivato   <input type="radio" value="1" <?if($statocarrello==1)echo"checked";?> name="ca"> Attivato                 <br>
<!--<strong>Considera i prezzi dei prodotti come</strong>:   <input type="radio" value="1"  <?if($statoiva==0)echo"checked";?> name="iv ">   Iva esclusa     <input type="radio" value="0" <?if($statoiva==1)echo"checked";?> name="iv">     Iva inclusa          <br> -->
<br>
<input type="submit" value="Modifica">
</form>
<br><br>


<?
if ($_POST['op']=="mod"){
//$idx=$_POST['idx'];
$modalita=$_POST['md'];
$statocarrello=$_POST['ca'];
$statoiva=$_POST['iv'];

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("update opzioni set modalita='$modalita',statocarrello='$statocarrello',statoiva='$statoiva' where id='1'");
if($dati) echo "cancellato correttamente";
else echo "non è stato cancellato per motivi tecnici: ".mysql_error();

echo"<script language=javascript>";
echo"document.location.href='opzioni.php'";
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