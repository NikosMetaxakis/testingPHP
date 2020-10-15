<?php
require 'config.inc.php';

    session_start();

$message = '';

if(isset($_POST['name']) && isset($_POST['password'])){
    $db = new mysqli (
        MYSQL_HOST,
        MYSQL_USER,
        MYSQL_PASSWORD,
        MYSQL_DB
    );
    $sql = sprintf("SELECT * FROM users WHERE name='%s'",
        $db->real_escape_string($_POST['name']));
    
    $result = $db->query($sql);
    $row = $result->fetch_object();
    
    if($row != null) {
        $hash = $row->hash;
        if(password_verify($_POST['password'], $hash)){
            $message = 'Login successful.';

            $_SESSION['username'] = $row->name;
            $_SESSION['isAdmin'] = $row->isAdmin;
        }else{
            $message = 'Login failed.';
        }
    }else{
        $message = 'Login failed.';
    }
}

echo $message;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form method="post" action="">
        Username: <input type="text" name="name"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
</body>
</html>



