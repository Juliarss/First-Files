<? include("config.php");
require_once "faucart.lib.php";
include("funzioni.php");

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

$nu=$_POST['nu'];
$ps=$_POST['ps'];

// elimina tags dannosi
$nu=strip_tags($nu);
// rimove escaped spazio
$nu=str_replace("%20","",$nu);
// aggiunge lo slashe
$nu=addslashes($nu);

// elimina tags dannosi
$ps=strip_tags($ps);
// rimove escaped spazio
$ps=str_replace("%20","",$ps);
// aggiunge lo slashe
$ps=addslashes($ps);

$obj=new sast1com();
$obj->connessione();
$query="select * from utenti where user='$nu' and password='$ps' limit 1";
$dati=mysql_query($query);
while($array=mysql_fetch_array($dati)){
    $temput=$nu;
    $temppass=$ps;

    $_SESSION['temput']=$temput;
    $_SESSION['temppass']=$temppass;

    //session_register("temput");
    //session_register("temppass");

                       echo"<script language=javascript>";
                       echo"document.location.href='ordini.php'";
                       echo"</script>";
}
?>
        <form action="valida.php" method="post">
         <table>
         <tr><td>Username</td><td><input type="text" name="nu"></td></tr>
         <tr><td>Password</td><td><input type="text" name="ps"></td></tr>
         </table> <br>
         <input type="submit" value="Login">
         </form> <br>