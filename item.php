<?php


class item extends itemList
{
    var $plu;
    var $name;

    public function __construct($plu, $name)
    {
        $this->item($plu, $name);
    }

    public function setPLU($par)
    {
        $this->plu = $par;
    }

    public function getPLU()
    {
        echo $this->plu;
    }

    public function setName($par)
    {
        $this->name = $par;
    }

    public function getName()
    {
        echo $this->name;
    }
    public function getItem(){
        return $this;
    }

}

class itemList{
    public $item_arr = array();

    function add_item($item){
        array_push($item_arr, $item);
        $cnt = count($item_arr);
        sort($item_arr);
    }

    function getList(){
        global $item_arr;
        return $item_arr;
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
