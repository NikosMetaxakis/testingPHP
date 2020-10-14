<?php
    $name = '';
    $password = '';
    $gender = '';
    $color = '';
    $languages = [];
    $comments = '';
    $tc = '';

    if (isset($_POST['submit'])){
        $ok = true;

        if(!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        }else{
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        }
        if(!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
        }else{
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        }
        if(!isset($_POST['gender']) || $_POST['gender'] === '') {
            $ok = false;
        }else{
            $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES);
        }
        if(!isset($_POST['color']) || $_POST['color'] === '') {
            $ok = false;
        }else{
            $color = htmlspecialchars($_POST['color'], ENT_QUOTES);
        }
        if(!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
            $ok = false;
        }else{
            $languages = $_POST['languages'];
        }
        if(!isset($_POST['comments']) || $_POST['comments'] === '') {
            $ok = false;
        }else{
            $comments = $color = htmlspecialchars($_POST['comments'], ENT_QUOTES);
        }
        if(!isset($_POST['tc']) || $_POST['tc'] === '') {
            $ok = false;
        }else{
            $tc = htmlspecialchars($_POST['tc'], ENT_QUOTES);
        }
        
        if($ok) {
            printf("User name: %s
            <br>Password: %s
            <br>Gender: %s
            <br>Color: %s
            <br>Language(s): %s
            <br>Comments: %s
            <br>T&amp;C: %s",
            $name,
            $password,
            $gender,
            $color,
            htmlspecialchars(implode(' ', $languages),  ENT_QUOTES),
            $comments,
            $tc
            );
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
    User name: <input type="text" name="name" value=""><br>
    Password: <input type="password" name="password"><br>
    Gender:
        <input type="radio" name="gender" value="f">female
        <input type="radio" name="gender" value="m">male
        <input type="radio" name="gender" value="o">other <br>
    Favorite color:
        <select name="color">
            <option value="">Please Select</option>
            <option value="#f00">red</option>
            <option value="#0f0">green</option>
            <option value="00f">blue</option>
        </select><br>
    languages spoken:
        <select name="languages[]" multiple size="3">
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="it">Italian</option>
        </select><br>
    Comments: <textarea name="comments"></textarea><br>
    <input type="checkbox" name="tc" value="ok">
        I accept the T&amp;C<br>
    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>