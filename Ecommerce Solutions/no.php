<?php
require_once "GestPayCrypt.inc.php";
if (empty($_GET["a"])) {
die("Parametro mancante: ‘a’\n");
}
if (empty($_GET["b"])) {
die("Parametro mancante: ‘b’\n");
}

$crypt = new GestPayCrypt();
$crypt->SetShopLogin($_GET["a"]);
$crypt->SetEncryptedString($_GET["b"]);
if (!$crypt->Decrypt()) {
die("Error: ".$crypt->GetErrorCode().": ".$crypt->GetErrorDescription()."\n");
}

$amount=$crypt->GetAmount();
$tid=$crypt->GetShopTransactionID();
$order_id=substr($tid,strpos($tid,"-")+1,strlen($tid));
$op_result=$crypt->GetTransactionResult();

switch ($op_result) {
case "XX":
break;
case "KO":
break;
case "OK":
$pstatus="Completed";
echo"[Completed]
";
break;
default:
die("Esito transazione indefinito\n");
}
?>

Errore pagamento saldo <br><br>
