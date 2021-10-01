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

        //read from database
        $query = "select  * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Wrong Username or Password!";
    }else
    {
        echo "Wrong Username or Password!";
    }
}
?>

<html>
<head>
    <title>Login</title>
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

    #signup{
        font-family: Arial;
        text-decoration: none;
        padding: 10px 22px 10px;
        width: 100px;
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
    #signup:hover{
        background-color: #7ea955;
    }
</style>

<div id="box">
    <form method="post">
        <div style="text-shadow: 0 0 3px gray, 0 0 5px grey;text-align: center;font-size: 20px;margin: 10px;color: white;font-family: 'Ubuntu', sans-serif;font-weight: bold">Log In</div><br>
        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>
        <center>
        <input id="button" type="submit" value="Login"><br><br><br>

        <a id="signup" href="signup.php">Sign Up</a><br><br>
        </center>
    </form>
</div>
</body>
</html>