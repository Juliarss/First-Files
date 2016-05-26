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

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/spedizioni.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione spedizioni Modifica
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
<? if($_POST['op']=="mod"){

$idx=$_POST['idx'];
$compagnia=$_POST['nome'];
$prezzo0=$_POST['prezzo0'];
$prezzo3=$_POST['prezzo3'];
$percentuale=$_POST['perc2'];
$tipo=$_POST['tiposped'];
$kilopiu=$_POST['kilopiu'];
$peso=$_POST['max3'];

$iscontrass=$_POST['contrassegno'];
$limspese=$_POST['importo'];
$tiposped=$_POST['spedsep'];

echo"Esito per <strong>$compagnia</strong> ";

if($tipo==0){
      $obj->connessione();
      $dati=mysql_query("update spedizioni set tipo='0',compagnia='$compagnia',prezzo='$prezzo0',iscontrass='$iscontrass',limspese='$limspese',tiposped='$tiposped' where id='$idx'");
      if($dati){
      echo "modificato correttamente";
      }
      else echo "non è stato modificato per motivi tecnici: ".mysql_error();
}
else if($tipo==2){
      $obj->connessione();
      $dati=mysql_query("update spedizioni set tipo='2',compagnia='$compagnia',percentuale='$percentuale',iscontrass='$iscontrass',limspese='$limspese',tiposped='$tiposped' where id='$idx'");
 if($dati){
      echo "modificato correttamente";
      }
      else echo "non è stato modificato per motivi tecnici: ".mysql_error();
}
else if($tipo==3){
      $obj->connessione();
      $dati=mysql_query("update spedizioni set tipo='3',compagnia='$compagnia',prezzo='$prezzo3',peso='$peso',iscontrass='$iscontrass',limspese='$limspese',tiposped='$tiposped',kilopiu='$kilopiu' where id='$idx'");
            if($dati){
      echo "modificato correttamente";
      }
      else echo "non è stato modificato per motivi tecnici: ".mysql_error();
}


}?>
<br>


  <?
  $obj->connessione();
  $dati=mysql_query("select * from spedizioni where id='$id'");
  while($array=mysql_fetch_array($dati)){
    $compagnia=$array[compagnia];
    $prezzo=$array[prezzo];
    $tipo=$array[tipo];
    $peso=$array[peso];
    $percentuale=$array[percentuale];
    $iscontrass=$array[iscontrass];
    $limspese=$array[limspese];
    $tiposped=$array[tiposped];
    $kilopiu=$array[kilopiu];
  }
  ?>


<form method="post" action="mod_spedizioni.php">
<input type="hidden" value="mod" name="op">
<input type="hidden" value="<?echo $id?>" name="idx">
        <table border="0" style="border-collapse: collapse; font-size: 8pt; font-weight: normal" width="630" cellspacing="0">
                <tr>
                        <td valign="middle" style="border: 1px solid #D6DFF5"><p align="center"><INPUT type="radio" name="tiposped" value="0" <?if($tipo==0)echo"checked";?> style="border-width: 0">
 <br>
                        Prezzo fisso</p>

                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "prezzo0" value = "<?if($tipo==0)echo"$prezzo";else echo"0.00";?>" style="">
</td>
                                  </tr>
                                </table>

                        </td>
                </tr>
                <tr>
                        <td valign="middle" style="border: 1px solid #D6DFF5; font-size: 8pt; font-weight: normal"><p align="center"><INPUT type="radio" name="tiposped" <?if($tipo==2)echo"checked";?> value="2" style="border-width: 0">
<br>
                        In percentuale</p>
                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">

                                        <tr>
                                    <td width="60%" valign="middle" align="right">Percentuale:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "2" name = "perc2" value = "<?if($tipo==2)echo"$percentuale";else echo"0";?>" style="">
</td>
                                  </tr>
                                </table>
                        </td>
                </tr>
                <tr>

                        <td valign="middle" style="border: 1px solid #D6DFF5; font-size: 8pt; font-weight: normal"><p align="center"><INPUT type="radio" name="tiposped" <?if($tipo==3)echo"checked";?> value="3" style="border-width: 0">
<br>
                        In base alla fascia di peso</p>
                        </td>
                        <td style="border: 1px solid #D6DFF5">
                                <table width="100%" height="100%" border="0" style="font-size: 8pt; font-weight: normal">
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Limite di peso in grammi:&nbsp;</td>

                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "max3" value = "<?if($tipo==3)echo"$peso";else echo"0";?>" style="">
                                    </td>
                                  </tr>
                                        <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo:&nbsp;</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "prezzo3" value = "<?if($tipo==3)echo"$prezzo";else echo"0.00";?>" style="">
</td>
                                  </tr>
                                                                          <tr>
                                    <td width="60%" valign="middle" align="right">Prezzo per ogni chilo in piu</td>
                                    <td width="40%" valign="middle" align="left"><INPUT TYPE="text" size = "8" name = "kilopiu" value = "<?if($tipo==3)echo"$kilopiu";else echo"0.00";?>" style="">
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
                        <td width="50%"><INPUT TYPE="text" size = "15" name = "nome" value = "<?echo $compagnia;?>" style="">
</td>
                </tr>
         <!--       <tr>
                        <td width="50%"><p align="right">Contrassegno:&nbsp;</p></td>

                        <td width="50%"><INPUT type="CheckBox" name="contrassegno" <?if($iscontrass==1)echo"checked";?> value="1" style="border-width: 0">
</td>
                </tr>   -->
                <tr>
                        <td width="50%"><p align="right">Importo oltre il quale non si applicano spese di spedizione (inserendo 0 le spese saranno sempre calcolate) €:&nbsp;</p></td>
                        <td width="50%"><INPUT TYPE="text" size = "8" name = "importo" value = "<?if($limspese!="0,00")echo"$limspese";else echo"0.00";?>" style="">
</td>
                </tr>
 <!--
                <tr>

                        <td colspan="2">&nbsp;<br><br></td>
                </tr>
                <tr>
                        <td width="50%"><p align="right"><INPUT type="radio" name="spedsep" value="1" <?if($tiposped==1)echo"checked";?> style="border-width: 0">
</p></td>
                        <td width="50%">Applica la spesa di spedizione separata nei prodotti in cui è prevista.</td>
                </tr>
                <tr>
                        <td width="50%"><p align="right"><INPUT type="radio" name="spedsep" value="2" <?if($tiposped==2)echo"checked";?> style="border-width: 0">

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