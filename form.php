<?php
    require 'config.inc.php';

    $name = '';
    //$password = '';
    $gender = '';
    $color = '';
    //$languages = [];
    //$comments = '';
    //$tc = '';

    if (isset($_POST['submit'])){
        $ok = true;

        if(!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        }else{
            $name = $_POST['name'];
        }
        /* if(!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
        }else{
            $password = $_POST['password'];
        } */
        if(!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        }else{
            $gender = $_POST['gender'];
        }
        if(!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        }else{
            $color = $_POST['color'];
        }
        /* if(!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
            $ok = false;
        }else{
            $languages = $_POST['languages'];
        } */
        /* if(!isset($_POST['comments']) || $_POST['comments'] === '') {
            $ok = false;
        }else{
            $comments = $_POST['comments'];
        } */
        /* if(!isset($_POST['tc']) || $_POST['tc'] === '') {
            $ok = false;
        }else{
            $tc = $_POST['tc'];
        } */
        
        if($ok) {
            //add database code here
            $db = new mysqli(
                MYSQL_HOST,
                MYSQL_USER,
                MYSQL_PASSWORD,
                MYSQL_DB
            );

            $sql = $db->prepare(
                "INSERT INTO users (name, gender, color) VALUES (
                    ?, ?, ?)");
            $sql->bind_param('sss', $name, $gender, $color);
            $sql->execute();

            echo '<p>User added.</p>';
            $db->close();
        }
    }
?>
<html>
<head>
</head>
<body>
<form
    action=""
    method="post">
    User name: <input type="text" name="name" value="<?php
      echo htmlspecialchars($name, ENT_QUOTES);  
    ?>"><br>
    Gender:
        <input type="radio" name="gender" value="f" <?php
            if($gender === 'f'){
                echo 'checked';
            }
        ?>>female
        <input type="radio" name="gender" value="m" <?php
            if($gender === 'm'){
                echo 'checked';
            }
        ?>>male
        <input type="radio" name="gender" value="o" <?php
            if($gender === 'o'){
                echo 'checked';
            }
        ?>>other <br>
    Favorite color:
        <select name="color">
            <option value="">Please Select</option>
            <option value="#f00" <?php
                if($color === '#f00'){
                    echo 'selected';
                }
            ?>>red</option>
            <option value="#0f0" <?php
                if($color === '#0f0'){
                    echo 'selected';
                }
            ?>>green</option>
            <option value="00f" <?php
                if($color === '#00f'){
                    echo 'selected';
                }
            ?>>blue</option>
        </select><br>
    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>