<?php
session_start();
// PHP Data Objects(PDO) Sample Code:



if(isset($_POST["submit"]))
{
$message = "Thank you for entering your details.";
echo "<script type='text/javascript'>alert('$message');</script>";

}

try {
    $conn = new PDO("sqlsrv:server = tcp:server-9650.database.windows.net,1433; Database = users", "rootadmin", "Shubham@9650");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "rootadmin", "pwd" => "Shubham@9650", "Database" => "users", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:server-9650.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
 $fname=$_POST['fname'];
    $lname=$_POST['lname'];
$query1="INSERT INTO details (fname, lname) VALUES (?, ?)";
$params = array($fname, $lname);

$stmt = sqlsrv_query( $conn, $query1, $params);

if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}


?>


<!DOCTYPE html>
<html>
    <head>
    <title>Retrieve Your last name</title>
    </head>
    <body>
        <h1> Enter your first name:</h1>
    
            <form method="post">
            <label for="fname1">First Name:</label>
            <input type="text" id="fname1" name="fname1">
                <br/>
            
            <input type="submit" id="submit2" name="submit2" value="check my Last Name">
               
        </form>
<?php
        
        if(isset($_POST["submit2"])){
                        
                        
        $name=$_POST['fname1'];
            
       $query2="SELECT lname FROM details WHERE fname=?";
     
        $stmt2= sqlsrv_prepare( $conn, $query2, array( &$name));

if( sqlsrv_execute( $stmt2))  
{  
      
     $row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
    $result=$row['lname'];
        echo '<script type="text/javascript">alert("your last name is: '.$result.'");</script>';


}  
else  
{  
     echo "Error in executing statement.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
       
        
        
       
            
            
            
        

        
       }

 


           sqlsrv_close( $conn);
        
        ?>
        
        
        
        
        
    </body>




</html>
