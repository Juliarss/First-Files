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

<?if($temput==$obj->user){if($temppass==$obj->password){ ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<link href="images/stile.css" rel="stylesheet">
<title>Cms admin</title>
</head>

<body>

          <div align="center">
                 <p>

<?
$mese=$_GET['mese'];
$anno=date("Y");


$a=ritornavalori2('01',$anno);
$b=ritornavalori2('02',$anno);
$c=ritornavalori2('03',$anno);
$d=ritornavalori2('04',$anno);
$e=ritornavalori2('05',$anno);
$f=ritornavalori2('06',$anno);
$g=ritornavalori2('07',$anno);
$h=ritornavalori2('08',$anno);
$i=ritornavalori2('09',$anno);
$l=ritornavalori2('10',$anno);
$m=ritornavalori2('11',$anno);
$n=ritornavalori2('12',$anno);
?>
Grafico anno <?echo $anno;?> visite  <br><br>
<!-- disegna barre -->
<img src="disegnabarre.php?uno=<?echo"$a,$b,$c,$d,$e,$f,$g,$h,$i,$l,$m,$n";?>&due=01,02,03,04,05,06,07,08,09,10,11,12">
<br><br>
Seleziona per mese:
<?
for($j=1;$j<=12;$j++){
if(strlen($j)==1)$k="0".$j;
else $k=$j;
echo"<a href=\"sel_stat_mesi.php?mese=$k\">$k</a> ";
}
?>
 </p>

</div>

</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>


<?
function ritornavalori2($mese,$anno){
$obj=new sast1com();
$query="select data,visite as numero from visite where SUBSTRING(data,4,2)='$mese' and SUBSTRING(data,7,10)='$anno'";   //stato='1' and
$obj->connessione();
$dati=mysql_query($query);
$tot=mysql_num_rows($dati);
if($tot>0){
while($array=mysql_fetch_array($dati)){
$a=$array[numero];
return $a;
}
}else return 0;
}
?>