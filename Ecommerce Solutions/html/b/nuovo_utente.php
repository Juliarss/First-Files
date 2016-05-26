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

$id=$_GET['id'];
$temput=$_SESSION['temput'];
$temppass=$_SESSION['temppass'];

// elimina tags dannosi
$id=strip_tags($id);
// rimove escaped spazio
$id=str_replace("%20","",$id);
// aggiunge lo slashe
$id=addslashes($id);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?echo nomesito();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="html/b/styles/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
  <table width="760" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="left" valign="top"><img src="images/<?echo logosito();?>" border=0> </td>
      <td align="left" valign="top"> <?  include("topmenu.php");    ?></td>
              </tr>
    <tr>
      <td colspan="2" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top"><table width="100%"  border="0" cellspacing="1" cellpadding="2">
 <?  include("lateralmenu.php");    ?>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="98%"  border="0" cellspacing="1" cellpadding="2">
                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Carrello</td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text"><p>Carrello <a href="carrello.php">Vedi</a> o <a href="carrello.php?action=empty">Svuota</a></p></td>
                </tr>
                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Categorie</td>
                </tr>


                  <?
                               $obj->connessione();
                               $dati=mysql_query("select * from categorie order by nome");
                               while($array=mysql_fetch_array($dati)){
                               echo"<tr><td height=\"20\" class=\"subtitle\"><a href=\"categorie.php?cat=$array[id]\">$array[nome]</a></td></tr>" ;
                               }
                               $obj->disconnessione();
                  ?>

                <tr>
                  <td height="20" align="left" valign="top" bgcolor="#F19F00" class="subtitle">Novita</td>
                </tr>

                        <?
                               $obj->connessione();
                               $dati=mysql_query("select * from prodotti where isnovita=1  limit 3");
                               while($array=mysql_fetch_array($dati)){
                               echo"<tr><td height=\"20\" class=\"subtitle\">";
                                if(strlen($array[thumb])<=0)echo"<img src=\"images/no_disp.jpg\" border=0><br>";
                                else echo"<img src=\"uploads/$array[thumb]\" border=0><br>";
                               echo"<a href=\"dettaglio.php?id=$array[id]\">$array[nome]</a></a><br>" ;
                               echo $array[breve]."<br>";
                               if(isb2b()==1)echo"<strong>$array[prezzo]</strong> euro<br></td></tr>";
                               }
                        ?>
                <tr>
                  <td height="20" align="left" valign="top" class="subtitle"><img src="images/bancasella_visa.gif" border=0> </td>
                </tr>




              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="98%"  border="0" cellspacing="1" cellpadding="2">
              </table></td>
            </tr>
          </table></td>
          <td width="555" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="222" align="right" valign="bottom" class="top"><table width="300"  border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td align="right" valign="top" class="whitetext"><?echo nomesito();?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="1" align="left" valign="middle" bgcolor="#FFFFFF" class="largetitle"></td>
                </tr>
                <tr>
                  <td align="left" valign="top" class="text"> <br />
                   <form method="post" action="cerca.php">
                                <p>Cerca articoli: <input type="text" name="search" class="search" /> <input type="submit" value="Cerca" class="submit" /></p>
                   </form>
                    <br>

                        <?
if ($_POST['op']=="mod"){

$ragione=$_POST['ragione_soc'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$sesso=$_POST['sesso'];
$eta=$_POST['eta'];
$fiscale=$_POST['codfis'];
$indirizzo=$_POST['indirizzo'];
$cap=$_POST['cap'];
$provincia=$_POST['provincia'];
$citta=$_POST['citta'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$user=$_POST['userid'];
$password=$_POST['password'];

// elimina tags dannosi
$ragione=strip_tags($ragione);
$ragione=str_replace("%20","",$ragione);
$ragione=addslashes($ragione);
$nome=strip_tags($nome);
$nome=str_replace("%20","",$nome);
$nome=addslashes($nome);
$cognome=strip_tags($cognome);
$cognome=str_replace("%20","",$cognome);
$cognome=addslashes($cognome);
$eta=strip_tags($eta);
$eta=str_replace("%20","",$eta);
$eta=addslashes($eta);
$fiscale=strip_tags($fiscale);
$fiscale=str_replace("%20","",$fiscale);
$fiscale=addslashes($fiscale);
$indirizzo=strip_tags($indirizzo);
$indirizzo=str_replace("%20","",$indirizzo);
$indirizzo=addslashes($indirizzo);
$cap=strip_tags($cap);
$cap=str_replace("%20","",$cap);
$cap=addslashes($cap);
$citta=strip_tags($citta);
$citta=str_replace("%20","",$citta);
$citta=addslashes($citta);
$telefono=strip_tags($telefono);
$telefono=str_replace("%20","",$telefono);
$telefono=addslashes($telefono);
$email=strip_tags($email);
$email=str_replace("%20","",$email);
$email=addslashes($email);
$user=strip_tags($user);
$user=str_replace("%20","",$user);
$user=addslashes($user);
$password=strip_tags($password);
$password=str_replace("%20","",$password);
$password=addslashes($password);

$obj=new sast1com();
$obj->connessione();

if(
strlen($ragione)>0 &&
strlen($nome)>0 &&
strlen($cognome)>0 &&
strlen($sesso)>0 &&
strlen($eta)>0 &&
strlen($fiscale)>0 &&
strlen($indirizzo)>0 &&
strlen($cap)>0 &&
strlen($provincia)>0 &&
strlen($citta)>0 &&
strlen($telefono)>0 &&
strlen($email)>0 &&
strlen($user)>0 &&
strlen($password)>0  &&
verifica($user)==0
){

$dati=mysql_query("insert into utenti(ragione,nome,cognome,sesso,eta,fiscale,indirizzo,cap,provincia,citta,telefono,email,user,password,stato) values('$ragione','$nome','$cognome','$sesso','$eta','$fiscale','$indirizzo','$cap','$provincia','$citta','$telefono','$email','$user','$password','1')");
if($dati) echo "Registrazione avvenuta con successo!<br>Grazie per esserti registrato.";
else echo "nNon è stato inserito per motivi tecnici contattaci";


$mittente=emailsito();
$testo="Gentile $nome $cognome,\n";
$testo.="ti ringraziamo per esserti registrato sul nostro sito.\n";
$testo.="Di seguito riportiamo i dati per accedere ai nostri servizi:\n\n";
$testo.="UserName: $user,\n";
$testo.="Password: $password,\n\n";
$testo.="Cordiali saluti,\n";

if(@mail($email,"Nuova registrazione",$testo,"From: ".$mittente)) { // SE L'INVIO E' ANDATO A BUON FINE...
//echo "La mail stata inoltrata con successo. a $email<br>";
} else {// ALTRIMENTI...
//echo "Si sono verificati dei problemi nell'invio della mail. <br>";
}

}
else echo"Uno o piu campi obbligatori vuoti";
if(verifica($user)==1)echo"<strong>Nome utente già in uso</strong>";

}
?>
<br><br>

<form action="nuovo_utente.php" method="post" name="theform">
<input type="hidden" value="mod" name="op">
<table border="0" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold">
        <INPUT TYPE="hidden" name = "id" value = "" style="">

        <tr>
                <td align="right">Ragione sociale*:</td>

                <td align="left"><INPUT TYPE="text" size = "15" name = "ragione_soc" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Nome*:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "nome" value = "" style="">
</td>
        </tr>
        <tr>

                <td align="right">Cognome*:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "cognome" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Sesso*:</td>
                <td align="left"><SELECT size = "1" name = "sesso" style="border: 1px solid #000000">
<OPTION value="M">M</OPTION>

<OPTION value="F">F</OPTION>
</SELECT>
</td>
        </tr>
        <tr>
                <td align="right">Età*:</td>
                <td align="left"><INPUT TYPE="text" size = "13" name = "eta" value = "" style=""></td>
        </tr>

        <tr>
                <td align="right">Cod.fiscale/P.IVA*:</td>
                <td align="left"><INPUT TYPE="text" size = "13" name = "codfis" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Indirizzo*:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "indirizzo" value = "" style="">

</td>
        </tr>
        <tr>
                <td align="right">CAP*:</td>
                <td align="left"><INPUT TYPE="text" size = "5" name = "cap" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Provincia*:</td>

                <td align="left"><SELECT size = "1" name = "provincia" style="border: 1px solid #000000">
<OPTION value="" selected>Seleziona la provincia</OPTION>
<OPTION value="AG">AGRIGENTO</OPTION>
<OPTION value="AL">ALESSANDRIA</OPTION>
<OPTION value="AN">ANCONA</OPTION>
<OPTION value="AO">AOSTA</OPTION>
<OPTION value="AQ">AQUILA</OPTION>
<OPTION value="AR">AREZZO</OPTION>
<OPTION value="AP">ASCOLI PICENO</OPTION>

<OPTION value="AT">ASTI</OPTION>
<OPTION value="AV">AVELLINO</OPTION>
<OPTION value="BA">BARI</OPTION>
<OPTION value="BL">BELLUNO</OPTION>
<OPTION value="BN">BENEVENTO</OPTION>
<OPTION value="BG">BERGAMO</OPTION>
<OPTION value="BI">BIELLA</OPTION>
<OPTION value="BO">BOLOGNA</OPTION>
<OPTION value="BZ">BOLZANO</OPTION>

<OPTION value="BS">BRESCIA</OPTION>
<OPTION value="BR">BRINDISI</OPTION>
<OPTION value="CA">CAGLIARI</OPTION>
<OPTION value="CL">CALTANISETTA</OPTION>
<OPTION value="CB">CAMPOBASSO</OPTION>
<OPTION value="CE">CASERTA</OPTION>
<OPTION value="CT">CATANIA</OPTION>
<OPTION value="CZ">CATANZARO</OPTION>
<OPTION value="CH">CHIETI</OPTION>

<OPTION value="CO">COMO</OPTION>
<OPTION value="CS">COSENZA</OPTION>
<OPTION value="CR">CREMONA</OPTION>
<OPTION value="KR">CROTONE</OPTION>
<OPTION value="CN">CUNEO</OPTION>
<OPTION value="EN">ENNA</OPTION>
<OPTION value="FE">FERRARA</OPTION>
<OPTION value="FI">FIRENZE</OPTION>
<OPTION value="FG">FOGGIA</OPTION>

<OPTION value="FO">FORLI</OPTION>
<OPTION value="FR">FROSINONE</OPTION>
<OPTION value="GE">GENOVA</OPTION>
<OPTION value="GO">GORIZIA</OPTION>
<OPTION value="GR">GROSSETO</OPTION>
<OPTION value="IM">IMPERIA</OPTION>
<OPTION value="IS">ISERNIA</OPTION>
<OPTION value="SP">LA SPEZIA</OPTION>
<OPTION value="LT">LATINA</OPTION>

<OPTION value="LE">LECCE</OPTION>
<OPTION value="LC">LECCO</OPTION>
<OPTION value="LI">LIVORNO</OPTION>
<OPTION value="LO">LODI</OPTION>
<OPTION value="LU">LUCCA</OPTION>
<OPTION value="MC">MACERATA</OPTION>
<OPTION value="MN">MANTOVA</OPTION>
<OPTION value="MS">MASSA</OPTION>
<OPTION value="MT">MATERA</OPTION>

<OPTION value="ME">MESSINA</OPTION>
<OPTION value="MI">MILANO</OPTION>
<OPTION value="MO">MODENA</OPTION>
<OPTION value="NA">NAPOLI</OPTION>
<OPTION value="NO">NOVARA</OPTION>
<OPTION value="NU">NUORO</OPTION>
<OPTION value="OR">ORISTANO</OPTION>
<OPTION value="PD">PADOVA</OPTION>
<OPTION value="PA">PALERMO</OPTION>

<OPTION value="PR">PARMA</OPTION>
<OPTION value="PV">PAVIA</OPTION>
<OPTION value="PG">PERUGIA</OPTION>
<OPTION value="PS">PESARO</OPTION>
<OPTION value="PE">PESCARA</OPTION>
<OPTION value="PC">PIACENZA</OPTION>
<OPTION value="PI">PISA</OPTION>
<OPTION value="PT">PISTOIA</OPTION>
<OPTION value="PN">PORDENONE</OPTION>

<OPTION value="PZ">POTENZA</OPTION>
<OPTION value="PO">PRATO</OPTION>
<OPTION value="RG">RAGUSA</OPTION>
<OPTION value="RA">RAVENNA</OPTION>
<OPTION value="RC">REGGIO CALABRIA</OPTION>
<OPTION value="RE">REGGIO EMILIA</OPTION>
<OPTION value="RI">RIETI</OPTION>
<OPTION value="RN">RIMINI</OPTION>
<OPTION value="RM">ROMA</OPTION>

<OPTION value="RO">ROVIGO</OPTION>
<OPTION value="SA">SALERNO</OPTION>
<OPTION value="SS">SASSARI</OPTION>
<OPTION value="SV">SAVONA</OPTION>
<OPTION value="SI">SIENA</OPTION>
<OPTION value="SR">SIRACUSA</OPTION>
<OPTION value="SO">SONDRIO</OPTION>
<OPTION value="TA">TARANTO</OPTION>
<OPTION value="TE">TERAMO</OPTION>

<OPTION value="TR">TERNI</OPTION>
<OPTION value="TO">TORINO</OPTION>
<OPTION value="TP">TRAPANI</OPTION>
<OPTION value="TN">TRENTO</OPTION>
<OPTION value="TV">TREVISO</OPTION>
<OPTION value="TS">TRIESTE</OPTION>
<OPTION value="UD">UDINE</OPTION>
<OPTION value="VA">VARESE</OPTION>
<OPTION value="VE">VENEZIA</OPTION>

<OPTION value="VB">VERBANIA</OPTION>
<OPTION value="VC">VERCELLI</OPTION>
<OPTION value="VR">VERONA</OPTION>
<OPTION value="VV">VIBO VALENTIA</OPTION>
<OPTION value="VI">VICENZA</OPTION>
<OPTION value="VT">VITERBO</OPTION>
</SELECT>
</td>
        </tr>
        <tr>

                <td align="right">Città*:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "citta" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Telefono*:</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "telefono" value = "" style="">
</td>
        </tr>

        <tr>
                <td align="right">email*:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "email" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">UserID*:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "userid" value = "" style=""> <a href="javascript:verifica(document.theform.userid.value);">Verifica disp</a>

</td>
        </tr>
<tr>            <td align="right"></td>
                <td ><div id="dati"></div></td>
        </tr>
        <tr>
                <td align="right">Password*:</td>
                <td align="left"><INPUT TYPE="password" name = "password" value = "" style="">
</td>
        </tr>
        <tr>
                    <td align="right" valign="top">Legge 675/1996:&nbsp;</td>
                    <td>
                                                                                        <strong><u><textarea rows="5" name="S1" cols="30" class="main_text">
Informativa


Informativa art. 13 D.Lgs. 196/2003

Si informa il sottoscrittore della presente che il decreto legislativo n. 196/2003 prevede la tutela delle persone e di altri soggetti rispetto al trattamento dei dati personali. Secondo le leggi indicate, tale trattamento sarà improntato ai principi di correttezza, liceità e trasparenza tutelando la riservatezza e i diritti del sottoscrittore. Le seguenti informazioni vengono fornite ai sensi dell'articolo 13 del decreto legislativo n. 196/2003.
Il trattamento che intendiamo effettuare:

a)        ha la finalità di concludere, gestire ed eseguire i contratti di fornitura dei servizi richiesti; di organizzare, gestire ed eseguire la fornitura dei servizi anche mediante comunicazione dei dati a terzi nostri fornitori; di assolvere agli obblighi di legge o agli altri adempimenti richiesti dalle competenti Autorità;
b)        sarà effettuato con le seguenti modalità: informatizzato/manuale;
c)        salvo quanto strettamente necessario per la corretta esecuzione del contratto di fornitura, i dati non saranno comunicati ad altri soggetti, se non chiedendoLe espressamente il consenso.

Informiamo ancora che la comunicazione dei dati è indispensabile ma non obbligatoria e l'eventuale rifiuto non ha alcuna conseguenza ma potrebbe comportare il mancato puntuale adempimento delle obbligazioni assunte dal nostro sito per la fornitura del servizio da Lei richiesto. Il titolare del trattamento è il sito stesso al quale può rivolgersi per far valere i Suoi diritti così come previsto dall'articolo 7 del decreto legislativo n. 196/2003, che riportiamo di seguito per esteso:


Art. 7
Diritto di accesso ai dati personali ed altri diritti
1. L'interessato ha diritto di ottenere la conferma dell'esistenza o meno di dati personali che lo riguardano, anche se non ancora registrati, e la loro comunicazione in forma intelligibile.
2. L'interessato ha diritto di ottenere l'indicazione:
a) dell'origine dei dati personali;
b) delle finalità e modalità del trattamento;
c) della logica applicata in caso di trattamento effettuato con l'ausilio di strumenti elettronici;
d) degli estremi identificativi del titolare, dei responsabili e del rappresentante designato ai sensi dell'articolo 5, comma 2;
e) dei soggetti o delle categorie di soggetti ai quali i dati personali possono essere comunicati o che possono venirne a conoscenza in qualità di rappresentante designato nel territorio dello Stato, di responsabili o incaricati.
3. L'interessato ha diritto di ottenere:
a) l'aggiornamento, la rettificazione ovvero, quando vi ha interesse, l'integrazione dei dati;
b) la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi quelli di cui non è necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o successivamente trattati;
c) l'attestazione che le operazioni di cui alle lettere a) e b) sono state portate a conoscenza, anche per quanto riguarda il loro contenuto, di coloro ai quali i dati sono stati comunicati o diffusi, eccettuato il caso in cui tale adempimento si rivela impossibile o comporta un impiego di mezzi manifestamente sproporzionato rispetto al diritto tutelato.
4. L'interessato ha diritto di opporsi, in tutto o in parte:
a) per motivi legittimi al trattamento dei dati personali che lo riguardano, ancorché pertinenti allo scopo della raccolta;
b) al trattamento di dati personali che lo riguardano a fini di invio di materiale pubblicitario o di vendita diretta o per il compimento di ricerche di mercato o di comunicazione commerciale.




Formula di consenso

Acquisite le informazioni che precedono, rese ai sensi dell'art. 13 del D.Lgs. 196/2003, consento al trattamento dei miei dati come sopra descritto.




                                                                </textarea>
                                                                                </td>
                </tr>
                <tr>

                    <td align="right" valign="top">&nbsp;<br><BR><BR></td>
                    <td>
                                                                                        <input type="radio" value="V1" checked name="privacy">
                                                                                        Autorizzo&nbsp;<input type="radio" name="privacy" value="V2">Non autorizzo
                                                                                </td>
                </tr>
        </table> <br>
       <center><INPUT type="submit" value="Registrati"></center>
     </form>

<br><br>
                        <form name="form" action="newsletter.php" method="post">
                        <b>Newsletter:</b>
                        <input type="text" name="email" size="25"> <input type="submit" value="ok">
                        </form>
   </td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="4" colspan="2" align="center" valign="top">  <p><?include("footer.php");?></p> </td>
    </tr>
  </table>
</center>
</body>
</html>



<?
function verifica($utente){
$obj=new sast1com();
$obj->connessione();
$dati=mysql_query("select * from utenti where user='$utente'");
$num=mysql_num_rows($dati);
return $num;
}
?>