<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Please fill the below details to create table</h2>
    <form action="#" method="post">
        <input type="text" name="table_name" id="" placeholder="Enter Table Name">
        <input type="number" name="table_column" id="" placeholder="Enter no of column">
        <input type="submit" value="next">
        <br>

    </form>
    <h3>Enter column details</h3>
    <?php
    $table_column=$_POST['table_column'];
    $i=0;

    while($i<$table_column){
        echo"<form action=\"#\" method=\"post\">
        <input type=\"text\" name=\"$i\" placeholder=\"Enter column name\">
    </form>";
    $i++;
    }

    echo"<form action=\"Table.php\" method=\"post\">
        <input type=\"submit\" value=\"create table\">
    </form>";
    ?>
    
</body>
</html>