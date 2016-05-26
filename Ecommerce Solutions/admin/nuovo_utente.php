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
                                <img border="0" src="images/utenti.gif" width="48" height="48">
                </td>
                <td>
                        <table border="0" width="100%" style="font-family: Verdana; font-size: 16pt; font-weight: bold; border-bottom: 1px solid #D6DFF5; padding: 0">
                                <tr>
                                        <td align="left" valign="middle" style="color: #3366CC">
                                                Gestione utenti  Nuovo utente
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
<form action="nuovo_utente.php" method="post">
<input type="hidden" value="mod" name="op">
<table border="0" align="center" style="font-size: 10px; font-family: Verdana; font-weight: bold">
        <INPUT TYPE="hidden" name = "id" value = "" style="">

        <tr>
                <td align="right">Ragione sociale:</td>

                <td align="left"><INPUT TYPE="text" size = "15" name = "ragione_soc" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Nome:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "nome" value = "" style="">
</td>
        </tr>
        <tr>

                <td align="right">Cognome:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "cognome" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Sesso:</td>
                <td align="left"><SELECT size = "1" name = "sesso" style="border: 1px solid #000000">
<OPTION value="M">M</OPTION>

<OPTION value="F">F</OPTION>
</SELECT>
</td>
        </tr>
        <tr>
                <td align="right">Età:</td>
                <td align="left"><SELECT size = "1" name = "eta" style="border: 1px solid #000000">
<OPTION value="1">1</OPTION>
<OPTION value="2">2</OPTION>

<OPTION value="3">3</OPTION>
<OPTION value="4">4</OPTION>
<OPTION value="5">5</OPTION>
<OPTION value="6">6</OPTION>
<OPTION value="7">7</OPTION>
<OPTION value="8">8</OPTION>
<OPTION value="9">9</OPTION>
<OPTION value="10">10</OPTION>
<OPTION value="11">11</OPTION>

<OPTION value="12">12</OPTION>
<OPTION value="13">13</OPTION>
<OPTION value="14">14</OPTION>
<OPTION value="15">15</OPTION>
<OPTION value="16">16</OPTION>
<OPTION value="17">17</OPTION>
<OPTION value="18">18</OPTION>
<OPTION value="19">19</OPTION>
<OPTION value="20">20</OPTION>

<OPTION value="21">21</OPTION>
<OPTION value="22">22</OPTION>
<OPTION value="23">23</OPTION>
<OPTION value="24">24</OPTION>
<OPTION value="25">25</OPTION>
<OPTION value="26">26</OPTION>
<OPTION value="27">27</OPTION>
<OPTION value="28">28</OPTION>
<OPTION value="29">29</OPTION>

<OPTION value="30">30</OPTION>
<OPTION value="31">31</OPTION>
<OPTION value="32">32</OPTION>
<OPTION value="33">33</OPTION>
<OPTION value="34">34</OPTION>
<OPTION value="35">35</OPTION>
<OPTION value="36">36</OPTION>
<OPTION value="37">37</OPTION>
<OPTION value="38">38</OPTION>

<OPTION value="39">39</OPTION>
<OPTION value="40">40</OPTION>
<OPTION value="41">41</OPTION>
<OPTION value="42">42</OPTION>
<OPTION value="43">43</OPTION>
<OPTION value="44">44</OPTION>
<OPTION value="45">45</OPTION>
<OPTION value="46">46</OPTION>
<OPTION value="47">47</OPTION>

<OPTION value="48">48</OPTION>
<OPTION value="49">49</OPTION>
<OPTION value="50">50</OPTION>
<OPTION value="51">51</OPTION>
<OPTION value="52">52</OPTION>
<OPTION value="53">53</OPTION>
<OPTION value="54">54</OPTION>
<OPTION value="55">55</OPTION>
<OPTION value="56">56</OPTION>

<OPTION value="57">57</OPTION>
<OPTION value="58">58</OPTION>
<OPTION value="59">59</OPTION>
<OPTION value="60">60</OPTION>
<OPTION value="61">61</OPTION>
<OPTION value="62">62</OPTION>
<OPTION value="63">63</OPTION>
<OPTION value="64">64</OPTION>
<OPTION value="65">65</OPTION>

<OPTION value="66">66</OPTION>
<OPTION value="67">67</OPTION>
<OPTION value="68">68</OPTION>
<OPTION value="69">69</OPTION>
<OPTION value="70">70</OPTION>
<OPTION value="71">71</OPTION>
<OPTION value="72">72</OPTION>
<OPTION value="73">73</OPTION>
<OPTION value="74">74</OPTION>

<OPTION value="75">75</OPTION>
<OPTION value="76">76</OPTION>
<OPTION value="77">77</OPTION>
<OPTION value="78">78</OPTION>
<OPTION value="79">79</OPTION>
<OPTION value="80">80</OPTION>
<OPTION value="81">81</OPTION>
<OPTION value="82">82</OPTION>
<OPTION value="83">83</OPTION>

<OPTION value="84">84</OPTION>
<OPTION value="85">85</OPTION>
<OPTION value="86">86</OPTION>
<OPTION value="87">87</OPTION>
<OPTION value="88">88</OPTION>
<OPTION value="89">89</OPTION>
<OPTION value="90">90</OPTION>
<OPTION value="91">91</OPTION>
<OPTION value="92">92</OPTION>

<OPTION value="93">93</OPTION>
<OPTION value="94">94</OPTION>
<OPTION value="95">95</OPTION>
<OPTION value="96">96</OPTION>
<OPTION value="97">97</OPTION>
<OPTION value="98">98</OPTION>
<OPTION value="99">99</OPTION>
</SELECT>
</td>
        </tr>

        <tr>
                <td align="right">Cod.fiscale/P.IVA:</td>
                <td align="left"><INPUT TYPE="text" size = "13" name = "codfis" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Indirizzo:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "indirizzo" value = "" style="">

</td>
        </tr>
        <tr>
                <td align="right">CAP:</td>
                <td align="left"><INPUT TYPE="text" size = "5" name = "cap" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Provincia:</td>

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

                <td align="right">Città:</td>
                <td align="left"><INPUT TYPE="text" size = "15" name = "citta" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Telefono:</td>
                <td align="left"><INPUT TYPE="text" size = "10" name = "telefono" value = "" style="">
</td>
        </tr>

        <tr>
                <td align="right">email:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "email" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">UserID:</td>
                <td align="left"><INPUT TYPE="text" size = "20" name = "userid" value = "" style="">

</td>
        </tr>
        <tr>
                <td align="right">Password:</td>
                <td align="left"><INPUT TYPE="password" name = "password" value = "" style="">
</td>
        </tr>
        <tr>
                <td align="right">Stato:</td>
                <td align="left"><SELECT size = "1" name = "attivo" style="border: 1px solid #000000">
<OPTION value="1">Attivo</OPTION>
<OPTION value="0" selected>Non attivo</OPTION>
</SELECT>

</td>
        </tr>
        <tr>
                <td><INPUT type="submit" value="Invia" id=submit1 name=submit1>&nbsp;</td>
        </tr>
<br><br>


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
$stato=$_POST['attivo'];

$obj=new sast1com();
$obj->connessione();

$dati=mysql_query("insert into utenti(ragione,nome,cognome,sesso,eta,fiscale,indirizzo,cap,provincia,citta,telefono,email,user,password,stato) values('$ragione','$nome','$cognome','$sesso','$eta','$fiscale','$indirizzo','$cap','$provincia','$citta','$telefono','$email','$user','$password','$stato')");
if($dati) echo "inserito correttamente";
else echo "non è stato inserito per motivi tecnici: ".mysql_error();

}
?>


</body></html>

<?
}}
else{
echo"<script language=javascript>";
echo"document.location.href='errore.php'";
echo"</script>";
}
?>