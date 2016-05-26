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
$id=$_GET['id'];
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

<? if($_POST['op']=="ins"){

$fname1 = $_FILES['percorso']['name'];
if (move_uploaded_file($_FILES['percorso']['tmp_name'], "../uploads/$fname1")){
echo "<script>alert('Backup allegato correttamente');</script>";
echo "<b>$fname1</b> successo \r\n";
}
else{
echo "<script>alert('Non è stata inserito per motivi tecnici');</script>";
}

$fp=fopen("../uploads/$fname1","r");
$conta=1;
$testo="";
while (!feof($fp)) {
$buffer = fgets($fp, 4096);
$testo.=$buffer."";
//$testo = mysql_escape_string($testo);
$conta++;
}
fclose ($fp);

//$testo = mysql_escape_string($testo);

//elimina vecchi dati

  $obj->connessione();
  $query  = "SHOW TABLES";
$result = mysql_query($query);
   $nr = mysql_num_rows($result);
   if ( $nr > 0 )
        {
        $pointer++;
        //print "<table columns=\"2\">";
        while ( $row = mysql_fetch_array($result) )
                {
                $resultc = mysql_query("SELECT COUNT(*) FROM $row[0]");
                $cnt = mysql_fetch_array($resultc);
                $ntab=$row[0];
                $resultd = mysql_query("DROP TABLE $ntab");
                if($resultd)echo"Tabella $ntab eliminata <br>";
                }
        }


            $SQL = explode(";", $testo);
            $obj=new sast1com();
            $obj->connessione();

            //---- Drop all tables from DB
            $result = mysql_list_tables($obj->database);
            $not = mysql_num_rows($result);
            for ($i=0; $i<$not-1; $i++)
                {
                    $row = mysql_fetch_row($result);
                    $tables .= $row[0].",";
                }

            $row = mysql_fetch_row($result);
            $tables .= $row[0];
            if ($tables != "" || $tables != NULL)
                mysql_query("DROP TABLE ".$tables) or (die (mysql_error()));

            //---- And now execute the SQL statements from backup file.
            for ($i=0;$i<count($SQL)-1;$i++)
                {
                    mysql_unbuffered_query($SQL[$i]) or (die (mysql_error()));
                }

            echo "<strong>Ripristino eseguito</strong>";
}

?>
<br>

<strong>Ripristino dati</strong><br>
<?
echo"<form action=\"ripristino.php\" method=\"post\" enctype=\"multipart/form-data\">  " ;
echo"<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"200000000\">   " ;
echo"<table border=0 width=\"95%\">   " ;
echo"<input type=\"hidden\" name=\"op\" value=\"ins\">" ;
echo"<tr><td>File di backup</td><td><input type=\"file\" name=\"percorso\" size=\"40\"></td></tr> " ;
echo"</table>" ;
echo"<input type=\"submit\" value=\"Ripristina\" onclick=\"return confirm('Ripristinando il cms, perderai tutti i dati fino ad ora memorizzati. Vuoi procedere?')\">" ;
echo"</form>" ;
?>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>