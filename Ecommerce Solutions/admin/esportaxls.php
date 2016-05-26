<?
header("Content-disposition: filename=dati.xls");
header("Content-type: application/octetstream");
header("Pragma: no-cache");
header("Expires: 0");

$dati=$_GET['dati'];
echo $dati;

?>