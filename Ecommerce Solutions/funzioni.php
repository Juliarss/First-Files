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

//torna il logo del sito
function logosito()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select logo from configurazione where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[logo];
   }
   $obj->disconnessione();
 }

//torna il nome del sito
 function nomesito()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select nome from configurazione where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[nome];
   }
   $obj->disconnessione();
 }

 function tormamailutente($utente){
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select email from utenti where user='$utente'");
   while($array=mysql_fetch_array($dati)){
       return $array[email];
   }
   $obj->disconnessione();
 }

 //torna il nome del sito
 function emailsito()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select email_ordini from configurazione where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[email_ordini];
   }
   $obj->disconnessione();
 }

//torna piva del sito
 function pivasito()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select piva from configurazione where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[piva];
   }
   $obj->disconnessione();
 }

 //torna piva del sito
 function paypal()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select emailpaypal from pagamenti where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[emailpaypal];
   }
   $obj->disconnessione();
 }

  //torna piva del sito
 function codicecc()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select codice from pagamenti where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[codice];
   }
   $obj->disconnessione();
 }

//torna img prodotto da codice e colore
function tornaimg($codice,$colore){
 $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select * from prodotti where codice='$codice'");
     while($array=mysql_fetch_array($result)){
        return $array[immagine];
     }
  $obj->disconnessione();
}

//torna img prodotto da codice e colore
function tornaiva($id){
 $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select iva from prodotti where id='$id'");
     while($array=mysql_fetch_array($result)){
        return $array[iva];
     }
  $obj->disconnessione();
}

//torna prezzo spedizione da id
function tornaprezzo($id){
     $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select prezzo from spedizioni where id='$id'");
     while($array=mysql_fetch_array($result)){
        return $array[prezzo];
     }
     $obj->disconnessione();
}

//torna prezzo spedizione da id   se è di tipo percentuale, deve calcolare la percentuale
function tornaprezzop($id,$total,$peso){
     $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select * from spedizioni where id='$id'");
     while($array=mysql_fetch_array($result)){
     //Importo oltre il quale non si applicano spese di spedizione (se 0 le spese saranno sempre calcolate)
     $limprezzospedizione=$array[limspese];
     //si pagano le spese
     if($limprezzospedizione=="0.00" || $limprezzospedizione>$total){
        //di tipo perccentuale
        if($array[tipo]==2) $prezzo=$total*$array[percentuale]/100;   //percentuale
        //ti tipo peso
        if($array[tipo]==3){   //peso
            if($array[peso]>=$peso)$prezzo=$array[prezzo];
            else{
                $differenza=$peso-$array[peso];
                $fattore=$differenza/1000;
                $prezzo=$array[prezzo]+$fattore;
            }
        }
        //prezzo fisso
        if($array[tipo]==0)$prezzo=$array[prezzo];  //fisso
     }
     //non si pagano le spese
     else if($limprezzospedizione<=$total)$prezzo=0;
     //rirotna il prezzo
     return $prezzo;
     }
     $obj->disconnessione();
}


//torna peso per spedizione da id
function tornapeso($nome){
     $obj=new sast1com();
     $obj->connessione();
     $result = mysql_query("select peso from prodotti where nome='$nome'");
     while($array=mysql_fetch_array($result)){
        return $array[peso];
     }
     $obj->disconnessione();
}

//il carrello deve essere mostrato
function iscarrello()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select statocarrello from opzioni where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[statocarrello];
   }
   $obj->disconnessione();
 }

 //se business to business
function isb2b()
 {
 $obj=new sast1com();
     $obj->connessione();
   $dati=mysql_query("select modalita from opzioni where id=1");
   while($array=mysql_fetch_array($dati)){
       return $array[modalita];
   }
   $obj->disconnessione();
 }

 //visite sito
 function visite(){

$obj=new sast1com();
$obj->connessione();

$oggi = date("d/m/Y");

$dati=mysql_query("select * from visite where data ='$oggi' ");
$num=mysql_num_rows($dati);
if($num<=0){
//ancora nessuna visita
mysql_query("insert into visite(visite,data) values('1','$oggi')");
}
else{
$a=mysql_query("update visite set visite=visite+1 where data='$oggi'");
}

$dati=mysql_query("select sum(visite) as tot from visite where data ='$oggi'");
$num=mysql_num_rows($dati);
while($array=mysql_fetch_array($dati)){
echo"Oggi: $array[tot]<br>";
}


$dati=mysql_query("select sum(visite) as tot from visite");
$num=mysql_num_rows($dati);
while($array=mysql_fetch_array($dati)){
echo"Totali: $array[tot]";
}


}
?>