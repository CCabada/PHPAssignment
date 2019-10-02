<html  lang="en-US">
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
<div style="text-align: center;">
    <h1> Welcome to SuperMarket</h1>
    <div>
        <img src="img/login.png" alt="myPic" />
        <h2> Sign In:</h2>
    </div>
    <form action="index.php" method="POST">
    <label for = "username"> User:
        <input type = "text" required pattern = "[A-Za-z0-9]+" maxlength="15" name = "username">
    </label>
    <label for = "password"> Password:
        <input type="password"  required pattern = "[A-Za-z0-9]+" maxlength="15" name="password">
    </label>

    <input type="submit" value="Login"  >
    </form>

</div>
<?php
$username = "admin";
$password = "pass1234";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    verify($_POST["username"], $_POST["pass"]);
}

function verify($usr, $psw){
    global $username, $password;

    if($usr != $username && $psw != $password){
        echo "Wrong account information. Please try again.";
    }
}
?>
</html>