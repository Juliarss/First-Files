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
$idp=$_GET['idp'];
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
                                                Gestione prodotti Correla prodotti
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
<a href="sel_prodotti.php">Prodotti</a> <b>Correla prodotti</b>
<br>

<?
if ($_POST['op']=="ins"){

$id=$_POST['id'];

//cancella tutti gli item dalle pagine correlate
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("delete from prodotticorrelati where idp1='$id'");
if($dati) echo "modificato correttamente<br>";
else echo "non è stato modificato per motivi tecnici: ".mysql_error();

//e le inserisco di nuovo

$multipg =$_POST['multipg'];

 if(strlen($multipg)>0){
         foreach($multipg as $id2){
         if($id2>0){
         $dati=mysql_query("insert into prodotticorrelati(idp1,idp2) values ('$id','$id2')");
         if($dati)echo "Correlata $id - $id2<br>";
         else echo "Errore correlazione $id - $id2<br>";
         //if($dati) echo "<div class=\"tuttoOk\"><img src=\"images/si.gif\" border=0>Correlata $id - $id2</div>";
         //else echo "<div class=\"erroreNo\">Errore correlazione $id - $id2: ".mysql_error()."</div>";
         }
         }
   }
}
?>

<br>
<form method="post" action="correla_prodotti.php?idp=<?echo $idp;?>">
<input type="hidden" value="ins" name="op">
<input type="hidden" value="<?echo $idp;?>" name="id">
<table border=0 width="95%">
<tr><td>Scegli prodotti da correlare<br><td>

<?
$correlate[]="";
//carica in array gli id delle pagine correlate
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from prodotticorrelati where idp1=$idp");
while($array=mysql_fetch_array($dati)){
//$titolo=titolopagina($array[idp2]);
//echo"<input type=\"checkbox\" name=\"multipg[]\" value=\"$array[idp2]\">$array[titolo]<br>";
$correlate[]=$array[idp2];
}

//adesso carico tutte le pagine

$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from prodotti");
while($array=mysql_fetch_array($dati)){
//controlla se l'id è nell array di prima, se cè allora seleziono, altrimenti no
if (in_array($array[id], $correlate)) {
echo"<input type=\"checkbox\" name=\"multipg[]\" value=\"$array[id]\" checked>$array[codice] - $array[nome]  - $array[prezzo]<br>";
}
else echo"<input type=\"checkbox\" name=\"multipg[]\" value=\"$array[id]\">$array[codice] - $array[nome]  - $array[prezzo]<br>";
}
?>

</td></tr>
</table>
<input type="submit" value="Correla">
</form>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>