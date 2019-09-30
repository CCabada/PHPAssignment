<?php
$item_arr = array();

class item{


    function item($plu, $name){
        $this->plu;
        $this->name;
        $this->item($plu, $name);
    }

    function add_item($item_arr){
        $cnt = count($item_arr);
        sort($item_arr);
    }
    function count($item_arr){
        $i = 0;
        while($item_arr[i] != null){
            $i++;
        }
        return $i;
    }
    function delete_item($item_arr, $plu){

        for($i =0; $item_arr[$i] != null; $i++){
            if($item_arr[$i]->plu == $plu){

                $item_arr[$i] = null;
                echo "Item deleted";
            }

        }
    }




}