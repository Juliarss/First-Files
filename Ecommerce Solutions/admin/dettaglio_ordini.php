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

<?
$op=$_GET['op'];
$id=$_GET['id'];
$nome=$_GET['nome'];
?>
<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<link href="images/stile.css" rel="stylesheet">
<title>Cms admin</title>
<style>
<!--
a            { font-family: Verdana; color: #0A64C8; text-decoration: none }
input        { font-family: Verdana; font-size: 8 pt; border: 1px solid #000000 }
select       { font-family: Verdana; font-size: 8 pt; border: 1px solid #000000 }
-->
</style>
</head>

<body>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/ordini.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione ordini  Dettaglio
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>

<?
if($_GET['op']=="mod"){
$obj->connessione();
$id=$_GET['id'];
$stato=$_GET['stato'];
$dati=mysql_query("update ordini set stato='$stato' where id='$id'");
if($dati)echo"Modificato";

}
?>

<?
$obj->connessione();
$dati=mysql_query("select * from ordini where id='$id'");
while($array=mysql_fetch_array($dati)){
$id=$array[id];
$xid=$array[id];
$user=$array[user];
$dataora=$array[dataora];
$stato=$array[stato];
$pagamento=$array[pagamento];
$spedizione=$array[spedizione];
$transazione=$array[transazione];
$note=$array[note];
         //if($array[stato]==0)echo"<td>In accettazione</td>";
//if($array[stato]==1)echo"<td>Confermato</td>";
//if($array[stato]==2)echo"<td>Spedito</td>";
//if($array[stato]==3)echo"<td>Consegnato</td>";
//if($array[stato]==4)echo"<td>In attesa di disponibilita</td>";
//if($array[stato]==5)echo"<td>Annullato</td>";
//if($array[stato]==6)echo"<td>Archiviato</td>";
}
?>

<?
$obj->connessione();
$dati=mysql_query("select * from utenti where user='$user'");
while($array=mysql_fetch_array($dati)){
//$id=$array[id];
$ragione=$array[ragione];
$nome=$array[nome];
$cognome=$array[cognome];
$sesso=$array[sesso];
$eta=$array[eta];
$fiscale=$array[fiscale];
$indirizzo=$array[indirizzo];
$cap=$array[cap];
$provincia=$array[provincia];
$citta=$array[citta];
$telefono=$array[telefono];
$email=$array[email];
$statout=$array[statout];
$sconto=$array[sconto];
}
?>

        <table border="0" bgcolor="FAFAFA" width="630" cellspacing="0" align="center" style="font-size: 8pt; font-weight: normal; border-collapse: collapse">
                  <tr>
                    <td width="150" align="center" style="border: 1px solid #D6DFF5">
                                        <img border="0" src="images/ordini32.gif"><br>
                                        Dati ordinazione
                                </td>
                    <td style="border: 1px solid #D6DFF5">

                                        <table border="0" width="100%" cellspacing="0" style="font-size: 8pt; font-weight: normal">
                                          <tr>
                                            <td width="160"> <b>IDOrdine:</b></td><td><?echo $id;?></td></tr>

                                          <tr> <td width="160"> <b>Data di ordinazione:</b></td>
                                            <td> <?echo $dataora;?> </td>
                                          </tr>

                                          <tr>
                                            <td width="160">
                                                                <b>Metodo di pagamento:</b>
                                                        </td>
                                            <td>
                                                                <?echo $pagamento;?>
                                            </td>
                                          </tr>
                                          <tr>

                                            <td>
                                                                <b>Metodo di spedizione:</b>
                                                        </td>
                                            <td>
                                                               <?echo $spedizione;?>
                                            </td>
                                          </tr>
                                        </table>
                                </td>

                  </tr>
                  <tr>
                    <td width="150" align="center" style="border: 1px solid #D6DFF5">
                                        <img border="0" src="images/utenti32.gif"><br>
                                        Dati cliente
                                </td>
                    <td style="border: 1px solid #D6DFF5">

                                                <table border="0" width="100%" cellspacing="0" style="font-size: 8pt; font-weight: normal">
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Username:</b>
                                                                </td>
                                                    <td> <?echo $user;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Nome:</b>
                                                                </td>
                                                    <td>
                                                                     <?echo $nome;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Cognome:</b>
                                                                </td>
                                                    <td>
                                                                       <?echo $cognome;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Indirizzo:</b>
                                                                </td>
                                                    <td>
                                                                       <?echo $indirizzo;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Città:</b>
                                                                </td>
                                                    <td>
                                                                        <?echo $citta;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Provincia:</b>
                                                                </td>
                                                    <td>
                                                                        <?echo $provincia;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>CAP:</b>
                                                                </td>
                                                    <td>
                                                                        <?echo $cap;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Sesso:</b>
                                                                </td>
                                                    <td>
                                                               <?echo $sesso;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Età:</b>
                                                                </td>
                                                    <td>
                                                                        <?echo $eta;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>Telefono:</b></font>
                                                                </td>
                                                    <td>
                                                                        <?echo $telefono;?>
                                                    </td>
                                                  </tr>
                                                  <tr>

                                                    <td width="160">
                                                                        <b>email:</b></font>
                                                                </td>
                                                    <td>
                                                                       <?echo $email;?>
                                                    </td>
                                                  </tr>
                                                </table>


                    </td>
                  </tr>
                  <tr>
                    <td width="150" align="center" style="border: 1px solid #D6DFF5">
                                        <img border="0" src="images/note.gif"><br>
                                        Note del cliente
                                </td>
                    <td style="border: 1px solid #D6DFF5; font-size: 8pt; font-weight: normal" valign="top" height="150">

                                        <br><b>Note:</b><br>
                                         <?echo $note;?>
                                </td>
                  </tr>
                </table><br><br>
                <table border="1" bordercolor="#FFFFFF" bgcolor="#F0F0F0" width="630" cellspacing="0" align="center" style="font-size: 8pt; font-weight: normal">
                        <tr>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>ID</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Nome</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Q.tà</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Taglia</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Colore</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Prezzo netto</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>I.V.A.(%)</b></font></td>
                                <td bgcolor="#7A97C6"><font color="#FFFFFF"><b>Prezzo*</b></font></td>
                        </tr>
                        <?
                            $obj->connessione();
                            $dati=mysql_query("select * from prodottiordini where transazione='$id'");
                            while($array=mysql_fetch_array($dati)){
                            $id=$array[id];
                            echo" <tr>";
                                echo"<td>$array[idp]</font></td>";
                                echo"<td>".nome($array[idp])."</font></td>";
                                echo"<td>$array[quantita]</td>";
                                echo"<td>$array[taglia]</td>";
                                echo"<td>$array[colore]</td>";
                                echo"<td>$array[prezzo]</td>";
                                echo"<td>$array[prezzo]</td>";
                                echo"<td>$array[prezzo]</td>";
                           echo"</tr>";
                           $totale+=$array[prezzo];
                            }
                        ?>

                        <tr>
                                <td bgcolor="#FFFFFF" colspan="6">
                                        <p align="right"><b>Totale: </b></font></p>
                                </td>
                                <td bgcolor="#FFFFFF">
                                        <p align="right"><?echo $totale;?></font></p>

                                </td>
                        </tr>
                        <tr>
                                <td bgcolor="#FFFFFF" colspan="7" align="left">
                                        *Il prezzo indicato è IVA inclusa <br><br>
                                        <img src="images/warning.gif" border=0> <strong><font color=red>Attenzione occorre aggiungere le spese di spedizione</font></strong>
                                </td>
                        </tr>
                </table>
                <p ALIGN="center">
                <form method="get" action="dettaglio_ordini.php">
                <input type="hidden" name="op" value="mod">
                <input type="hidden" name="id" value="<?echo $xid;?>">
                <SELECT size = "1" name = "stato" style="border: 1px solid #000000;font-family:verdana;font-size:15px;font-weight:bold;">
                  <OPTION value="0" <?if($stato==0)echo"selected";?>>In accettazione</OPTION>
                  <OPTION value="1" <?if($stato==1)echo"selected";?>>Confermato</OPTION>
                  <OPTION value="2" <?if($stato==2)echo"selected";?>>Spedito</OPTION>
                  <OPTION value="3" <?if($stato==3)echo"selected";?>>Consegnato</OPTION>
                  <OPTION value="4" <?if($stato==4)echo"selected";?>>In attesa di disponibilit&#224;</OPTION>
                  <OPTION value="5" <?if($stato==5)echo"selected";?>>Annullato</OPTION>
                  <OPTION value="6" <?if($stato==6)echo"selected";?>>Archiviato</OPTION>
                  </SELECT>
                  <br>
                <input type="submit" value="Modifica">
                </form>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}

function nome($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select nome from prodotti where id='$id'");
while($array=mysql_fetch_array($dati)){
return $array[nome];
}
}
?>