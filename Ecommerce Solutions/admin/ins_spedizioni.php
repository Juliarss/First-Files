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
<title>Cms admin</title>
<link href="images/stile.css" rel="stylesheet">

</head>

<body>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/spedizioni.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione spedizioni     Inserisci
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



$compagnia=$_POST['nome'];
$prezzo0=$_POST['prezzo0'];
$prezzo3=$_POST['prezzo3'];
$percentuale=$_POST['perc2'];
$tipo=$_POST['tiposped'];

$peso=$_POST['max3'];

$iscontrass=$_POST['contrassegno'];
$limspese=$_POST['importo'];
$tiposped=$_POST['spedsep'];

echo"Esito per <strong>$compagnia</strong> ";

if($tipo==0){
      $obj->connessione();
      $dati=mysql_query("insert into spedizioni(tipo,compagnia,prezzo,iscontrass,limspese,tiposped) values ('0','$compagnia','$prezzo0','$iscontrass','$limspese','$tiposped')");
      if($dati){
      echo "inserito correttamente";
      }
      else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}
else if($tipo==2){
      $obj->connessione();
      $dati=mysql_query("insert into spedizioni(tipo,compagnia,percentuale,iscontrass,limspese,tiposped) values ('2','$compagnia','$percentuale','$iscontrass','$limspese','$tiposped')");
      if($dati){
      echo "inserito correttamente";
      }
      else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}
else if($tipo==3){
      $obj->connessione();
      $dati=mysql_query("insert into spedizioni(tipo,compagnia,prezzo,peso,iscontrass,limspese,tiposped) values ('3','$compagnia','$prezzo3','$peso','$iscontrass','$limspese','$tiposped')");
      if($dati){
      echo "inserito correttamente";
      }
      else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}


}?>
<br>

<form method="post" action="ins_spedizioni.php">
 <input type="hidden" value="ins" name="op">
        <table border="0" style="border-collapse: collapse; font-size: 8pt; font-weight: normal" width="630" cellspacing="0">
                <tr>
                        <td valign="middle" style="border: 1px solid #D6DFF5"><p align="center"><INPUT type="radio" name="tiposped" value="0" checked style="border-width: 0">
 <br>
                        Prezzo fisso</p>

                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "prezzo0" value = "0.00" style="">
</td>
                                  </tr>
                                </table>

                        </td>
                </tr>
                <tr>
                        <td valign="middle" style="border: 1px solid #D6DFF5; font-size: 8pt; font-weight: normal"><p align="center"><INPUT type="radio" name="tiposped" value="2" style="border-width: 0">
<br>
                        In percentuale</p>
                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">

                                        <tr>
                                    <td width="60%" valign="middle" align="right">Percentuale:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "2" name = "perc2" value = "0" style="">
</td>
                                  </tr>
                                </table>
                        </td>
                </tr>
                <tr>

                        <td valign="middle" style="border: 1px solid #D6DFF5; font-size: 8pt; font-weight: normal"><p align="center"><INPUT type="radio" name="tiposped" value="3" style="border-width: 0">
<br>
                        In base alla fascia di peso</p>
                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Limite di peso in grammi:&nbsp;</td>

                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "max3" value = "0" style="">
</td>
                                  </tr>
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "prezzo3" value = "0.00" style="">
</td>
                                  </tr>
                                                                                                            <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo per ogni chilo in piu</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "kilopiu" value = "0.00" style="">
</td>
                                  </tr>
                                </table>
                        </td>
                </tr>
        </table>
        </p>

        <p align="center">
        <table border="0" width="90%" style="font-size: 8pt; font-weight: normal">
                <tr>
                        <td width="50%"><p align="right">Nome:&nbsp;</p></td>
                        <td width="50%"><INPUT TYPE="text" size = "15" name = "nome" value = "" style="">
</td>
                </tr>
                <!--<tr>
                        <td width="50%"><p align="right">Contrassegno:&nbsp;</p></td>

                        <td width="50%"><INPUT type="CheckBox" name="contrassegno" value="1" style="border-width: 0">
</td>
                </tr>   -->
                <tr>
                        <td width="50%"><p align="right">Importo oltre il quale non si applicano spese di spedizione (inserendo 0 le spese saranno sempre calcolate) €:&nbsp;</p></td>
                        <td width="50%"><INPUT TYPE="text" size = "8" name = "importo" value = "0.00" style="">
</td>
                </tr>

<!--
                <tr>

                        <td colspan="2">&nbsp;<br><br></td>
                </tr>
                <tr>
                        <td width="50%"><p align="right"><INPUT type="radio" name="spedsep" value="1" checked style="border-width: 0">
</p></td>
                        <td width="50%">Applica la spesa di spedizione separata nei prodotti in cui è prevista.</td>
                </tr>
                <tr>
                        <td width="50%"><p align="right"><INPUT type="radio" name="spedsep" value="2" style="border-width: 0">

</p></td>
                        <td width="50%">Non applicare la spesa di spedizione separata in questo sistema di spedizione.</td>
                </tr>
-->
        </table><br><br><INPUT type="submit" value="Conferma">
        </p>
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