<!DOCTYPE html>
<html>
    <head>
    </head>
    <body style="background-image:url('2.jpg')">
		<h1><center>Student Information Center
		</h1>    	
		<hr style="border-color: green;">
		</hr>
		<h2>Data System</h2>
    	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
			<table>
				<tr>
					<td style="font-size:20px" bgcolor= "00FF00" width="20%">
						Tool 
					</td> 
					<td style="font-size:20px" bgcolor= "dddddd">
				<select name="choose">
    			<option value="add"> Insert </option>
    			<option value="delete"> Delete </option>
    			<option value="search"> Search </option>
    			<option value="update"> Update </option>
				<option value="count"> Count students </option>
    			<option value="querry"> Querry </option>
				</select>
					</td>
				</tr>
				<tr>
					<td style="font-size:20px" bgcolor= "33FF74" width="30%">Keyword</td>
					<td style="font-size:20px width:500px" bgcolor= "dddddd"></td>
				</tr>
				<tr>
					<td style="font-size:20px" bgcolor= "33FFA8"></td>
					<td style="font-size:20px" bgcolor= "33FFA8" align="center">
        	<input type="submit" name="submit" value="Select">
					</td>
				</tr>
			</table>
        </form>
    </body>
</html>

<?PHP
	$servername = "localhost";
    $username = "angel";
    $password = "4516537";
    $dbname = "DBMS";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    if(isset($_POST['submit'])){
    	if($_POST['choose'] == "add" )
    	{
    		echo '<form action="#" method ="post">
    		<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
    		Name : <input type ="text" name = "name"> <br>
    		Student ID : <input type ="text" name = "id"> <br>
    		department ID : <input type ="text" name = "departmentid"> <br>
    		manage ID : <input type ="text" name = "manageid"> <br>
    		part time ID : <input type ="text" name = "parttimeid"> <br>
    		project ID : <input type ="text" name = "projectid"> <br>
    		<br>
    		<input type="submit" name="enter" value="enter">
    		</form>';
    		//echo '<p>department & manage id  ||  project id  ||  part time id ';
    	}
    	if($_POST['choose'] == "search" )
    	{
    		echo '<form action = "#" method="post">
    		<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
			List the data and the relation of table: 
			<select name="find">
    			<option value="department"> Department </option>
    			<option value="laboratory"> Laboratory </option>
    			<option value="professor"> Professor </option>
    			<option value="parttime"> Part Time </option>
    			<option value="project"> Project </option>
				<option value="student"> Student </option>
        	</select>
    		<br>
    		<input type="submit" name="search" value="search">
    		</form>';
			$sql = "SELECT * FROM student s,project pr,professor pf, parttime pt, laboratory l, department d 
					WHERE s.project_id=pr.proj_id AND s.dept_id=d.dept_id AND pr.professor_id=pf.pf_id
					GROUP BY s_id";
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				<th>Id</th>
				<th>name</th>
				<th>Proj_id</th>
				<th>Proj_name</th>
				<th>Prof_name</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["project_id"]. "</td>";
					echo "<td>" . $row["proj_name"]. "</td>";
					echo "<td>" . $row["pf_name"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}
    	}
		if($_POST['choose'] == "delete" )
		{
			$sql = "SELECT * FROM student WHERE s_id>0";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. " - dept_id: " . $row["dept_id"]. " - manage: " . $row["dept_manage"]. " - PTid: " . $row["parttime_id"]. " - PROid: " . $row["project_id"]."<br>";
				}
			} else {
				echo "0 results";
			}
			echo '<form action="#" method ="post">
			<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
				delete id : <input type ="text" name = "delrow"> <br><br>
				<input type="submit" name="ok" value="OK">
			</form>';
		}
		if($_POST['choose'] == "update" )
		{
			$sql = "SELECT * FROM student WHERE s_id>0";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. " - dept_id: " . $row["dept_id"]. " - manage: " . $row["dept_manage"]. " - PTid: " . $row["parttime_id"]. " - PROid: " . $row["project_id"]."<br>";
					//echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
				}
			} else {
				echo "0 results";
			}
			echo '<form action="#" method ="post">
			<input type="hidden" name="choose">
    		<input type="hidden" name="submit">
				update Id : <input type ="text" name = "uprow"> <br>
				<select name="sel">
				<option value="s_id"> ID </option>
    			<option value="s_name"> name </option>
    			<option value="dept_id"> department_id_study </option>
    			<option value="dept_manage"> department_id_manage </option>
    			<option value="parttime_id"> parttime_id </option>
				<option value="project_id"> project_id </option>
				</select>
				new value: <input type="text" name="value"><br>
				<input type="submit" name="change" value="Update">
			</form>';	
			
		}
		if($_POST['choose'] == "count" )
    	{
			$sql = "SELECT COUNT(*) FROM student ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "Total Student: " . $row["COUNT(*)"]. "<br>";
					//echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
				}
			} else {
				echo "0 results";
			}
		}
		if($_POST['choose'] == "querry" )
		{
			echo '<form action = "#" method="post">		
					<input type="hidden" name="choose">
    				<input type="hidden" name="submit">
					<textarea name="txtarea" style="width:300px; height:150px;"></textarea>
					<input type="submit" name="textarea" value="submit">
			</form>';
		}
    }
	if(isset($_POST['textarea'])){
    	$sql = $_POST['txtarea'];
    	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    		// output data of each row
			echo "<table border='1'>
				<tr>
				<th>Stu_Id</th>
				<th>Stu_name</th>
				<th>Department_id</th>
				<th>Manage Department</th>
				<th>PRoject ID</th>
				<th>PartTime_ID</th>
				</tr>";
    		while($row = $result->fetch_assoc()) 
			{	
				//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "- department id:" . $row["dept_id"]. "- department manage id:" . $row["dept_manage"]. "- project id:" . $row["project_id"]. "- part time id:" . $row["parttime_id"]."<br>";
				echo "<tr>";
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["dept_id"]. "</td>";
					echo "<td>" . $row["dept_manage"]. "</td>";
					echo "<td>" . $row["project_id"]. "</td>";
					echo "<td>" . $row["parttime_id"]. "</td>";
			}
			echo "</tr>";
			echo "</table>";
		} else {
			echo "0 results";
		}
    }
    if(isset($_POST['change'])){
		$sele= $_POST['sel'];
		$val= $_POST['value'];
		$row= $_POST['uprow'];
		$sql = "UPDATE student SET ".$sele." = '".$val."' WHERE s_id = ".$row."";
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
	}		
    if(isset($_POST['enter'])){
    	//echo "you select : " .$_POST['firstname'];
    	
    	$manageid= !empty("".$_POST['manageid']."") ? "".$_POST['manageid']."" : "NULL";
		$parttimeid = !empty("".$_POST['parttimeid']."") ? "".$_POST['manageid']."" : "NULL";
		$projectid = !empty("".$_POST['projectid']."") ? "".$_POST['projectid']."" : "NULL";
    	
    	$sql = "INSERT INTO student (s_id, s_name, dept_id, dept_manage, parttime_id, project_id)
				VALUES ('".$_POST['id']."', '".$_POST['name']."', '".$_POST['departmentid']."', $manageid, $parttimeid , $projectid)";
		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}
	if(isset($_POST['ok']))
	{
		$id = $_POST['delrow'];
		$sql = "DELETE FROM student WHERE s_id = ".$id."";
		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if(isset($_POST['search']))
	{
		$cle = $_POST['find'];
		if($cle=="student")
		{
			$sql = "SELECT *
					FROM student s
					WHERE EXISTS (SELECT *
									FROM department d
									WHERE s.dept_id=d.dept_id
								)
					 OR NOT EXISTS (SELECT *
									FROM department d, project pr, parttime pt
									WHERE s.dept_manage=d.dept_id AND s.project_id=pr.proj_id AND s.parttime_id=pt.pt_id
								)
					GROUP BY s_id
					HAVING COUNT(*)>0";
					
			/*$sql = "SELECT s_id,s_name,proj_name,pf_name,pt_name,dname,lab_name, COUNT(*)
					FROM student s, department d, project pr,professor pf, parttime pt, laboratory l
					WHERE s.dept_id=d.dept_id AND s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id AND 
									s.dept_manage=d.dept_id AND s.parttime_id=pt.pt_id AND pf.laboratory_id=l.lab_id
					GROUP BY s_id
					HAVING COUNT(*)>0";
					
			$sql = "SELECT * 
					FROM student s 
					WHERE EXISTS (SELECT * FROM department d
								  WHERE s.dept_id=d.dept_id) 
					AND NOT EXISTS (SELECT * FROM project pr,professor pf, parttime pt, laboratory l
								  WHERE s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id AND 
									s.dept_manage=d.dept_id AND s.parttime_id=pt.pt_id AND pf.laboratory_id=l.lab_id)
					";		
			$sql = "SELECT * 
					FROM student s
					LEFT OUTER JOIN department d ON s.dept_id = d.dept_id AND
					LEFT OUTER JOIN project pr ON s.project_id=pr.proj_id AND
					LEFT OUTER JOIN parttime pt ON s.parttime_id=pt.pt_id AND
					LEFT OUTER JOIN department d ON s.dept_manage = d.dept_id AND
					LEFT OUTER JOIN professor pf ON pr.professor_id= pf.pf_id AND
					LEFT OUTER JOIN laboratory l ON pf.laboratory_id=l.lab_id
					";
			*/
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				<th>Stu_Id</th>
				<th>Stu_name</th>
				<th>Proj_id</th>
				<th>parttime_id</th>
				<th>dept_id</th>
				<th>Manages_DeptID</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["project_id"]. "</td>";
					//echo "<td>" . $row["pf_name"]. "</td>";
					echo "<td>" . $row["parttime_id"]. "</td>";
					echo "<td>" . $row["dept_id"]. "</td>";
					echo "<td>" . $row["dept_manage"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}
		}
		if($cle=="project")
		{
			$sql = "SELECT *
					FROM student s, project pr,professor pf
					WHERE s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id
					ORDER BY project_id
					";
			$sum = "SELECT COUNT(*)
					FROM student s, project pr,professor pf
					WHERE s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id
					ORDER BY project_id
					";
					
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				<th>PRoject_id</th>
				<th>Proj_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>start</th>
				<th>end</th>
				<th>Prof_name</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["proj_id"]. "</td>" ;
					echo "<td>" . $row["proj_name"]. "</td>";
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["starting_date"]. "</td>" ;
					echo "<td>" . $row["deadline_date"]. "</td>" ;
					echo "<td>" . $row["pf_name"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}		
		}
		if($cle=="professor")
		{
			$sql = "SELECT *
					FROM student s, project pr,professor pf, laboratory l
					WHERE s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id AND pf.laboratory_id=l.lab_id
					ORDER BY professor_id
					";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				<th>Prof_ID</th>
				<th>Prof_name</th>
				<th>Proj_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>Gender</th>
				<th>OfficeNUM</th>
				<th>Lab_name</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["professor_id"]. "</td>" ;
					echo "<td>" . $row["pf_name"]. "</td>";
					echo "<td>" . $row["proj_name"]. "</td>";
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;					
					echo "<td>" . $row["sex"]. "</td>" ;
					echo "<td>" . $row["office_num"]. "</td>";
					echo "<td>" . $row["lab_name"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}		
		}
		if($cle=="parttime")
		{
			$sql = "SELECT *
					FROM student s, parttime pt
					WHERE s.parttime_id=pt.pt_id
					ORDER BY parttime_id
					";
			$max = "SELECT *
					FROM parttime
					WHERE salary IN (SELECT MAX(salary)
										FROM parttime
										)
					";
			$min = "SELECT *
					FROM parttime
					WHERE salary IN (SELECT MIN(salary)
										FROM parttime
										)
					";
			$avg = "SELECT AVG(salary)
					FROM parttime
					";
			$sum = "SELECT SUM(salary)
					FROM parttime
					";
			$result = $conn->query($sql);
			$result1= $conn->query($max);
			$result2= $conn->query($min);
			$result3= $conn->query($avg);
			$result4= $conn->query($sum);
			
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				
				<th>PT_Id</th>
				<th>PT_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>Salary</th>
				<th>location</th>
				<th>#ofEmployee</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["parttime_id"]. "</td>";
					echo "<td>" . $row["pt_name"]. "</td>" ;
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["salary"]. "</td>";
					echo "<td>" . $row["location"]. "</td>" ;
					echo "<td>" . $row["#ofEmployee"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} 	
			if ($result1->num_rows > 0) {
				while($row = $result1->fetch_assoc()) {
					echo "MAX Salary: " . $row["salary"]. " AS " . $row["pt_name"]. "<br>";
				}
			}
			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					echo "MIN Salary: " . $row["salary"]. " AS " . $row["pt_name"]. "<br>";
				}
			}
			if ($result3->num_rows > 0) {
				while($row = $result3->fetch_assoc()) {
					echo "Average Salary: " . $row["AVG(salary)"]. "<br>";
				}
			}
			if ($result4->num_rows > 0) {
				while($row = $result4->fetch_assoc()) {
					echo "SUM Salaries of all Job: " . $row["SUM(salary)"]. "<br>";
				}
			}
			else {
				echo "0 results";
			}	
		}
		if($cle=="laboratory")
		{
			$sql = "SELECT *
					FROM professor pf, laboratory l, student s, project pr
					WHERE pf.laboratory_id=l.lab_id AND s.project_id=pr.proj_id AND pr.professor_id=pf.pf_id
					ORDER BY lab_id
					";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<table border='1'>
				<tr>
				<th>Lab_Id</th>
				<th>Lab_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>Prof_name</th>
				<th>Project_name</th>
				<th>#ofStudent</th>
				<th>location</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["lab_id"]. "</td>";
					echo "<td>" . $row["lab_name"]. "</td>" ;
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["professor_name"]. "</td>";
					echo "<td>" . $row["proj_name"]. "</td>";
					echo "<td>" . $row["number_of_student"]. "</td>" ;
					echo "<td>" . $row["location"]. "</td>";
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}		
		}
		if($cle=="department")
		{
			$sql = "SELECT *
					FROM student s, department d
					WHERE s.dept_id=d.dept_id
					ORDER BY s.dept_id
					";
			$manage = "SELECT *
					FROM student s, department d
					WHERE s.dept_id=d.dept_id AND s.dept_manage=d.dept_id
					ORDER BY s.dept_id
					";
			$nocourse = "SELECT *
					FROM student s, department d
					WHERE s.dept_id=d.dept_id AND s.dept_manage=d.dept_id AND d.course NOT IN (SELECT course
																								FROM department
																								WHERE course=d.course)
					ORDER BY s.dept_id
					";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "Department List:";
				echo "<br>";
				echo "<table border='1'>
				<tr>
				<th>Department_Id</th>
				<th>Department_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>Course</th>
				<th>location</th>
				</tr>";
				while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["dept_id"]. "</td>";
					echo "<td>" . $row["dname"]. "</td>" ;
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["course"]. "</td>";
					echo "<td>" . $row["location"]. "</td>" ;
				}
				echo "</tr>";
				echo "</table>";
				echo "<br><br>";
			} else {
				echo "0 results";
			}
			
			$result1 = $conn->query($manage);
			if ($result1->num_rows > 0) {
				// output data of each row
				echo "Student manage department list:";
				echo "<br>";
				echo "<table border='1'>
				<tr>
				<th>Department_Id</th>
				<th>Department_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>ManageDept</th>
				<th>Course</th>
				<th>location</th>
				</tr>";
				while($row = $result1->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["dept_id"]. "</td>";
					echo "<td>" . $row["dname"]. "</td>" ;
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["dept_manage"]. "</td>" ;
					echo "<td>" . $row["course"]. "</td>";
					echo "<td>" . $row["location"]. "</td>" ;
				}
				echo "</tr>";
				echo "</table>";
				echo "<br><br>";
			} else {
				echo "0 results";
			}
			$result2 = $conn->query($nocourse);
			if ($result2->num_rows > 0) {
				// output data of each row
				echo "Student manage department list with no course in it:";
				echo "<br>";
				echo "<table border='1'>
				<tr>
				<th>Department_Id</th>
				<th>Department_name</th>
				<th>SId</th>
				<th>Stu_name</th>
				<th>ManageDept</th>
				<th>Course</th>
				<th>location</th>
				</tr>";
				while($row = $result2->fetch_assoc()) {
					//echo "id: " . $row["s_id"]. " - Name: " . $row["s_name"]. "Project_id: " . $row["project_id"]. " - Project_name: " . $row["proj_name"]. " - Prof_name: " . $row["pf_name"]. "<br>";
					echo "<tr>";
					echo "<td>" . $row["dept_id"]. "</td>";
					echo "<td>" . $row["dname"]. "</td>" ;
					echo "<td>" . $row["s_id"]. "</td>"; 
					echo "<td>" . $row["s_name"]. "</td>" ;
					echo "<td>" . $row["dept_manage"]. "</td>" ;
					echo "<td>" . $row["course"]. "</td>";
					echo "<td>" . $row["location"]. "</td>" ;
				}
				echo "</tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}
		}
	}
	
	
    
    $conn->close();
    
?>