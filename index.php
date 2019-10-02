<html  lang="en-US">
<?php include 'item.php';
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
            <input type=submit value="Enter" >
            <form method="post"  enctype="multipart/form-data">
                <br>
                <label> Insert Picture </label>
                <input type="file" name="fileToUpload" id = "fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>

        </form>
    </section>
    <div>
        <section>
            <h2>Items added:</h2>
            <textarea readonly>
                <?php
                    //dis_added();
                ?>
            </textarea>
        </section>
    </div>
    <aside>
        <h2>Inventory:</h2>
        <textarea>
            <?php
                //display_inventory();
            ?>
        </textarea>
    </aside>
</div>


</html>
<?
$target_dir = "img/";
$target_file = $target_dir.basename($_FILES["fileToUpload"][$name]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = new item($_POST["plu"], $_POST["name"]);
    itemList:: add_item($item);


    dis_added();
}


/**
 *
 */
function dis_added(){
    global $arr;
    $arr = itemList:: getList();

    if($arr != null){
        foreach ($arr as &$item){
            return $item->getPLU().$item->getName();
        }
    }
}

function display_inventory(){
    global $filePath;
    if($filePath == null)
        echo"Store does not have inventory.";
    foreach ($filePath as &$path){
        if(file_exists($path)){
            $file = nl2br(file_get_contents($path));
            echo $file;
        }
    }
}

?>
