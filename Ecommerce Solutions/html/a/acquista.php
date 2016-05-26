<?
################################################
# Faucart Demo 2
# by Fausto Iannuzzi - 2005 - free to use
################################################

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

session_start();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];

$sp=$_GET["sp"];


$cart_object->total();
$total = $cart_object->_total;
$cart_items = $cart_object->getItems();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta name="author" content="Luka Cvrk (www.solucija.com)" />
        <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" href="html/a/images/style.css" type="text/css" />
        <title><?echo nomesito();?></title>
</head>
<body>
        <div class="content">
                <div class="header">
                        <div class="top_info">
                        </div>
                        <div class="logo">
                                <img src="images/<?echo logosito();?>" border=0> <a href="index.php" title="<?echo nomesito();?>"><span class="dark"><?echo nomesito();?></span></a>
                        </div>
                </div>

                <div class="bar">
                        <?include("topmenu.php");?>
                </div>
                <div class="search_field">
                        <form method="post" action="?">
                                <div class="search_form">
                                <p>Cerca articoli: <input type="text" name="search" class="search" /> <input type="submit" value="Cerca" class="submit" /></p>
                                </div>
                        </form>

                        <p>Carrello <a href="carrello.php">Vedi</a> o <a href="carrello.php?action=empty">Svuota</a></p>
                </div>

                <div class="left">
         <div class="left_box">
              <h3>Acquista</h3>

        <?
if($_GET['op']=="fine"){

//+************ inserisce nel db +**********

$today = date("j F Y g:i a");
$spedizioni= $_POST['spedizioni'];
$pagamenti= $_POST['pagamenti'];
$prezzofinale= $_POST['prezzofinale'];
$note= $_POST['note'];

$obj->connessione();
$result = mysql_query("insert into ordini(user,dataora,stato,pagamento,spedizione,note) values('$temput','$today','0','$pagamenti','$spedizioni','$note')");
if($result)echo"Il tuo ordine e' stato inserito nei nostri archivi<br>";
else echo"ERRORE ordini".mysql_error()."<br>";

$transazione=mysql_insert_id();

foreach ($cart_items as $cart_item) {
$obj->connessione();
$result = mysql_query("insert into prodottiordini(transazione,idp,taglia,colore,quantita,prezzo) values('$transazione','$cart_item->itemid','$cart_item->taglie','$cart_item->colori','$cart_item->quantity','$cart_item->price')");
//if($result)echo"Ok pordini<br>";
//else echo"ERRORE pordini".mysql_error()."<br>";

//decrementa
$resultss = mysql_query("update prodotti set giacenza=giacenza-$cart_item->quantity where id='$cart_item->itemid'");

}

//+************ ins nel db +**********

$prezzofinale=str_replace(".",",",$prezzofinale);

//+************ invia mail +**********

$emailgenerico="nuovoacquisto@sitoecommerce.it";
$email=emailsito();
$oggetto="Nuovo acquisto dal sito transazione: $transazione";
$testo="Nuovo acquisto\n\n";
$testo.="Ordine\n\n";
  foreach ($cart_items as $cart_item) {
    $testo.="";
    $testo.=" Nome: ".$cart_item->name."\n";
    //$testo.=" Descrizione: ".$cart_item->description."\n";
    $testo.=" Quantita: ".$cart_item->quantity."\n";
    $testo.=" Colore: ".$cart_item->colori."\n";
    $testo.=" Taglia: ".$cart_item->taglie."\n";
    $testo.=" Prezzo: ".$cart_item->price." €\n";
    $testo.="\n\n";
  }
$testo.="Pagamenti: $pagamenti\n";
$testo.="Spedizione: $spedizioni\n";
if(mail($email,$oggetto,$testo,"From: ".$emailgenerico."")) {}//{echo "La mail [$oggetto] stata inoltrata con successo a [$email]";}
//else {echo "Si sono verificati dei problemi nell'invio della mail.";}
//echo"<br><br>";
$emailx=tormamailutente($temput);
if(@mail($emailx,$oggetto,$testo,"From: $temput ".$email."")) {}//{echo "La mail [$oggetto] stata inoltrata con successo a [$emailx]";}
//else {echo "Si sono verificati dei problemi nell'invio della mail.";}
//echo"<br><br>";

//+************ invia mail +**********

//+************ mostra a video il risultato +**********

$obj->connessione();
$dati=mysql_query("select * from pagamenti where id=1");
while($array=mysql_fetch_array($dati)){
$infbon=$array[infobonifico];
$infvag=$array[infovaglia];
$infcontr=$array[infocontrassegno];
}

if($pagamenti=="contrassegno"){echo"Hai scelto di pagare con contrassegno<br>$infbon";}
if($pagamenti=="vaglia"){echo"Hai scelto di pagare con vaglia<br>$infvag";}
if($pagamenti=="bonifico"){echo" Hai scelto di pagare con  bonifico<br>$infcontr";}
//vede se paypal
if($pagamenti=="paypal"){
echo"Hai scelto di pagare con paypal<br>";
$paypalemail=paypal();
$nomesito= nomesito();
echo"<form name=\"_xclick\" action=\"https://www.paypal.com/it/cgi-bin/webscr\" method=\"post\">";
echo"<input type=\"image\" src=\"http://www.paypal.com/it_IT/i/btn/x-click-but01.gif\" border=\"0\" name=\"submit\" alt=\"Effettua i tuoi pagamenti con PayPal. È un sistema rapido, gratuito e sicuro.\">";
echo"<input type=\"hidden\" name=\"cmd\" value=\"_xclick\"> ";
echo"<input type=\"hidden\" name=\"business\" value=\"$paypalemail\"> ";
echo"<input type=\"hidden\" name=\"item_name\" value=\"Acquisto prodotti $nomesito transazione:$transazione\"> ";
echo"<input type=\"hidden\" name=\"item_number\" value=\"Acquisto prodotti $nomesito transazione:$transazione\"> ";
echo"<input type=\"hidden\" name=\"page_style\" value=\"Primary\"> ";
echo"<input type=\"hidden\" name=\"no_shipping\" value=\"1\"> ";
echo"<input type=\"hidden\" name=\"currency_code\" value=\"EUR\">  ";
echo"<input type=\"hidden\" name=\"amount\" value=\"$prezzofinale\"> ";
echo"<input type=\"hidden\" name=\"return\" value=\"http://".$_SERVER['HTTP_HOST']."\"> ";
echo"<input type=\"hidden\" name=\"cancel_return\" value=\"http://".$_SERVER['HTTP_HOST']."\"> ";
echo"</form> ";
}

if($pagamenti=="credito"){
echo"Hai scelto di pagare con carta credito<br>";
$codice=codicecc();

require_once "GestPayCrypt.inc.php";
$objCrypt = new GestPayCrypt();

$myshoplogin = $codice; // Es. 9000001
$mycurrency = "242"; //Es. 242 per euro o 18 lira
$myamount = $prezzofinale; //"0.1"; // Es. 1256.28
$mylanguage= "1"; //Es. 3 per spagnolo

$myshoptransactionID=session_id();  //Es. "34az85ord19?
$mybuyername= $cognome." ".$nome; //"antonio lopez"; //Es. "Mario Bianchi"
$mybuyeremail= $emailx; //"pippo@hotmail.com"; // Es. "Mario.bianchi@isp.it"


$objCrypt->SetShopLogin($myshoplogin);
$objCrypt->SetCurrency($mycurrency);
$objCrypt->SetAmount($myamount);
$objCrypt->SetShopTransactionID($myshoptransactionID);

$objCrypt->Encrypt();

$ed=$objCrypt->GetErrorDescription();
if($ed!="")
{
echo "Errore di encoding: " . $objCrypt->GetErrorCode() . " " . $ed . "
";
}
else
{
$b = $objCrypt->GetEncryptedString();
$a = $objCrypt->GetShopLogin();
}

echo"Cliccare su OK per inviare i dati al server sicuro di Banca Sella<br><br>";
echo"<form action=\"https://ecomm.sella.it/gestpay/pagam.asp\">";
echo"<input name=\"a\" type=\"hidden\" value=\"$a\">";
echo"<input name=\"b\" type=\"hidden\" value=\"$b\">";
echo"<input type=\"submit\" value=\"Paga adesso con banca sella\" name=\"submit\">";
echo"</form>";

}

}
?>
<br>

<?if($_GET['op']!=="fine"){?>
<a href="carrello.php?sp=<?echo $sp;?>">Modifica spedizione</a> <br>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="3">
  <tr bgcolor="#cecece">
    <!--<td><span class="style11">.</span></td>-->
    <td><span class="style11">ID</span></td>
    <td><span class="style11">Nome</span></td>
    <td><span class="style11">Taglia</span></td>
    <td><span class="style11">Colore</span></td>
    <!--<td><span class="style11">Descrizione</span></td>  -->
    <td><span class="style11">Quantita</span></td>
    <td><span class="style11">Prezzo</span></td>
    <td><span class="style11">[actions]</span></td>
  </tr>
<?
$peso=0;
  foreach ($cart_items as $cart_item) {
    echo "<tr>";
    //echo " <td><span class='style2'><img src=images/".tornaimg($cart_item->name,$cart_item->colore)." width=100></span></td>";
    echo " <td><span class='style2'><a href=\"dettaglio.php?id=".$cart_item->itemid."\">".$cart_item->itemid."</a></span></td>";
    echo " <td><span class='style2'>".$cart_item->name."</span></td>";
    //echo " <td><span class='style2'>".substr($cart_item->description,0,100)."</span></td>";
    echo " <td><span class='style2'>".$cart_item->taglie."</span></td>";
    echo " <td><span class='style2'>".$cart_item->colori."</span></td>";
    echo " <td><span class='style2'>".$cart_item->quantity."</span></td>";
    echo " <td><span class='style2'>".$cart_item->price." €</span></td>";
    echo " <td><span class='style4'><a href='carrello.php?action=del&id=".$cart_item->object_id."'>[Rimuovi]</a></span></td>";
    echo "</tr>";
    $peso+=tornapeso($cart_item->name);
    $prezzoiva+=$cart_item->price*tornaiva($cart_item->itemid)/100;
  }
?>

<tr>
<td colspan="8"><strong>Tipo di pagamento</strong></td>
</tr>

<form action="acquista.php?op=fine&sp=<?echo $sp;?>" method="post">

  <tr>
<td colspan="8">

 <?
$obj->connessione();
       $dati=mysql_query("select * from pagamenti where id=1");
       while($array=mysql_fetch_array($dati)){
       if($array[bonifico]==1) echo"<input type=\"radio\" value=\"bonifico\" name=\"pagamenti\"> <strong>bonifico</strong><br>";
       //echo" $array[infobonifico]";
       if($array[vaglia]==1) echo"<input type=\"radio\" value=\"vaglia\" name=\"pagamenti\"> <strong>vaglia</strong><br>";
      // echo" $array[infovaglia]";
       if($array[contrassegno]==1) echo"<input type=\"radio\" value=\"contrassegno\" name=\"pagamenti\"> <strong>contrassegno</strong><br>";
      // echo" $array[infocontrassegno]";
       if($array[paypal]==1) echo"<input type=\"radio\" value=\"paypal\" name=\"pagamenti\"> <strong>paypal</strong>";
       echo" $array[emailpaypal]<br>";
       if($array[gestpay]==1) echo"<input type=\"radio\" value=\"credito\" name=\"pagamenti\"> <strong>carta di credito</strong>";
       echo" Sicuro banca sella<br>";
       }
       ?>
</td>
</tr>

<tr>
<td colspan="8"><strong>Tipo di spedizione:</strong>

<?
  $obj->connessione();
  $dati=mysql_query("select * from spedizioni where id=$sp");
  while($array=mysql_fetch_array($dati)){
    echo"<strong>$array[compagnia]</strong> $array[prezzo]<br>";
    echo"<input type=\"hidden\" name=\"spedizioni\" value=\"$array[compagnia]\">";
  }
?>

</td>
</tr>
  <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style14">Totale</span></td>
    <td> <span class="style12"><strong><? echo $total; ?> &euro; </strong></span></td>
    <td>&nbsp;</td>
  </tr>
    <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td><span class="style14">(Peso <?echo $peso;?> gr) Spedizione</span></td>
    <?$spedizione= tornaprezzop($sp,$total,$peso);?>
    <td> <span class="style12"><strong><? echo $spedizione; ?> &euro; </strong></span></td>
     <td>&nbsp;</td>
  </tr>
       <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style14">IVA</span></td>

    <td> <span class="style12"><strong><?echo $prezzoiva;?> &euro; </strong></span></td>
     <td>&nbsp;</td>
  </tr>
      <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td><span class="style14">Totale finale</span></td>
    <?$finale= $total+$spedizione;?>
    <td> <span class="style12"><strong><? echo $finale; ?> &euro; </strong></span></td>
     <td>&nbsp;</td>
  </tr>
</table>
<br>
<input type="hidden" value="<?echo $finale;?>" name="prezzofinale">
Note: <br><textarea rows=5 cols=50 name="note"></textarea>
<br>
<?if(strlen($temput)<=0 && strlen($temppass)<=0)echo"<a href=\"login.php\">Necessario il login</a>";?>
<?if(strlen($temput)>0 && strlen($temppass)>0)echo"<input type=\"submit\" value=\"Compra\">";?>
</form>
<?}?>
         </div>
                </div>
                <div class="right">
                        <h3>Categorie:</h3>
                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from categorie order by nome");
                               while($array=mysql_fetch_array($dati)){
                               echo"<div class=\"right_articles\"><a href=\"categorie.php?cat=$array[id]\">$array[nome]</a></div>" ;
                               }
                               $obj->disconnessione();
                        ?>
                        <br>
                         <?  include("lateralmenu.php");    ?>
                         <br>
                        <h3>Novita:</h3>
                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from prodotti where isnovita=1  limit 3");
                               while($array=mysql_fetch_array($dati)){
                                if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
                                else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";
                               echo"<a href=\"dettaglio.php?id=$array[id]\">$array[nome]</a></a><br>" ;
                               echo $array[breve]."<br>";
                               if(isb2b()==1)echo"<strong>$array[prezzo]</strong> euro<br>";
                               }
                               $obj->disconnessione();
                        ?>
                        <br>
                        <h3>Newsletter:</h3>
                        <form name="form" action="newsletter.php" method="post">
                        <b>Tua e-mail:</b>
                        <input type="text" name="email" size="25"><input type="submit" value="ok">
                        </form>
                        <br>
                        <img src="images/bancasella_visa.gif" border=0>
                </div>
                <div class="footer">
                                         <p><?include("footer.php");?></p>
                </div>
        </div>
</body>
</html>

<? toSession(); ?>