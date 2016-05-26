<?php
echo $_POST["payment_date"]."<br>";
echo $_POST["txn_type"]."<br>";
echo $_POST["mc_currency"]."<br>";
echo $_POST["txn_id"]."<br>";
echo $_POST["payment_status"]."<br>";
echo $_POST["sella_reply"]."<br><br>";

?>

<a href="index.php">Indietro</a>

<!--update acquisti setpagato=1 where id=<?echo $_POST["txn_id"];?>-->