<?php include 'filesLogic.php';
session_start();
echo $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>Download files</title>
</head>
<body>
<a href="logout.php">Logout</a>
<a href="index.php">Return</a>
<table>
    <thead>
    <th>ID</th>
    <th>Filename</th>
    <th>size (in mb)</th>
    <th>Downloads</th>
    <th>Action</th>
    </thead>
    <tbody>
    <?php foreach ($files as $file):
        if ($file['userid'] == $_SESSION['user_id']) {
            echo "<tr>
            <td>".$file['id']."</td>
            <td>".$file['name']."</td>
            <td>".floor($file['size'] / 1000) . ' KB' . "</td>
            <td>".$file['downloads']."</td>
            <td><a href='downloads.php?file_id=".$file['id']."'>Download</a></td>
         </tr>";
        }
    endforeach;?>

    </tbody>
</table>

</body>
</html>