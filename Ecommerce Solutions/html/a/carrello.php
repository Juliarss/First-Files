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
$obj=new sast1com();

$action = $_GET["action"];
$id=$_GET["id"];
$sp=$_GET["sp"];
$taglie=$_GET["taglie"];
$colori=$_GET["colori"];

switch ($action) {
case "empty":
  $cart_object->emptyCart();
  break;
case "add":
     $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select * from prodotti where id='$id'");
     while($array=mysql_fetch_array($result)){
        $codice=$array[codice];
        $descrizione=$array[descrizione];
        $prezzo=$array[prezzo];
        //$colore=$array[colore];
        $nome=$array[nome];
        $codice=$nome;
     }
     $cart_object->addItem(new faucartelement($id,$codice,$descrizione,$prezzo,$colori,$taglie));
     break;
case "del":
   $cart_object->delItemByObjectID($_GET["id"]);
   break;
}

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

        <script>
function checkCart(action) {
 top.location.href = 'carrello.php?action='+action;
}
</script>
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
                        <?  include("topmenu.php");    ?>
                </div>
                <div class="search_field">
                        <form method="post" action="cerca.php">
                                <div class="search_form">
                                <p>Cerca articoli: <input type="text" name="search" class="search" /> <input type="submit" value="Cerca" class="submit" /></p>
                                </div>
                        </form>

                        <p>Carrello <a href="carrello.php">Vedi</a> o <a href="carrello.php?action=empty">Svuota</a></p>
                </div>

                <div class="left">
                        <h3>Carrello</h3>
                        <div class="left_box">
<form name=cart action='carrello.php' method='get'>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="3">
  <tr bgcolor="#cecece">
    <!--<td><span class="style11">.</span></td> -->
    <td><span class="style11">ID</span></td>
    <td><span class="style11">Nome</span></td>
   <!-- <td><span class="style11">Codice</span></td> -->
   <!-- <td><span class="style11">Descrizione</span></td>  -->
    <td><span class="style11">Taglia</span></td>
    <td><span class="style11">Colore</span></td>
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
    //echo " <td><span class='style2'><a href=\"dettaglio.php?id=".$cart_item->codice."\">".$cart_item->name."</a></span></td>";
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
<td colspan="5"><strong>Seleziona il tipo di spedizione</strong></td>
</tr>
  <tr>
<td colspan="5">


 <?
$obj->connessione();
       $dati=mysql_query("select * from spedizioni");
       while($array=mysql_fetch_array($dati)){
       echo"<input type=\"radio\" value=\"$array[id]\"";
       if($sp==$array[id])echo" checked ";
       echo"name=\"spedizioni\" onclick=\"javascript:location.href='carrello.php?sp=$array[id]';\"><strong>$array[compagnia]</strong>  $array[prezzo] ";if($array[peso]>0)echo"fino a: $array[peso] kg";echo"<br>";
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
    <td><span class="style14">Spedizione</span></td>
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
  <tr>
    <td colspan="5"><div align="center">
      <input type="button" name="Submit" value="Svuota" onClick="checkCart('empty');">
      &nbsp;
      <input type="button" name="Submit" value="Continua" onClick="location.href='acquista.php?sp=<?echo $sp;?>';">

    </div></td>
  </tr>
</table>
</form>
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