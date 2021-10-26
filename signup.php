<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<style>
    body{
        backdrop-filter: blur(5px);
        background-image: url("background_site.jpg");
    }

    #text{
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: #b3e680;
        border: none;
        border-radius: 18px;
        font-size: 15px;
    }

    #login{
        font-family: Arial;
        text-decoration: none;
        padding: 10px 24px 10px;
        width: 110px;
        color: white;
        background-color: #b3e680;
        border: none;
        border-radius: 18px;
        font-size: 15px;

    }

    #box{
        box-shadow:0 0 10px darkgray, 0 0 15px black;
        background-color: #ccff99;
        margin: auto;
        width: 300px;
        padding: 20px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 20px;
    }

    #button:hover,
    #login:hover{
        background-color: #7ea955;
    }
</style>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="box">

    <form method="post">
        <div  style="text-shadow: 0 0 3px gray, 0 0 5px grey;text-align: center;font-size: 20px;margin: 10px;color: white;font-family: 'Ubuntu', sans-serif;font-weight: bold">Signup</div>
<br>
        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>
        <center>
        <input id="button" type="submit" value="Signup"><br><br><br>

        <a id="login" href="login.php">Log In</a><br><br><br>
        </center>
    </form>
</div>
</body>
</html>