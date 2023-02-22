
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
<form action="#" method="post">
    <input type="text" name="db_name" id="" placeholder="Name for the Database" required>
    <input type="submit" name="create_database" value="Create Database">
    <input type="submit" name="drop_database"  value="Drop Database">
    <input type="submit" name="rename"  value="Rename Database">
</form>



<?php
    if(isset($_POST["create_database"]))
    {
        $localhost = "localhost";
        $user = "root";
        $pass = "";

        // Create connection
        $conn = new mysqli($localhost, $user, $pass);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $db_name = $_POST['db_name'];
        // Create database
        $sql = "CREATE DATABASE $db_name";
        if ($conn->query($sql) == true) {
        echo "Database created successfully";
        echo $db_name;
        echo "<form action=\"Table.php\" method=\"post\">
        <input type=\"submit\" value=\"Go to create Table\">
    </form>";
        }else{
           echo $conn->error; 
        }

        $conn->close();
    }

    if(isset($_POST["drop_database"]))
    {
        $localhost = "localhost";
        $user = "root";
        $pass = "";

        // Create connection
        $conn = new mysqli($localhost, $user, $pass);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "DROP DATABASE jokaltech";
        if ($conn->query($sql) === TRUE) {
        echo "Database Deleted successfully";
        } else {
        echo "Error Deleting database: " . $conn->error;
        }

        $conn->close();
    }
    
?>

</body>
</html>
