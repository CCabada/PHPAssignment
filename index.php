<html  lang="en-US">
<?php include 'item.php';
session_start();
$arr = new itemList();
$filePath = array("invoice-sep20.txt", "invoice-sep10.txt");

$name = $plu ='';

?>
<style>
    body{

        width: 100%;
        height: 100%;
        background-image: url("img/Supermarket-shopping-cart-1.jpg");
        background-repeat: no-repeat;
        background-position: center;


    }
    h1 {
        color: #000000;
        font-family: arial, sans-serif;
        font-size: 40px;
        font-weight: bold;
    }
    h2{
        color: #000000;
        font-family: arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
    }
    h3{
        color: #FFFFFF;
        font-family: arial, sans-serif;
        font-size: 20px;
        font-weight: bold;

    }
    label{
        color: #000000;
        font-family: arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<head>
    <title>Super Market</title>
</head>
<div style="text-align: center;">
    <h1>Super Market</h1>

</div>
<body>

<div style="text-align: center;" >
    <section>
        <form  method="POST">
            <label for = "plu"  >
                PLU
                <input type="text" placeholder="PLU" pattern = "[0-9]{4}" maxlength="4" name = "plu" >
            </label>
            <label for = "name" >
                Name
                <input type="text"  placeholder="Name" pattern = "[A-Za-z]+" name="name">
            </label>
            <div>
                Upload a File:
                <input name="image" type="file"/>
                <input type=submit value="Add item" />
            </div>
        </form>

    </section>
    <div>
        <section>
            <h2>Items added:</h2>
            <textarea readonly rows = 10 cols = 50>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $_SESSION["plu"] = $_POST["plu"];
                    $_SESSION["name"] = $_POST["name"];
                    $item = new item($_POST["plu"], $_POST["name"]);
                    $itemL = (new itemList)->add_item($item);
                    dis_added($itemL);
                }

                ?>
            </textarea>
            </br>
            </br>
            <input class='button btn-2' type='submit' name ='reorder' value='Reorder List'
        </section>
    </div>
    <div>
        <aside>
            <h2>Inventory:</h2>
            <textarea readonly rows = 10 cols = 50>

                <?php
                print(display_inventory());
                ?>
        </textarea>
        </aside>
    </div>

</div>


</html>
<?php
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"img/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}




/**
 *
 */
function dis_added($itemL){
    //echo $item->plu.$item->name;
     //if($itemL != null){

         foreach ($itemL as &$product){
             echo $product->plu.$product->name;
         }
    /*
    if ($product->picture !== ""){
        echo "<td><img src='" . $product->picture . "' alt='' height=40 width=40></img></td>";
    }else{
        echo "<td>";
    }
//}
// Create table

foreach ($itemL as $product){
echo "<tr>";
if ($product->picture !== ""){
  echo "<td><img src='" . $product->picture . "' alt='' height=40 width=40></img></td>";
}else{
  echo "<td>";
}
echo "<td>" . $product->name . "</td>";
echo "<td>" . $product->plu . "</td>";
// Checkboxes
echo "<td><input type='checkbox' name='checkbox[]' value=" . $product->plu . "/></td>";
echo "</tr>";
}
*/
}

function display_inventory(){
    global $filePath;
    if($filePath == null)
        echo"Store does not have inventory.";
    foreach ($filePath as &$path){
        if(file_exists($path)){
            if ($fh = fopen($path, 'r')) {
                while (!feof($fh)) {
                    $line = fgets($fh);
                    list($SKU, $price, $number, $expDate) = explode(" ", $line);
                    echo "SKU = $SKU Price = $price Number = $number Experation date = $expDate </p>";
                }

            }
            fclose($fh);

        }
    }
}


?>
