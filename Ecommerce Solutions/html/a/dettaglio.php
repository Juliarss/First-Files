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

$obj->connessione();
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];
$id=$_GET['id'];

// elimina tags dannosi
$id=strip_tags($id);
// rimove escaped spazio
$id=str_replace("%20","",$id);
// aggiunge lo slashe
$id=addslashes($id);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta name="author" content="Luka Cvrk (www.solucija.com)" />
        <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" href="html/a/images/style.css" type="text/css" />
         <link rel="stylesheet" type="text/css" href="tabcontent.css" />
         <script type="text/javascript" src="tabcontent.js"></script>
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
                        <div class="left_box">

<form action="carrello.php" method="get">

<?
$dati=mysql_query("select * from prodotti where id='$id'");
$i=1;
while($array=mysql_fetch_array($dati)){
echo"<h3>Info: $array[nome]</h3>";
echo"<table width=\"95%\"><tr><td>";
if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";
echo"</td>";
       if(iscarrello()==1){
       echo"<td align=\"right\">";
              echo"<h2>$array[prezzo] euro</h2>";
              if($array[giacenza]>0)echo"<input type=\"image\" src=\"images/addcarrello.gif\">";
              else echo"<strong>Prodotto non disponibile</strong>";
       echo"</td>";
       }
echo"</tr></table>";
}
?>
<br>

<ul id="maintab" class="shadetabs">
<li class="selected"><a href="#" rel="tcontent1">Informazioni</a>
</li>
<li><a href="#" rel="tcontent2">Varianti</a></li>
<li><a href="#" rel="tcontent3">Immagini</a></li>
<li><a href="#" rel="tcontent4">Prodotti correlati</a></li>
<li><a href="#" rel="tcontent5">File correlati</a></li>
</ul>

<div class="tabcontentstyle">

<div id="tcontent1" class="tabcontent">

<?
$dati=mysql_query("select * from prodotti where id='$id'");
$i=1;
while($array=mysql_fetch_array($dati)){
echo"$array[nome]<br>";
echo"<input type=\"hidden\" value=\"$id\" name=\"id\">";
echo"<input type=\"hidden\" value=\"add\" name=\"action\">";
if(isb2b()==1){echo"<strong>$array[prezzo]</strong> euro<br>";}
if($array[sconto]>0)echo"Sconto: <strong>$array[sconto]</strong> %<br>";
echo "Codice: $array[codice]<br><br><br>";
echo "$array[descrizione]";
}
?>
</div>
<div id="tcontent2" class="tabcontent">
<?
$i=1;

$dati=mysql_query("select * from taglie where idp='$id'");
$n=mysql_num_rows($dati);
if($n>0)echo"Taglie: ";
while($array=mysql_fetch_array($dati)){
echo "<input type=\"radio\" name=\"taglie\" value=\"$array[nome]\"";
if($i==1)echo" checked ";
echo"> <strong>$array[nome]</strong>";$i++;
}
?>
<br>
<?
$j=1;
$dati=mysql_query("select * from colori where idp='$id'");
$m=mysql_num_rows($dati);
if($m>0)echo"Colori: ";
while($array=mysql_fetch_array($dati)){
echo "<input type=\"radio\" name=\"colori\" value=\"$array[nome]\"";
if($j==1)echo" checked ";
echo"> <strong>$array[nome]</strong>";
$j++;
}
?>
</div>

<div id="tcontent3" class="tabcontent">
<?
//immagini
$dati=mysql_query("select * from immagini where idp='$id'");
$i=1;
while($array=mysql_fetch_array($dati)){
echo"<a href=\"uploads/$array[percorso]\" target=\"_blank\"><img src=\"uploads/$array[percorso]\" border=\"0\" width=\"200\"></a>&nbsp;";
}
?>
<br>
</div>

<div id="tcontent4" class="tabcontent">
<?
$dati=mysql_query("select * from prodotticorrelati where idp1='$id'");
$i=1;
while($array=mysql_fetch_array($dati)){
correlati($array[idp2]);
}
?>
</div>

<div id="tcontent5" class="tabcontent">
<?
$dati=mysql_query("select * from allegati where idp='$id'");
$i=1;
while($array=mysql_fetch_array($dati)){
allegati($array[idp]);
}
?>
</div>

</div>

<script type="text/javascript">
//Start Tab Content script for UL with id="maintab" Separate multiple ids each with a comma.
initializetabcontent("maintab")
</script>

<br>

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
                               echo "".substr($array[descrizione],0,200)."<br>";
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

<?
function correlati($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from prodotti where id='$id'");

while($array=mysql_fetch_array($dati)){
if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";

echo"<a href=\"dettaglio.php?id=$array[id]\"><strong>$array[nome]</strong></a><br>";
echo $array[breve]."<br>";
if(isb2b()==1)echo"<strong>$array[prezzo]</strong> euro<br>";
//echo"<br><img src=\"images/carrello.gif\" border=0><a href=\"carrello.php?id=$array[id]&action=add\">Aggiungi al carrello</a><br>";
}
}

function allegati($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from allegati where idp='$id'");

while($array=mysql_fetch_array($dati)){
echo"<a href=\"uploads/$array[percorso]\"><strong>$array[percorso]</strong></a><br>";
}
}
?>