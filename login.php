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
        color: #FFFFFF;
        font-family: arial, sans-serif;
        font-size: 40px;
        font-weight: bold;
    }
    h2{
        color: #FFFFFF;
        font-family: arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
    }

    label{
        color: #FFFFFF;
        font-family: arial, sans-serif;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<div style="text-align: center;">
    <h1> Welcome to Super Market</h1>

    <div>
        <img src="img/login.png" alt="myPic" />
        <h2> Sign In:</h2>
    </div>
    <form action="index.php" method="post"></form>
    <label for = "username"> User:
    <input type = "text" pattern = "[A-Za-z0-9]+" maxlength="15" name = "username">
    </label>
    <label for = "password"> Password:
    <input type="password"  pattern = "[A-Za-z0-9]+" maxlength="15" name="password">
    </label>

    <input type="submit" value="Login">

</div>

</html>