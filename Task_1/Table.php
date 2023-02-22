<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>
<body>

<form action="Database.php" method="post">
    <input type="submit" name="back" value="Back to Database">
</form>

<form action="#" method="post">
    <input type="submit" name="create_table" value="Create Table">
    <input type="submit" name="insert_data"value="Insert Data">
    <input type="submit" name="delete_data" value="Delete row">
    <input type="submit" name="display_table" value="Display Table">
    <input type="submit"  name="drop_table" value="Drop Table">
</form>

<?php
if(isset($_POST["create_table"]))
{
    $localhost = "localhost";
    $user = "root";
    $pass = "";
    $db="jokaltech";

    // Create connection
    $conn = mysqli_connect($localhost, $user, $pass, $db);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // $table_name=$_POST['table_name'];
    // $table_column=$_POST['table_column'];

    // $j=0;
    // while($i<$table_column){
    //     $column[j]=$_POST[$i];
    // }
    $sql = 'CREATE TABLE Employee  
    (  
    EmployeeID int,  
    FirstName varchar(255),  
    LastName varchar(255),  
    Email varchar(255),  
    AddressLine varchar(255),  
    City varchar(255)  
    )' ;

    if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
    echo"<form action=\"#\" method=\"post\">
    <input type=\"text\" name=\"empid\" id=\"\" placeholder=\"Employee Id\" required>
    <input type=\"text\" name=\"fn\" id=\"\" placeholder=\"First Name\"required>
    <input type=\"text\" name=\"ln\" id=\"\" placeholder=\"Last Name\"required>
    <input type=\"text\" name=\"email\" id=\"\" placeholder=\"Email\"required>
    <input type=\"text\" name=\"address\" id=\"\" placeholder=\"Address\" required>
    <input type=\"text\" name=\"city\" id=\"\" placeholder=\"City\"required>
    <input type=\"submit\" name=\"insert_data\" value=\"Insert New Data\">
    </form>";

    } else {
    echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>

<?php
if(isset($_POST["delete_data"])){
    $host="localhost";
    $user="root";
    $password="";
    $db_name="jokaltech";
    if(!$cxn = mysqli_connect($host,$user,$password,$db_name))
    {
        $message=mysqli_error($cxn);
        echo $message;
        die();
    }
    
    mysqli_select_db($cxn,"jokaltech") or die("couldnt connect to database");
    $que="DELETE FROM Employee WHERE EmployeeID=(SELECT MAX(EmployeeID) FROM Employee)";
    if($cxn->query($que)){
        echo"Last Entry deleted successfully";
    }

}

?>

<?php
if(isset($_POST["insert_data"])){
    echo"<form action=\"#\" method=\"post\">
    <input type=\"text\" name=\"empid\" id=\"\" placeholder=\"Employee Id\" required>
    <input type=\"text\" name=\"fn\" id=\"\" placeholder=\"First Name\"required>
    <input type=\"text\" name=\"ln\" id=\"\" placeholder=\"Last Name\"required>
    <input type=\"text\" name=\"email\" id=\"\" placeholder=\"Email\"required>
    <input type=\"text\" name=\"address\" id=\"\" placeholder=\"Address\" required>
    <input type=\"text\" name=\"city\" id=\"\" placeholder=\"City\"required>
    <input type=\"submit\" name=\"insert_data\" value=\"Insert New Data\">
    </form>";
    $host="localhost";
    $user="root";
    $password="";
    $db_name="jokaltech";
    if(!$cxn = mysqli_connect($host,$user,$password,$db_name))
    {
        $message=mysqli_error($cxn);
        echo $message;
        die();
    }

    $empid=$_POST['empid'];
    $fn=$_POST['fn'];
    $ln=$_POST['ln'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];    
    mysqli_select_db($cxn,"jokaltech") or die("couldnt connect to database");
    $que="INSERT INTO Employee values('$empid', '$fn', '$ln','$email', '$address', '$city')";
    if($cxn->query($que)){
        echo"data inserted successfully";
    }

}

?>
<?php
if(isset($_POST["drop_table"])){
    $host="localhost";
    $user="root";
    $password="";
    $db_name="jokaltech";
    if(!$cxn = mysqli_connect($host,$user,$password,$db_name))
    {
        $message=mysqli_error($cxn);
        echo $message;
        die();
    }

    mysqli_select_db($cxn,"jokaltech") or die("couldnt connect to database");
    $que="DROP TABLE Employee";

    if($cxn->query($que)){
        echo "Table deleted successfully";
    }
    

}

?>


<?php
if(isset($_POST["display_table"])){
$result=getdata();
echo"<table border=1>";
echo"<th>EmployeeID</th><th>FistName</th><th>LastName</th><th>Email</th><th>AddressLine</th><th>City</th>";
while($row=mysqli_fetch_assoc($result))
{
    echo"<tr>";
    echo"<td>".$row['EmployeeID']."</td><td>".$row['FirstName']."</td><td>".$row['LastName']."</td><td>".$row['Email']."</td><td>".$row['AddressLine']."</td><td>".$row['City']."</td>";
    echo"</tr>";
}
echo"</table>";



}
function getdata()
{
    $host="localhost";
    $user="root";
    $password="";
    $db_name="jokaltech";
    if(!$cxn = mysqli_connect($host,$user,$password,$db_name))
    {
        $message=mysqli_error($cxn);
        echo $message;
        die();
    }
    
    mysqli_select_db($cxn,"jokaltech") or die("couldnt connect to database");
    $que="SELECT * FROM Employee";
    $result=mysqli_query($cxn,$que);
    return $result;
}
?>


</body>
</html>