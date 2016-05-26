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
                                <img border="0" src="images/pagamenti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Sistemi di pagamento
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
<? if($_POST['op']=="ins"){


$bonifico=$_POST['bonifico'];
$infobonifico=$_POST['infobonifico'];
$vaglia=$_POST['vaglia'];
$infovaglia=$_POST['infovaglia'];
$contrassegno=$_POST['contrassegno'];
$infocontrassegno=$_POST['infocontrassegno'];
$paypal=$_POST['paypal'];
$emailpaypal=$_POST['emailpaypal'];
$gestpay=$_POST['gestpay'];
$codice=$_POST['codice'];
$emailgestpay=$_POST['emailgestpay'];

$infobonifico=rteSafe($infobonifico);
$infovaglia=rteSafe($infovaglia);
$infocontrassegno=rteSafe($infocontrassegno);


$obj->connessione();
$dati=mysql_query("update pagamenti set bonifico='$bonifico',infobonifico='$infobonifico',vaglia='$vaglia',infovaglia='$infovaglia',contrassegno='$contrassegno',infocontrassegno='$infocontrassegno',paypal='$paypal',emailpaypal='$emailpaypal',gestpay='$gestpay',codice='$codice',emailgestpay='$emailgestpay' where id=1");
if($dati){
echo "modificato correttamente";
}
else echo "non è stato modificato per motivi tecnici: ".mysql_error();
}?>

 <?
  $obj->connessione();
  $dati=mysql_query("select * from pagamenti where id=1");
  while($array=mysql_fetch_array($dati)){

$bonifico=$array[bonifico];
$infobonifico=$array[infobonifico];
$vaglia=$array[vaglia];
$infovaglia=$array[infovaglia];
$contrassegno=$array[contrassegno];
$infocontrassegno=$array[infocontrassegno];
$paypal=$array[paypal];
$emailpaypal=$array[emailpaypal];
$gestpay=$array[gestpay];
$codice=$array[codice];
$emailgestpay=$array[emailgestpay];
  }
  ?>

<form method="post" action="sel_pagamenti.php">
<input type="hidden" name="op" value="ins">
<table width="95%">
<tr><td><input type="checkbox" name="bonifico" <?if($bonifico==1)echo"checked";?> value="1"> Bonifico</td></tr>
<tr><td><textarea rows=5 cols=60 name="infobonifico"><?echo $infobonifico;?></textarea></td></tr>
<tr><td><input type="checkbox" name="vaglia" <?if($vaglia==1)echo"checked";?> value="1"> Vaglia</td></tr>
<tr><td><textarea rows=5 cols=60 name="infovaglia"><?echo $infovaglia;?></textarea></td></tr>
<tr><td><input type="checkbox" name="contrassegno" <?if($contrassegno==1)echo"checked";?> value="1"> Contrassegno</td></tr>
<tr><td><textarea rows=5 cols=60 name="infocontrassegno"><?echo $infocontrassegno;?></textarea></td></tr>
<tr><td><input type="checkbox" name="paypal" <?if($paypal==1)echo"checked";?> value="1"> Paypal</td></tr>
<tr><td>Email pagamento<input type="text" value="<?echo $emailpaypal;?>" name="emailpaypal"></td></tr>
<tr><td><input type="checkbox" name="gestpay" <?if($gestpay==1)echo"checked";?> value="1"> gestpay banca sella</td></tr>
<tr><td>Email pagamento<input type="text" value="<?echo $emailgestpay;?>" name="emailgestpay"></td></tr>
<tr><td>Codice esercente<input type="text" value="<?echo $codice;?>" name="codice">GETSPAYXXXX</td></tr>
<tr><td>Pagina successo pagamento <input type="text" value="<?echo "http://".$_SERVER['HTTP_HOST']."/ok.php";?>"></td></tr>
<tr><td>Pagina errore pagamento<input type="text" value="<?echo "http://".$_SERVER['HTTP_HOST']."/no.php";?>"></td></tr>
        </table>
<input type="submit" value="modifica">
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