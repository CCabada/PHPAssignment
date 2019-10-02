<html  lang="en-US">
<?php
$filePath = "invoice-sep20.txt";
$name = $plu ='';
$inventory = array();
?>
<head>
    <title>Super Market</title>
</head>
<div style="text-align: center;">
    <h1>Super Market</h1>

</div>
<body>

<div style="text-align: center;" >

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
            <input type="file" name="file">
            <input type="submit" value="Upload Image" name="submit">
        </form>

    </form>
    <h2>Inventory:</h2>
    <textarea >
    <?php
    display($filePath);
    ?>
    </textarea>
</div>
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

</html>
<?php include "item.php";
$target_dir = "img/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
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
    item::add_item($_POST["plu"], $_POST["name"]);
}


function display($filePath){
    if(file_exists($filePath)){
        $file = nl2br(file_get_contents($filePath));
        echo $file;
    }

}

function show_items(){
    global $filePath;
    if(file_exists($filePath)){
        $fp = fopen($filePath, "r"); //Reads
        while(!feof($fp)){
            echo fgets($fp); //Reads line
        }
        fclose($fp);
    }
}

function add_items($plu, $name){
    global $filePath;
    global $inventory;
    if(!empty($plu) && !empty($name)){
        $inventory = add_item(new item($plu, $name));
        $file = fopen($filePath, "a");
        fputs($file, nl2br($inventory));
        fclose($file);
    }

}

?>
