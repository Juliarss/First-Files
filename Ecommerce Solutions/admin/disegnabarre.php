<?
header("Content-type: image/png");
$uno=$_GET['uno'];
$due=$_GET['due'];
$valori = array("0");
$valori_testo = array("nessuno");
$pezziuno = explode(",",$uno);
$pezzidue = explode(",",$due);
for($i=0;$i<count($pezziuno);$i++) {
array_push($valori,$pezziuno[$i]);
}
for($i=0;$i<count($pezzidue);$i++) {
array_push($valori_testo,$pezzidue[$i]);
}
$dimW=count($valori)*30;
$barraW=15;
$dimH=max($valori)+100;
$font = 'georgia.ttf';
//crea l’iimagine
$image=imagecreate($dimW,$dimH);
//crea i colori
//$sfondo=imagecolorallocate($image,232,228,211);
$bianco=imagecolorallocate($image,255,255,255);
$grigiodx=imagecolorallocate($image,136,140,144);
$grigiosx=imagecolorallocate($image,201,206,211);
$grigioscuro=imagecolorallocate($image,171,176,181);
$nero=imagecolorallocate($image,0,0,0);
$blu=imagecolorallocate($image,0,0,255);
$rosso=imagecolorallocate($image,255,0,0);
//disegna linea ascissa,ordinata
imageline($image,30,0,30,$dimH-41,$nero);
imageline($image,30,$dimH-41,$dimW,$dimH-41,$nero);
//Add the text a sx
for($i=0;$i<$dimH;$i=$i+20) {
if($i>20){
imagettftext($image, 10, 0, 3, $dimH-$i, $nero, $font, $i-40);
imageline($image,31,$dimH-$i,$dimW,$dimH-$i,$grigiosx); //disegna linea orizzontale
}
}
// Add the text in basso
for($i=1;$i<count($valori);$i++) {
imagettftext($image, 10, 0, $i*20+20, $dimH-20, $nero, $font, $i); //+20 per allinemamento
}
//disegna rettangoli
for($i=1;$i<count($valori);$i++) {
//disegna rettangolo pieno
imagefilledrectangle($image,$i*20+20,$dimH-$valori[$i]-40,$i*20+20+$barraW,$dimH-42,$grigioscuro);
/*effetto3d*/
imageline($image,$i*20+20+1,$dimH-$valori[$i]+1-40,$i*20+20+1,$dimH-42,$grigiodx); //up->bot
}
//disegna testo nei rettangoli
for($i=1;$i<count($valori);$i++) {
imagettftext($image, 12, 60, $i*20+20+7,$dimH-$valori[$i]+1-45, $nero, $font, $valori[$i]);
}
//sastgroup.com
//imagettftext($image, 10, 0, $dimW/2-10, 10, $nero, $font, "www.sastgroup.com");
imagepng($image);
imagedestroy($image);
?>