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
$categoria=$_GET['categoria'];
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
<b>Modifica pagina</b>
<br><br>
<form action="mod_pagine_HTML.php" method="post">
<input type="hidden" value="mod" name="op">
<input type="hidden" value="<?echo $id?>" name="id">

  <?
  $obj->connessione();
  $dati=mysql_query("select * from altrepagine where id='$id'");
  $numero_righe=mysql_num_rows($dati);
  while($array=mysql_fetch_array($dati)){
  $titolo=$array[nome];
  $posto=$array[posto];
  $titolo=str_replace("-"," ",$titolo);
  echo"<table>";
  echo"<tr><td>Titolo</td><td><input type=\"text\" value=\"$titolo\" name=\"titolo\" size=40></td></tr>";
  $contenuto=$array[contenuto];
  echo"<tr><td>Posizione</td><td>";
  echo"<select size=\"1\" name=\"posto\">";
  echo"<option value=\"0\"";if($posto==0)echo"selected"; echo">Menu in alto</option>";
  echo"<option value=\"1\"";if($posto==1)echo"selected";echo">Menu laterale</option>";
  echo"</select>";
  echo"</td></tr>";
   }
  ?>
  </table>

  <!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
        tinyMCE.init({
                mode : "textareas",
                theme : "simple"
        });
</script>
        <textarea id="rte1" name="rte1" rows="25" cols="70" style="width: 80%"><?echo $contenuto;?></textarea>
  <br>
<input type="submit" value="Modifica">
</form>


<?
if ($_POST['op']=="mod"){
$id=$_POST['id'];
$titolo=$_POST['titolo'];
$posto=$_POST['posto'];

$titolo=str_replace("+","-",$titolo);
$titolo=str_replace("'","",$titolo);

$testo =$_POST['rte1'];


$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("update altrepagine set nome='$titolo',contenuto='$testo',posto='$posto' where id='$id'");
if($dati) echo "modificato correttamente";
else echo "non è stato modificato per motivi tecnici: ".mysql_error();

echo"<script>";
echo"document.location.href='sel_pagine_HTML.php';";
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

<?php
function rteSafe($strText) {
        //returns safe code for preloading in the RTE
        $tmpString = $strText;

        //convert all types of single quotes
        $tmpString = str_replace(chr(145), chr(39), $tmpString);
        $tmpString = str_replace(chr(146), chr(39), $tmpString);
        $tmpString = str_replace("'", "&#39;", $tmpString);

        //convert all types of double quotes
        $tmpString = str_replace(chr(147), chr(34), $tmpString);
        $tmpString = str_replace(chr(148), chr(34), $tmpString);
//        $tmpString = str_replace("\"", "\"", $tmpString);

        //replace carriage returns & line feeds
        $tmpString = str_replace(chr(10), " ", $tmpString);
        $tmpString = str_replace(chr(13), " ", $tmpString);

        return $tmpString;
}
?>
<!-- END Demo Code -->