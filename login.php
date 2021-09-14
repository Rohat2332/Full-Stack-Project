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
<style type="text/css">

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #signup{
        font-family: Arial;
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
        text-decoration: none;
        font-size: 12px;
    }

    #box{

        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

<div id="box">
    <form method="post">
        <div style="text-align: center;font-size: 20px;margin: 10px;color: white;font-family: Arial;font-weight: bold">Login</div><br>
        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>
        <center>
        <input id="button" type="submit" value="Login"><br><br><br>

        <a id="signup" href="signup.php">Click to Signup</a><br><br>
        </center>
    </form>
</div>
</body>
</html>