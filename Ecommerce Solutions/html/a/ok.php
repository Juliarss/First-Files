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

<form method="post" action="fine.php">
<table align="center" border="0? cellpadding="0? cellspacing="0? width="100%">
<tr>
<td align="right" width="100%" class="globalButtons">
<input type="submit" name="" value="Clicca qui per confermare">
</td>
</tr>
</table>
<input type="hidden" id="" name="payment_date" value="<?php echo date("d-m-Y h:i:s");?>">
<input type="hidden" id="" name="txn_type" value="web_accept">
<input type="hidden" id="" name="mc_currency" value="EUR">
<input type="hidden" id="" name="txn_id" value="<?php echo $tid;?>">
<input type="hidden" id="" name="payment_status" value="<?php echo $pstatus;?>">
<input type="hidden" id="" name="sella_reply" value="<?php echo $op_result;?>">
</form>