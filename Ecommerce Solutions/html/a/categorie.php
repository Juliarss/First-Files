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

$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];
$cat=$_GET['cat'];
$minimo=$_GET['minimo'];

// elimina tags dannosi
$cat=strip_tags($cat);
// rimove escaped spazio
$cat=str_replace("%20","",$cat);
// aggiunge lo slashe
$cat=addslashes($cat);

// elimina tags dannosi
$minimo=strip_tags($minimo);
// rimove escaped spazio
$minimo=str_replace("%20","",$minimo);
// aggiunge lo slashe
$minimo=addslashes($minimo);
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
                        <h3>Prodotti categoria <?echo $cat;?></h3>
                        <div class="left_box">
             <?
        $obj->connessione();
        $result = mysql_query("select * from prodotti where idcat='$cat'");
        $totali=mysql_num_rows($result);
        echo"Trovati <strong>$totali</strong> prodotti<br>";
        ?>


                                <?
$numperpag=16;
$numresults = mysql_query("select * from prodotti where idcat='$cat'");
$numrows = mysql_num_rows($numresults);
if (empty( $minimo)){
$minimo = 0;
}
?>


                                                <?
echo "<table border=\"0\" width=\"100%\" class=\"piccolo\">";

$indice=1;
$perriga=3; //numero colonne per riga

echo "<tr>\n";
$dati=mysql_query("select * from prodotti where idcat='$cat' order by id desc limit $minimo,$numperpag");
$i=1;
while($array=mysql_fetch_array($dati)){


if($indice<=$perriga){
echo"<td width=\"33%\" valign=\"top\">";

if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";

echo"<a href=\"dettaglio.php?id=$array[id]\"><strong>$array[nome]</strong></a><br>";
echo $array[breve]."<br>";
if(isb2b()==1){echo"<strong>$array[prezzo]</strong> euro<br>";
if($array[sconto]>0)echo"Sconto: <strong>$array[sconto]</strong> %<br>";
}
//echo"<br><img src=\"images/carrello.gif\" border=0><a href=\"carrello.php?id=$array[id]&action=add\">Aggiungi al carrello</a><br>";

echo"</td>";$indice++;
}
else{
echo "</tr>\n<tr>\n";
echo"<td width=\"33%\" valign=\"top\">";

if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";

echo"<a href=\"dettaglio.php?id=$array[id]\"><strong>$array[nome]</strong></a><br>";
echo $array[breve]."<br>";
if(isb2b()==1){echo"<strong>$array[prezzo]</strong> euro<br>";
if($array[sconto]>0)echo"Sconto: <strong>$array[sconto]</strong> %<br>";
}
//echo"<br><img src=\"images/carrello.gif\" border=0><a href=\"carrello.php?id=$array[id]&action=add\">Aggiungi al carrello</a><br>";


echo"</td>";
$indice=1;
$indice++;
}

$i++;

}
echo "</tr></table>";
?>
<br>
<?
if ( $minimo >= 3){
$prevoffset = $minimo - $numperpag;
print "<a href=\"categorie.php?minimo=$prevoffset&cat=$cat\">PREV</a>&nbsp;\n";
}

$pages = intval( $numrows / $numperpag);
if ( $pages < ( $numrows / $numperpag)){
$pages = ( $pages + 1);
}

for ( $i = 1; $i <= $pages; $i++){
$nuovominimo = $numperpag * ( $i-1);
if ( $nuovominimo == $minimo){
print "$i&nbsp;\n";
}else{
print "<a href=\"categorie.php?minimo=$nuovominimo&cat=$cat\">$i</a>&nbsp;\n";
}
}

if ( ! ( ( $minimo / $numperpag) == ( $pages - 1)) && ( $pages != 1)){
$nuovominimo = $minimo + $numperpag;
print "<a href=\"categorie.php?minimo=$nuovominimo&cat=$cat\">NEXT</a><p>\n";
}
?>
         </div>
         </div>

                <div class="right">
                        <h3>Categorie:</h3>
                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from categorie order by nome");
                               while($array=mysql_fetch_array($dati)){
                               echo"<div class=\"right_articles\"><a href=\"categorie.php?cat=$array[id]\"><strong>$array[nome]</strong></a></div>" ;
                                   $obj->connessione();
                                   $dati2=mysql_query("select * from sottocategorie where idcat=$array[id]");
                                   while($array2=mysql_fetch_array($dati2)){
                                   if($array2[idcat]==$cat)
                                   echo"<div class=\"right_articles\">- <a href=\"sottocategorie.php?sottocat=$array2[id]&id=$array[id]\">$array2[nome]</a></div>" ;
                                   }

                               }
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
                        <input type="text" name="email" size="25"> <input type="submit" value="ok">
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