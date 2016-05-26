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
 <script type="text/javascript" src="instantedit_utenti.js"></script>
</head>

<body>
<script type="text/javascript">
setVarsForm("pageID=profileEdit&userID=<?echo $id;?>");
</script>

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/utenti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione utenti  Modifica utenti
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
<br>
<table>
<?
$obj->connessione();
$dati=mysql_query("select * from utenti where id=$id");
while($array=mysql_fetch_array($dati)){
echo "<tr><td><b>Ragione:</b> </td><td><span id=\"ragione\" class=\"editText\">".$array[ragione]."</span></td></tr>";
echo "<tr><td><b>Nome:</b> </td><td><span id=\"nome\" class=\"editText\">".$array[nome]."</span></td></tr>";
echo "<tr><td><b>Cognome:</b> </td><td><span id=\"cognome\" class=\"editText\">".$array[cognome]."</span></td></tr>";
echo "<tr><td><b>Sesso:</b> </td><td><span id=\"sesso\" class=\"editText\">".$array[sesso]."</span></td></tr>";
echo "<tr><td><b>eta:</b></td><td><span id=\"eta\" class=\"editText\">".$array[eta]."</span></b></td></tr>";
echo "<tr><td><b>Indirizzo:</b></td><td><span id=\"indirizzo\" class=\"editText\">".$array[indirizzo]."</span></td></tr>";
echo "<tr><td><b>Citta:</b></td><td><span id=\"citta\" class=\"editText\">".$array[citta]."</span></b></td></tr>";
echo "<tr><td><b>Provincia:</b></td><td><span id=\"provincia\" class=\"editText\">".$array[provincia]."</span></b></td></tr>";
echo "<tr><td><b>cap:</b></td><td><span id=\"cap\" class=\"editText\">".$array[cap]."</span></b></td></tr>";
echo "<tr><td><b>Fisc/iva:</b></td><td><span id=\"fiscale\" class=\"editText\">".$array[fiscale]."</span></td></tr>";
echo "<tr><td><b>Email:</b></td><td><span id=\"email\" class=\"editText\">".$array[email]."</span></b></td></tr>";
echo "<tr><td><b>Telefono:</b></td><td><span id=\"telefono\" class=\"editText\">".$array[telefono]."</span></b></td></tr>";
}
?>
</table>
<br>
Clicca sui campi per modificarne il valore
</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>