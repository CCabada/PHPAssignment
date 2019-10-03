<?php


class item extends itemList
{
    public $plu;
    public $name;
    public $picture;
    public $priority;
    public $quantity;
    function __construct($plu, $name){
        $this -> plu = $plu;
        $this ->name = $name;
        $this ->picture = '';
        $this ->priority = 0;
        $this ->quantity = 0;

    }
    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }


}

class itemList{
    public $item_arr = array();

    function add_item($item){

        if($this->isItemInList($item)){
            echo "item is already in array.";
            $item -> quantity++;
        }
        array_push($this->item_arr, $item);
        $item -> quantity++;
        $cnt = count($this->item_arr);
        sort($this->item_arr);
    }
    function isItemInList($pro){
        if (in_array($pro, $this->item_arr)){
            return True;
        }
        return False;
    }
    function getList(){
        return $this ->item_arr;
    }
    function count($item_arr){
        $i = 0;
        while($item_arr[i] != null){
            $i++;
        }
        return $i;
    }
    function delete_item($item_arr, $plu){

        //if(array_key_exists(item::$plu, $item_arr))
        for($i =0; $item_arr[$i] != null; $i++){
            if($item_arr[$i]->plu == $plu){

                $item_arr[$i] = null;
                echo "Item deleted";
            }

        }
    }


}
