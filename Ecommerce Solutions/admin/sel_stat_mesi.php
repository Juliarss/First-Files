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

<?if($temput==$obj->user){if($temppass==$obj->password){

$mese=$_GET['mese'];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
<title>Cms admin</title>
<link href="images/stile.css" rel="stylesheet">
</head>

<body>

          <div align="center">

                 <p>
<?
$anno=date("Y");
?>

Grafico mese <?echo $mese;?> anno <?echo $anno;?><br><br>
<?
$a=ritornavalori2('1',$mese,$anno);
$b=ritornavalori2('2',$mese,$anno);
$c=ritornavalori2('3',$mese,$anno);
$d=ritornavalori2('4',$mese,$anno);
$e=ritornavalori2('5',$mese,$anno);
$f=ritornavalori2('6',$mese,$anno);
$g=ritornavalori2('7',$mese,$anno);
$h=ritornavalori2('8',$mese,$anno);
$i=ritornavalori2('9',$mese,$anno);
$l=ritornavalori2('10',$mese,$anno);
$m=ritornavalori2('11',$mese,$anno);
$n=ritornavalori2('12',$mese,$anno);
$o=ritornavalori2('13',$mese,$anno);
$p=ritornavalori2('14',$mese,$anno);
$q=ritornavalori2('15',$mese,$anno);
$r=ritornavalori2('16',$mese,$anno);
$s=ritornavalori2('17',$mese,$anno);
$t=ritornavalori2('18',$mese,$anno);
$u=ritornavalori2('19',$mese,$anno);
$v=ritornavalori2('20',$mese,$anno);
$z=ritornavalori2('21',$mese,$anno);
$x=ritornavalori2('22',$mese,$anno);
$w=ritornavalori2('23',$mese,$anno);
$k=ritornavalori2('24',$mese,$anno);
$j=ritornavalori2('25',$mese,$anno);
$y=ritornavalori2('26',$mese,$anno);
$a1=ritornavalori2('27',$mese,$anno);
$a2=ritornavalori2('28',$mese,$anno);
$a3=ritornavalori2('29',$mese,$anno);
$a4=ritornavalori2('30',$mese,$anno);
$a5=ritornavalori2('31',$mese,$anno);
?>

<img src="disegnabarre.php?uno=<?echo"$a,$b,$c,$d,$e,$f,$g,$h,$i,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$z,$x,$w,$k,$j,$y,$a1,$a2,$a3,$a4,$a5";?>&due=01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31">

<br><br>
<a href="sel_stat.php">Indietro</a>
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
function ritornavalori2($giorno,$mese,$anno){
$obj=new sast1com();
$query="select data,visite as numero from visite where SUBSTRING(data,1,2)='$giorno' and  SUBSTRING(data,4,2)='$mese' and SUBSTRING(data,7,10)='$anno'";   //stato='1' and
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