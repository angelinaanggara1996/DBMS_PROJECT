<?PHP
    
$servername = "localhost";
    
$username = "angel";
    
$password = "4516537";
    
$dbname = "dbms_pro";
    
    
$conn = new mysqli($servername, $username, $password, $dbname);
    
// Check connection
    
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    
$sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
    
    
function get_buttons()
    {
        
	$str = '';
        
	$btns = array(
                      1=>'Save',
                      2=>'Select',
                      3=>'Delete',
                      4=>'Update',
        );
        
	while (list($k,$v)=each($btns))
        
	{	
            
		$str.='<input type="submit" value="'.$v.'" name="btn_'.$k.'" id="btn_"'.$k.'""/>';
        
	}
        return $str;
    
}
    
    
if(isset($_POST['btn_1']))
    
{
    	
	//echo "Save";
    	
	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
				
		VALUES ('John', 'Doe', 'john@example.com')";
    
}
    
    
if(isset($_POST['btn_2']))
   
{
    	
	//echo "Select";
    	
	$sql = "SELECT id, firstname, lastname FROM MyGuests";
		
	$result = $conn->query($sql);
		
	if ($result->num_rows > 0) {
    
		// output data of each row
    	
		while($row = $result->fetch_assoc()) {
        	
			echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	
		}
		
	} 
	else {
    		
		echo "0 results";
		
	}
    
}
    
    
if(isset($_POST['btn_3']))
    {
    	echo "Delete";
    }
    
if(isset($_POST['btn_4']))
    {
    	echo "Update";
    }
    
    
if ($conn->query($sql) === TRUE) {
        
	//echo "Table MyGuests created successfully";
    
} 
else {
        
	//echo "Error creating table: " . $conn->error;
    
}
    
$conn->close();
    

?>



<!DOCTYPE html>

<html>
    
<head>
    
</head>
    
<body>
    	
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
        
<div id="button_panel">
            
<?PHP echo get_buttons(); ?>
        
</div>
        
</form>

    
</body>
</html>
