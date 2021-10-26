<?php
session_start();

include("connection.php");
include("functions.php");
include 'filesLogic.php';

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
</head>
<body>
<a href="logout.php">Logout</a>
<div class="container">
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
            <center>
            <div class="h3">
            <h3>Upload File</h3>
            </div>
            </center><br>
                <input type="file" name="myfile"> <br>
            <button id="button" type="submit" name="save">Upload</button>
        </form>
        <center>
        <form action="downloads.php">
            <button style="padding: 10px 130px 10px" id="button" type="submit">Download Files</button>
        </form
        </center>
    </div>
</div>

</body>
</html>
