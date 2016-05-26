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

$idp=$_GET['idp'];
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
                                                Gestione prodotti  Foto piccola
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
<a href="sel_prodotti.php">Prodotti</a> <b>Foto piccola</b>
<br>  <br>
<?
$obj->connessione();
$dati=mysql_query("select thumb from prodotti where id='$idp'");
while($array=mysql_fetch_array($dati)){
$j=$array[thumb];
echo"<img src=\"../uploads/$array[thumb]\">";
}
?>

<br>

<?
if ($_POST['op']=="ins"){
$id=$_POST['id'];
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

echo iimage_create_thumbnail($idut,$uploadfile,$larghezza, $effect = '', $method = 1, $quality = 80);
$thumb="tb_".$foto1;

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("update prodotti set thumb='$thumb' where id='$id'");
if($dati) {
echo "inerito correttamente";
}
else echo "non è stato inserito per motivi tecnici: ".mysql_error();
}
?>

<br>
<form action="foto_piccola.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input type="hidden" value="ins" name="op">
<input type="hidden" value="<?echo $idp?>" name="id">
   Foto:<input type="file" name="foto1">solo jpeg <INPUT type="submit" value="Invia" id=submit1 name=submit1>
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