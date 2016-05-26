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
?>

<?if($temput==$obj->user){if($temppass==$obj->password){ ?>
<html>
<head>
<title>Pannello di controllo</title>
<style fprolloverstyle>A:hover {color: #0A64C8; font-family: Verdana; text-decoration: underline}
</style>
<style>
<!--
a            { font-family: Verdana; color: #0A64C8; text-decoration: none }
-->
</style>
</head>

<body bgcolor="#FEFEFE" style="font-family: Verdana; font-size: 16pt; color: #0A64C8; margin-top: 10" link="#0A64C8" alink="#0A64C8" vlink="#0A64C8">

<table border="0" width="100%" align="right">
  <tr>
    <td valign="top" width="50%">

        <table border="0">

                <tr>
                        <td height="5"></td>
                </tr>
        </table>
        <table border="0" width="100%" style="font-family: Verdana; font-size: 8pt; font-weight: bold">
                <tr>
                        <td rowspan="2" width="32" height="32" align="center">
                                <a href="sel_prodotti.php">
                                <img border="0" src="images/prodotti32.gif" width="32" height="32">

                                </a>
                        </td>
                        <td align="left">
                                <table border="0" width="100%" style="border-bottom: 1px solid #D6DFF5; padding: 0">
                                        <tr>
                                                <td align="left" valign="middle" style="color: #3366CC">
                                                        <a href="prodotti/prodotti.asp" style="font-family: Verdana; font-size: 10pt; font-weight: bold">
                                                        Prodotti
                                                        </a>

                                                </td>
                                        </tr>
                                </table>
                        </td>
                </tr>
                <tr>
                        <td height="10"></td>
                </tr>
        </table>


      <table border="0" width="100%" style="font-family: Verdana; font-size: 10pt; color: #0A64C8">

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_prodotti.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_prodotti.php">Sono presenti
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from prodotti");
echo mysql_num_rows($dati);?>
     prodotti in catalogo</a></td>
  </tr>

  <tr>
                <td width="20">&nbsp;</td>

                <td width="16" valign="top"><a href="sel_prodotti.php"><img border="0" src="images/warning.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_prodotti.php">Sono presenti
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from prodotti where giacenza < riordino");
echo mysql_num_rows($dati);?>
     prodotti sotto scorta</a></td>
  </tr>

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_prodotti.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_prodotti.php">Sono presenti
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from prodotti where ishome=1");
echo mysql_num_rows($dati);?>
     prodotti in homepage</a></td>
  </tr>


  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_prodotti.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_prodotti.php">
    <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from prodotti where isnovita=1");
echo mysql_num_rows($dati);?>
     prodotti sono impostati come novità</a></td>
  </tr>

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_prodotti.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>

    <td valign="top" style="font-size: 8pt"><a href="sel_prodotti.php">
    <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from prodotti where isofferta=1");
echo mysql_num_rows($dati);?>
     prodotti sono in offerta</a></td>
  </tr>

      </table>


        <table border="0">
                <tr>
                        <td height="5"></td>
                </tr>
        </table>
        <table border="0" width="100%" style="font-family: Verdana; font-size: 8pt; font-weight: bold">
                <tr>
                        <td rowspan="2" width="32" height="32" align="center">
                                <a href="sel_categorie.php">

                                <img border="0" src="images/categorie32.gif" width="32" height="32">
                                </a>
                        </td>
                        <td align="left">
                                <table border="0" width="100%" style="border-bottom: 1px solid #D6DFF5; padding: 0">
                                        <tr>
                                                <td align="left" valign="middle" style="color: #3366CC">
                                                        <a href="sel_categorie.php" style="font-family: Verdana; font-size: 10pt; font-weight: bold">
                                                        Categorie
                                                        </a>

                                                </td>
                                        </tr>
                                </table>
                        </td>
                </tr>
                <tr>
                        <td height="10"></td>
                </tr>
        </table>


      <table border="0" width="100%" style="font-family: Verdana; font-size: 10pt; color: #0A64C8">

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_categorie.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_categorie.php">Sono presenti
     <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from categorie");
echo mysql_num_rows($dati);?> categorie.</a>
</td>
  </tr>

      </table>

        <table border="0">
                <tr>
                        <td height="5"></td>
                </tr>

        </table>
        <table border="0" width="100%" style="font-family: Verdana; font-size: 8pt; font-weight: bold">
                <tr>
                        <td rowspan="2" width="32" height="32" align="center">
                                <a href="sel_utenti.php">
                                <img border="0" src="images/utenti32.gif" width="32" height="32">
                                </a>
                        </td>
                        <td align="left">

                                <table border="0" width="100%" style="border-bottom: 1px solid #D6DFF5; padding: 0">
                                        <tr>
                                                <td align="left" valign="middle" style="color: #3366CC">
                                                        <a href="sel_utenti.php" style="font-family: Verdana; font-size: 10pt; font-weight: bold">
                                                        Utenti
                                                        </a>
                                                </td>
                                        </tr>
                                </table>

                        </td>
                </tr>
                <tr>
                        <td height="10"></td>
                </tr>
        </table>

      <table border="0" width="100%" style="font-family: Verdana; font-size: 10pt; color: #0A64C8">

  <tr>
                <td width="20">&nbsp;</td>

                <td width="16" valign="top"><a href="sel_utenti.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_utenti.php">Sono presenti
    <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from utenti");
echo mysql_num_rows($dati);?>
 utenti registrati</a></td>
  </tr>

      </table>
      <br>
    </td>
    <td valign="top" width="50%">

        <table border="0">

                <tr>
                        <td height="5"></td>
                </tr>
        </table>
        <table border="0" width="100%" style="font-family: Verdana; font-size: 8pt; font-weight: bold">
                <tr>
                        <td rowspan="2" width="32" height="32" align="center">
                                <a href="sel_ordini.php">
                                <img border="0" src="images/ordini32.gif" width="32" height="32">

                                </a>
                        </td>
                        <td align="left">
                                <table border="0" width="100%" style="border-bottom: 1px solid #D6DFF5; padding: 0">
                                        <tr>
                                                <td align="left" valign="middle" style="color: #3366CC">
                                                        <a href="sel_ordini.php" style="font-family: Verdana; font-size: 10pt; font-weight: bold">
                                                        Ordini
                                                        </a>

                                                </td>
                                        </tr>
                                </table>
                        </td>
                </tr>
                <tr>
                        <td height="10"></td>
                </tr>
        </table>


      <table border="0" width="100%" style="font-family: Verdana; font-size: 10pt; color: #0A64C8">

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_ordini.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_ordini.php">Ci sono
    <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from ordini where stato=0");
echo mysql_num_rows($dati);?>
     ordini in fase di accettazione</a></td>
  </tr>

  <tr>
                <td width="20">&nbsp;</td>

                <td width="16" valign="top"><a href="sel_ordini.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_ordini.php">Ci sono
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from ordini where stato=1");
echo mysql_num_rows($dati);?>
     ordini confermati</a></td>
  </tr>

  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_ordini.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_ordini.php">Ci sono
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from ordini where stato=2");
echo mysql_num_rows($dati);?>
     ordini spediti</a></td>
  </tr>

      </table>

        <table border="0">
                <tr>

                        <td height="5"></td>
                </tr>
        </table>
        <table border="0" width="100%" style="font-family: Verdana; font-size: 8pt; font-weight: bold">
                <tr>
                        <td rowspan="2" width="32" height="32" align="center">
                                <a href="sel_email.php">
                                <img border="0" src="images/mail32.gif" width="32" height="32">
                                </a>

                        </td>
                        <td align="left">
                                <table border="0" width="100%" style="border-bottom: 1px solid #D6DFF5; padding: 0">
                                        <tr>
                                                <td align="left" valign="middle" style="color: #3366CC">
                                                        <a href="sel_email.php" style="font-family: Verdana; font-size: 10pt; font-weight: bold">
                                                        Newsletter
                                                        </a>
                                                </td>

                                        </tr>
                                </table>
                        </td>
                </tr>
                <tr>
                        <td height="10"></td>
                </tr>
        </table>

      <table border="0" width="100%" style="font-family: Verdana; font-size: 10pt; color: #0A64C8">


  <tr>
                <td width="20">&nbsp;</td>
                <td width="16" valign="top"><a href="sel_email.php"><img border="0" src="images/info.gif" width="16" height="16"></a></td>
    <td valign="top" style="font-size: 8pt"><a href="sel_email.php">Sono presenti
        <?
    $obj=new sast1com();
    $obj->connessione();
$dati=mysql_query("select * from newsletter");
echo mysql_num_rows($dati);?>
     iscritti alla newsletter</a></td>
  </tr>
</table>

</table>
</body>

</html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>