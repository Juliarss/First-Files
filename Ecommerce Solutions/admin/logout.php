<?php

session_start();
// Desetta tutte le variabili di sessione.
session_unset();
// Infine , distrugge la sessione.
session_destroy();

echo"<script language=javascript>";
echo"document.location.href='index.html'";
echo"</script>";
?>