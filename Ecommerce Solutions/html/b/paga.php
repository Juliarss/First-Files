<?
require_once "GestPayCrypt.inc.php";
$objCrypt = new GestPayCrypt();

$myshoplogin = "GESPAY35191"; // Es. 9000001
$mycurrency = "242"; //Es. 242 per euro o 18 lira
$myamount = "0.1"; // Es. 1256.28
$myshoptransactionID="34az846or9"; //Es. "34az85ord19?

$mybuyername= "antonio lopez"; //Es. "Mario Bianchi"
$mybuyeremail= "pippo@hotmail.com"; // Es. "Mario.bianchi@isp.it"
$mylanguage= "1"; //Es. 3 per spagnolo

$objCrypt->SetShopLogin($myshoplogin);
$objCrypt->SetCurrency($mycurrency);
$objCrypt->SetAmount($myamount);
$objCrypt->SetShopTransactionID($myshoptransactionID);

$objCrypt->Encrypt();

$ed=$objCrypt->GetErrorDescription();
if($ed!="")
{
echo "Errore di encoding: " . $objCrypt->GetErrorCode() . " " . $ed . "
";
}
else
{
$b = $objCrypt->GetEncryptedString();
$a = $objCrypt->GetShopLogin();
}
?>

Cliccare su OK per inviare i dati a Banca Sella
<form action="https://ecomm.sella.it/gestpay/pagam.asp">
<input name="a" type="hidden" value="<? echo $a; ?>">
<input name="b" type="hidden" value="<? echo $b; ?>">
<input type="submit" value=" OK " name="submit">
</form>