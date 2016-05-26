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

<table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold">
        <tr>

                <td rowspan="2" width="80" height="64" align="center">
                                <img border="0" src="images/prodotti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione prodotti  - Ins prodotti
                                        </td>
                                </tr>
                        </table>
                </td>
        </tr>
        <tr>

                <td height="10"></td>
        </tr>
</table>
<center>
<br>

<?
if ($_POST['op']=="ins"){
$categoria=$_POST['categoria'];
$pezzi=explode("|",$categoria);
$idcat=$pezzi[0];
$idsottocat=$pezzi[1];
$codice=$_POST['codice'];
$marca=$_POST['marca'];
$descrizione=$_POST['rte1'];
$thumb=$_POST['thumb'];
$prezzo=$_POST['prezzo'];
$breve=$_POST['breve'];
$nome=$_POST['nomeprod'];
$giacenza=$_POST['giacenza'];
$isofferta=$_POST['isofferta'];
$isnovita=$_POST['isnovita'];
$peso=$_POST['peso'];
$spedizionesep=$_POST['spedsep'];
$iva=$_POST['iva'];
$riordino=$_POST['riordino'];
$sconto=$_POST['sconto'];
$ishome=$_POST['home'];

/* caricamento img*/

$uploaddir = '../uploads/';
//foto1

$uploadfile = $uploaddir . $_FILES['foto1']['name'];
if (move_uploaded_file($_FILES['foto1']['tmp_name'], $uploadfile)) {
    print "Foto 1 ".$_FILES['foto1']['tmp_name']." allegata<br>";
} else {
    print "Foto 1 non allegata<br>";
}
$foto1=$_FILES['foto1']['name'];
/* fine caricamento img*/

$larghezza=150;

if(strlen($foto1)>0){
echo iimage_create_thumbnail($idut,$uploadfile,$larghezza, $effect = '', $method = 1, $quality = 80);
$thumb="tb_".$foto1;
}

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("insert into prodotti (idcat,idsottocat,codice,descrizione,thumb,prezzo,nome,giacenza,isofferta,peso,spedizionesep,iva,riordino,sconto,ishome,marca,isnovita,breve) values('$idcat','$idsottocat','$codice','$descrizione','$thumb','$prezzo','$nome','$giacenza','$isofferta','$peso','$spedizionesep','$iva','$riordino','$sconto','$ishome','$marca','$isnovita','$breve')");
if($dati) {
echo "inerito correttamente";

if(strlen($foto1)>0){
$idp=mysql_insert_id();
$dati2=mysql_query("insert into immagini (idp,percorso) values('$idp','$foto1')");
if($dati2) {
echo "inerito correttamente";
}else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}

}
else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}
?>

<br>
<form action="ins_prodott.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="hidden" value="ins" name="op">

<table border="0" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold">
        <input type="hidden" name="id" value="">
        <tr>
                <td width="50%" align="right">Nome:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "nomeprod" value = "" style="">

</td>
        </tr>
                <tr>
                <td width="50%" align="right">Codice:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "codice" value = "" style="">

</td>
        </tr>
                        <tr>
                <td width="50%" align="right">Marca:</td>
                <td width="50%" align="left"><INPUT TYPE="text" size = "30" name = "marca" value = "" style="">

</td>
        </tr>

        <tr><td width="50%" align="right">Prima foto:</td><td width="50%" align="left"><input type="file" name="foto1">solo jpeg</td> </tr>

        <tr>
                <td align="right">Categoria:</td>
                <td align="left"><SELECT size = "1" name = "categoria" style="">
<OPTION value="0" selected>(Principale)</OPTION>
<?
$obj->connessione();
$dati=mysql_query("select * from sottocategorie order by idcat");
$numero_righe=mysql_num_rows($dati);
if($numero_righe>0){
while($array=mysql_fetch_array($dati)){
echo "<option value=\"$array[idcat]|$array[id]\">".nomecat($array[idcat])." -> $array[nome]</option>";
} }
?>
</SELECT>
</td>
        </tr>
        <tr>
                <td align="right">Peso(grammi):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "peso" value = "0" style="">
</td>
        </tr>
      <!--  <tr>
                <td align="right">Spedizione separata(€):</td>

                <td align="left"><INPUT TYPE="text" size = "10" name = "spedsep" value = "0.00" style="">
</td>
        </tr>  -->
        <tr>
                <td align="right">Prezzo(€):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "prezzo" value = "0.00" style="">
</td>
        </tr>
        <tr>

                <td align="right">Aliquota iva:</td>
                <td align="left"><SELECT size = "1" name = "iva" style="">
<OPTION value="20" selected>20%</OPTION>
<OPTION value="18">18%</OPTION>
<OPTION value="12">12%</OPTION>
<OPTION value="8">8%</OPTION>
<OPTION value="4">4%</OPTION>
<OPTION value="0">0%</OPTION>

</SELECT>
</td>
        </tr>
        <tr>
                <td align="right">Sconto(%):</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "sconto" value = "0" style="">
</td>
        </tr>
        <tr>
                <td align="right">Giacenza:</td>

                <td align="left"><INPUT TYPE="text" size = "10" name = "giacenza" value = "0" style="">
</td>
        </tr>
        <tr>
                <td align="right">Livello di riordino:</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "riordino" value = "0" style="">
</td>
        </tr>
        <tr>

                <td align="right">Homepage:</td>
                <td align="left"><INPUT type="CheckBox" name="home" value="1" style="border-width: 0">
</td>
        </tr>
                <tr>

                <td align="right">Novita:</td>
                <td align="left"><INPUT type="CheckBox" name="isnovita" value="1" style="border-width: 0">
</td>
        </tr>
                <tr>

                <td align="right">Offerta:</td>
                <td align="left"><INPUT type="CheckBox" name="isofferta" value="1" style="border-width: 0">
</td>
        </tr>

                <tr>

                <td align="right" colspan="2">Descrizione breve max 255 car:<br>
                <textarea rows=10 cols=70 name="breve"></textarea>

</td>
        </tr>

        <tr>

                <td align="left" colspan="2">
                        Descrizione completa:<br>
<!-- TinyMCE -->
<script language="javascript" type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
              tinyMCE.init({
                mode : "textareas",
                theme : "simple"
        });
</script>
        <textarea id="rte1" name="rte1" rows="30" cols="90" style="width: 100%"></textarea>
                </td>
        </tr>
        <tr>

                <td align="right"><INPUT type="submit" value="Invia" id=submit1 name=submit1>&nbsp;</td>
        </tr>
</table>
</form>
<br><br>


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
function nomecat($id){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select nome from categorie where id='$id'");
while($array=mysql_fetch_array($dati)){
return $array[nome];
}
}

function iimage_create_thumbnail($idut,$file, $max_side, $effect = '', $method = 1, $quality = 80) {//method ... resampled or resized?
$thumb_prefix="tb_";
    // 1 = GIF, 2 = JPEG, 3 = PNG

    echo"Creazione thumb";

    if(file_exists($file)) {
        $type = getimagesize($file);

        // if the associated function doesn't exist - then it's not
        // handle. duh. i hope.

        if(!function_exists('imagegif') && $type[2] == 1) {
            $error = __('Filetype not supported. Thumbnail not created.');
        }elseif(!function_exists('imagejpeg') && $type[2] == 2) {
            $error = __('Filetype not supported. Thumbnail not created.');
        }elseif(!function_exists('imagepng') && $type[2] == 3) {
            $error = __('Filetype not supported. Thumbnail not created.');
        } else {

            // create the initial copy from the original file
            if($type[2] == 1) {
                $image = imagecreatefromgif($file);
            } elseif($type[2] == 2) {
                $image = imagecreatefromjpeg($file);
            } elseif($type[2] == 3) {
                $image = imagecreatefrompng($file);
            }

                        if (function_exists('imageantialias'))
                    imageantialias($image, TRUE);

            $image_attr = getimagesize($file);

            // figure out the longest side

            if($image_attr[0] > $image_attr[1]) {
                $image_width = $image_attr[0];
                $image_height = $image_attr[1];
                $image_new_width = $max_side;

                $image_ratio = $image_width/$image_new_width;
                $image_new_height = $image_height/$image_ratio;
                //width is > height
            } else {
                $image_width = $image_attr[0];
                $image_height = $image_attr[1];
                $image_new_height = $max_side;

                $image_ratio = $image_height/$image_new_height;
                $image_new_width = $image_width/$image_ratio;
                //height > width
            }

            $thumbnail = imagecreatetruecolor($image_new_width, $image_new_height);
                        if( function_exists('imagecopyresampled') && $method == 1 ){
                                @imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $image_new_width, $image_new_height, $image_attr[0], $image_attr[1]);
                                }
                        else{
                    @imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $image_new_width, $image_new_height, $image_attr[0], $image_attr[1]);
                                }

            // move the thumbnail to it's final destination

            $path = explode('/', $file);
            $thumbpath = substr($file, 0, strrpos($file, '/')) . "/{$thumb_prefix}" . $path[count($path)-1];

                        if(file_exists($thumbpath))
                                return sprintf(__("The filename '%s' already exists!"), $thumb_prefix.$path[count($path)-1]);

            if($type[2] == 1) {
                if(!imagegif($thumbnail, $thumbpath)) {
                    $error = __("Thumbnail path invalid");
                }
            } elseif($type[2] == 2) {
//                        echo $quality;
                if(!imagejpeg($thumbnail, $thumbpath,$quality)) {
                    $error = __("Thumbnail path invalid");
                }
            } elseif($type[2] == 3) {
                if(!imagepng($thumbnail, $thumbpath)) {
                    $error = __("Thumbnail path invalid");
                }
            }

        }
    }

    if(!empty($error))
    {
        return $error;
    }
    else
    {

    echo"<script>alert('thumb inserito');</script>";



        chmod($thumbpath, 0666);
        return 1;
    }
}
?>