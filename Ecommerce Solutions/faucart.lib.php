<?

### Very small and lightweight e-commerce cart ###
### by Fausto Iannuzzi - 2005 ###

################################################
#
# Faucart Library
#
# by Fausto Iannuzzi - 2005 - free to use
#
################################################

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


$cart_name      = "MYFAUCART";
$cart_object        = null;

class faucartelement {

  # Reserved variables

  var $object_id;
  var $name;
  var $description;
  var $price;
  var $quantity;
  var $colori;
  var $taglie;
  var $itemid;

  function faucartelement($itemid,$name,$description,$price,$colori,$taglie) {
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->quantity = 1;
            $this->colori = $colori;
            $this->itemid = $itemid;
            $this->taglie = $taglie;
            $this->object_id = md5($itemid.$name.$description.$price.$colori.$taglie);
  }
}

class faucart {

 # Reserved variables
 var $_items;
 var $_current_item;
 var $_total;

 function faucart() {
         $this->_items = array();
         $this->_current_item = 0;
         $this->_total = 0;
 }

 function isFound($item_number) {
  for ($i=0;$i<count($this->_items);$i++) {
          if (isset($this->_items[$i])) {
                         if ($this->_items[$i]->object_id == $item_number->object_id)
                                 return $i;
                 }
         }
         return false;
 }

function atIndex($object_id) {
  for ($i=0;$i<count($this->_items);$i++) {
          if (isset($this->_items[$i])) {
                         if ($this->_items[$i]->object_id == $object_id)
                                 return $i;
                 }
         }
         return false;
 }

 function addItem($item) {
        $index = $this->isFound($item);
        if ($index!==false)
               $this->updateQuantity($item,1,$index);
        else {
                $this->_items[] = $item;
        }
 }

 function delItem($item_number) {
  $temp_items = array();
  for ($i=0;$i<count($this->_items);$i++) {
  if (isset($this->_items[$i])) {
   if ($this->_items[$i]->object_id == $item_number->object_id)
                                 continue;
   else
        $temp_items[] = $this->_items[$i];
   }
  }
  $this->_items = $temp_items;
  unset($temp_items);
 }

 function delItemByObjectID($object_id) {
  $temp_items = array();
  for ($i=0;$i<count($this->_items);$i++) {
  if (isset($this->_items[$i])) {
   if ($this->_items[$i]->object_id == $object_id)
                                 continue;
   else
        $temp_items[] = $this->_items[$i];
   }
  }
  $this->_items = $temp_items;
  unset($temp_items);
 }


 function getItems() {
         return $this->_items;
 }

 function updateQuantity($item,$delta,$index=false) {
         if ($index == false) {
          $index = $this->isFound($item);
         }
     $this->_items[$index]->quantity += $delta;
 }

 function emptyCart() {
         unset($this->_items);
         $this->_items = array();
         $this->_total = 0;
 }

 function total() {
  $this->_total = 0;
  for ($i=0;$i<count($this->_items);$i++) {
                 if (isset($this->_items[$i])) {
                         $this->_total += number_format((double)($this->_items[$i]->quantity*$this->_items[$i]->price),2, '.', '');
                 }
         }
 }

}

function inSession() {
        global $cart_name;
        global $cart_object;

        if (isset($_SESSION[$cart_name]))
                $cart_object = unserialize($_SESSION[$cart_name]);
        else
                $cart_object = new faucart();
}

function toSession() {
        global $cart_name;
        global $cart_object;

        if (isset($_SESSION[$cart_name]))
                unset($_SESSION[$cart_name]);
        $_SESSION[$cart_name] = serialize($cart_object);
}

inSession();
?>