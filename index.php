<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
    <title>About You</title>
    </head>
    <body>
        <h1> Type your first name and last name:</h1>
    
            <form method="post" action="insert.php">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname">
                <br/>
            
            <label for="lname">Last Name:</label>    
            <input type="text" id="lname" name="lname">
            
            <br/>
            
            <input type="submit" value="submit" name="submit">
               
        </form>

        
        
        
        
        
    </body>




</html>