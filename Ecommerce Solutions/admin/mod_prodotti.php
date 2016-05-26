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
$idp=$_GET['idp'];
?>

<?
if($temput==$obj->user){if($temppass==$obj->password){
?>

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
                                <img border="0" src="images/prodotti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione prodotti  modifica
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>  <br><center>
<a href="sel_prodotti.php">Prodotti</a> <b>Modifica prodotto</b> <br>


<?
$obj->connessione();
$dati=mysql_query("select * from prodotti where id='$idp'");
while($array=mysql_fetch_array($dati)){
$codice=$array[codice];
$descrizione=$array[descrizione];
$breve=$array[breve];
$prezzo=$array[prezzo];
$nome=$array[nome];
$giacenza=$array[giacenza];
$peso=$array[peso];
$spedsep=$array[spedizionesep];
$riordino=$array[riordino];
$sconto=$array[sconto];
$ishome=$array[ishome];
$isofferta=$array[isofferta];
$isnovita=$array[isnovita];
$marca=$array[marca];
$idcat=$array[idcat];
$idsottocat=$array[idsottocat];
}
?>

<? if($_POST['op']=="ins"){
$categoria=$_POST['categoria'];
$pezzi=explode("|",$categoria);
$idcat=$pezzi[0];
$idsottocat=$pezzi[1];
$idx=$_POST['idx'];
$codice=$_POST['codice'];
$marca=$_POST['marca'];
$descrizione=$_POST['rte1'];
$breve=$_POST['breve'];
$thumb=$_POST['thumb'];
$prezzo=$_POST['prezzo'];
$nome=$_POST['nomeprod'];
$giacenza=$_POST['giacenza'];
$isofferta=$_POST['isofferta'];
$peso=$_POST['peso'];
$spedizionesep=$_POST['spedsep'];
$iva=$_POST['iva'];
$riordino=$_POST['riordino'];
$sconto=$_POST['sconto'];
$ishome=$_POST['home'];
$isofferta=$_POST['isofferta'];
$isnovita=$_POST['isnovita'];

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("update prodotti set breve='$breve',codice='$codice',descrizione='$descrizione',prezzo='$prezzo',nome='$nome',giacenza='$giacenza',peso='$peso',spedizionesep='$spedizioneseo',riordino='$riordino',sconto='$sconto',ishome='$ishome',marca='$marca',isofferta='$isofferta',isnovita='$isnovita',idcat='$idcat',idsottocat='$idsottocat' where id='$idx'");
if($dati) {
echo "modificato correttamente";
}
else echo "non modificato";

}
?>

<br>

<form method="post" action="mod_prodotti.php">
<input type="hidden" name="op" value="ins">
<input type="hidden" name="idx" value="<?echo $idp;?>">
<table border="0" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold">
        <input type="hidden" name="id" value="">
        <tr>
                <td width="50%" align="right">Nome:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "nomeprod" value = "<?echo $nome;?>" style="">

</td>
        </tr>
                <tr>
                <td width="50%" align="right">Codice:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "codice" value = "<?echo $codice;?>" style="">

</td>
        </tr>
                        <tr>
                <td width="50%" align="right">Marca:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "marca" value = "<?echo $marca;?>" style="">

</td>
        </tr>
        <tr>
                <td align="right">Peso(grammi):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "peso" value = "<?echo $peso;?>" style="">
</td>
        </tr>
                <tr>
                <td align="right">Categoria: <?echo "".$idcat.">".$idsottocat?></td>
                <td align="left"><SELECT size = "1" name = "categoria" style="">
<?
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from sottocategorie order by idcat");
while($array=mysql_fetch_array($dati)){
echo"confronta $array[idcat] $idcat e $array[id] $idsottocat";
if($array[idcat]==$idcat && $array[id]==$idsottocat)echo "<option value=\"$array[idcat]|$array[id]\" selected>".nomecat($array[idcat])." -> $array[nome]</option>";
else echo "<option value=\"$array[idcat]|$array[id]\">".nomecat($array[idcat])." -> $array[nome]</option>";
}
?>
</SELECT>
</td>
        </tr>
      <!--  <tr>
                <td align="right">Spedizione separata(€):</td>

                <td align="left"><INPUT TYPE="text" size = "10" name = "spedsep" value = "<?echo $spedsep;?>" style="">
</td>
        </tr>  -->
        <tr>
                <td align="right">Prezzo(€):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "prezzo" value = "<?echo $prezzo;?>" style="">
</td>
        </tr>
        <tr>
                <td align="right">Sconto(%):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "sconto" value = "<?echo $sconto;?>" style="">
</td>
        </tr>
        <tr>
                <td align="right">Giacenza:</td>

                <td align="left"><INPUT TYPE="text" size = "10" name = "giacenza" value = "<?echo $giacenza;?>" style="">
</td>
        </tr>
        <tr>
                <td align="right">Livello di riordino:</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "riordino" value = "<?echo $riordino;?>" style="">
</td>
        </tr>
        <tr>

                <td align="right">Homepage:</td>
                <td align="left"><INPUT type="CheckBox" name="home" <?if($ishome==1)echo"checked";?> value="1" style="border-width: 0">
</td>
        </tr>
           <tr>

                <td align="right">Novita:</td>
                <td align="left"><INPUT type="CheckBox" name="isnovita" <?if($isnovita==1)echo"checked";?> value="1" style="border-width: 0">
</td>
        </tr>
                <tr>

                <td align="right">Offerta:</td>
                <td align="left"><INPUT type="CheckBox" name="isofferta" <?if($isofferta==1)echo"checked";?> value="1" style="border-width: 0">
</td>
        </tr>

                <tr>

                <td align="right" colspan="2">Descrizione breve max 255 car:<br>
                <textarea rows=10 cols=70 name="breve"><?echo $breve;?></textarea>

</td>
        </tr>

        <tr>

                <td align="left" colspan="2">
                        Descrizione completa:<br>
<!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
               tinyMCE.init({
                mode : "textareas",
                theme : "simple"
        });
</script>
        <textarea id="rte1" name="rte1" rows="30" cols="90" style="width: 100%"><?echo $descrizione;?></textarea>
                </td>
        </tr>
        <tr>

                <td align="right"><INPUT type="submit" value="Invia" id=submit1 name=submit1>&nbsp;</td>
        </tr>
        </table>

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


function nomecat($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select nome from categorie where id='$id'");
while($array=mysql_fetch_array($dati)){
return $array[nome];
}
}
?>