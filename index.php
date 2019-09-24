<html>

<head>
    <title>Super Market</title>
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
        h5{
            color: #FFFFFF;
            font-family: arial, sans-serif;
            font-size: 20px;
            font-weight: bold;
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
</div>
<body>
<?php
$myfile = fopen("produce.txt", "r") or die("Unable to open file!");
$document = file_get_contents("produce.txt");
$name = $plu ='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"], $document);
    $plu = test_input($_POST["plu"], $document);
}

function test_input($data, $doc){
    if($data == $doc){
        echo $doc;
    }
}


fclose($myfile);
?>

<div style="text-align: center;">
<h5>Enter PLU and Name.</h5>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <textarea cols=10 rows=1 name="plu"> </textarea> <textarea cols=10 rows=1 name="name"> </textarea>
    <p/>
    <input type=submit value="Send">
</form>
</div>
<div style="text-align: center;">
    <button>Sign - In</button>

</div>

</html>