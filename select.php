<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select from db</title>
</head>
<body>
<ul>
<?php

    $db = new mysqli(
        'localhost',
        'root',
        '',
        'php'
    );

    $sql = 'SELECT * FROM users';
    $result = $db->query($sql);

    foreach ($result as $row) {
        printf(
            "<li><span style='color: %s'>%s (%s)</span>\n
            <a href=\"delete.php?id=%s\">delete</a>\n       
            <a href=\"update.php?id=%s\">update</a></li>\n",//extremely not secure ..
            htmlspecialchars($row['color'], ENT_QUOTES),
            htmlspecialchars($row['name'], ENT_QUOTES),
            htmlspecialchars($row['gender'], ENT_QUOTES),
            htmlspecialchars($row['id'], ENT_QUOTES),
            htmlspecialchars($row['id'], ENT_QUOTES)
        );
    }

    $db->close();
?>
</ul>


</body>
</html>

