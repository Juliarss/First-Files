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

$id=$_GET['id'];
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];

// elimina tags dannosi
$id=strip_tags($id);
// rimove escaped spazio
$id=str_replace("%20","",$id);
// aggiunge lo slashe
$id=addslashes($id);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?echo nomesito();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="html/b/styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
  <table width="760" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top"><img src="images/<?echo logosito();?>" border=0> </td>
      <td align="left" valign="top"> <?  include("topmenu.php");    ?></td>
              </tr>
    <tr>
      <td colspan="2" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top"><table width="100%"  border="0" cellspacing="1" cellpadding="2">
 <?  include("lateralmenu.php");    ?>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="98%"  border="0" cellspacing="1" cellpadding="2">
                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Carrello</td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text"><p>Carrello <a href="carrello.php">Vedi</a> o <a href="carrello.php?action=empty">Svuota</a></p></td>
                </tr>
                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Categorie</td>
                </tr>


                  <?
                               $obj->connessione();
                               $dati=mysql_query("select * from categorie order by nome");
                               while($array=mysql_fetch_array($dati)){
                               echo"<tr><td height=\"20\" class=\"subtitle\"><a href=\"categorie.php?cat=$array[id]\">$array[nome]</a></td></tr>" ;
                               }
                               $obj->disconnessione();
                  ?>

                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Novita</td>
                </tr>

                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from prodotti where isnovita=1  limit 3");
                               while($array=mysql_fetch_array($dati)){
                               echo"<tr><td height=\"20\" class=\"subtitle\">";
                                if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
                                else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";
                               echo"<a href=\"dettaglio.php?id=$array[id]\">$array[nome]</a></a><br>" ;
                               echo $array[breve]."<br>";
                               if(isb2b()==1)echo"<strong>$array[prezzo]</strong> euro<br></td></tr>";
                               }
                        ?>
                <tr>
                  <td height="20" align="left" valign="top" class="subtitle"><img src="images/bancasella_visa.gif" border=0> </td>
                </tr>




              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="98%"  border="0" cellspacing="1" cellpadding="2">
              </table></td>
            </tr>
          </table></td>
          <td width="555" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="222" align="right" valign="bottom" class="top"><table width="300"  border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td align="right" valign="top" class="whitetext"><?echo nomesito();?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="1" align="left" valign="middle" bgcolor="#FFFFFF" class="largetitle"></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text"> <br />
                   <form method="post" action="cerca.php">
                                <p>Cerca articoli: <input type="text" name="search" class="search" /> <input type="submit" value="Cerca" class="submit" /></p>
                   </form>
                    <br>

        <?
       $obj->connessione();
       $dati=mysql_query("select * from altrepagine where id=$id");
       while($array=mysql_fetch_array($dati)){
       echo"<a></a><br><h3>$array[nome]</h3>$array[contenuto]<br>" ;
       }
       ?>

<br><br>
                        <form name="form" action="newsletter.php" method="post">
                        <b>Newsletter:</b>
                        <input type="text" name="email" size="25"> <input type="submit" value="ok">
                        </form>
   </td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="4" colspan="2" align="center" valign="top">  <p><?include("footer.php");?></p> </td>
    </tr>
  </table>
</center>
</body>
</html>
