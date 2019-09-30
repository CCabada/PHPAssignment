<?php include "item.php";

use function Sodium\add; ?>
<html>

<head>
    <title>Super Market</title>
    <div style="text-align: left;">
        <button onclick="validation">Sign - In</button>

    </div>
    <style>
        body{
            background-image: url("Supermarket-shopping-cart-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<div style="text-align: center;">
    <h1>Super Market</h1>
    <style>
        h1 {
            color: #FFFFFF;
            font-family: arial, sans-serif;
            font-size: 40px;
            font-weight: bold;
        }
        h3{
            color: #FFFFFF;
            font-family: arial, sans-serif;
            font-size: 20px;
            font-weight: bold;

        }
    </style>
</div>
<body>


<div style="text-align: center;">

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for = "plu" color = #FFFFF >
            PLU
            <input type="text" name = "plu">
        </label>
        <label for = "name" >
            Name
            <input type="text" name="name">
        </label>
        <p/>
        <input type=submit value="Enter">


    </form>
    <h2>Inventory:</h2>
    <?php
    if(isset($_POST["inventory"])){
        add_note($_POST["note"] . "<br>");
    }
    display();
    ?>
</div>


</html>
<?php
$filePath = "inventory.txt";
$name = $plu ='';
$inventory = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    add_items($_POST["plu"], $_POST["name"]);
}


function display(){
    global $filePath;
    if(file_exists($filePath)){
        $file = nl2br(file_get_contents($filePath));
        echo $file;
    }
}

function add_items($plu, $name){
    global $filePath;
    global $inventory;

    if(!empty($plu) && !empty($name)){
        $inventory = add($plu, $name);
        $file = fopen($filePath, "a");
        fputs($file, nl2br($inventory));
        fclose($file);
    }
}

?>
