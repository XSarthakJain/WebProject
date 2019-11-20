<html>
<head><title>AKTU ONE VIEW</title>
	<style type="text/css">
		*{
			padding: 0;
			margin:0;
		}
		table{
			//margin-left:30%;
			border-spacing: 15px;
		}
		td{
			margin-left:15%;
			margin-right:15%;
		}
		hr{
			margin:2%;
		}
	</style>
</head>
<body>
	<div style="border=10px solid grey; background-color: white;">
		<center><img src="https://erp.aktu.ac.in/Images/Site/FileHandler-new.png" style="padding-top:2%;"><h1 style="padding-top:2%;color:maroon;">Dr. A.P.J Abdul Kalam University</h1></center>
		<hr>
		<h2 style="padding-left:2%;">Student Result</h2>
		<div style="padding:2%;border:1px solid grey;margin:2%;">
<?php 
$servername = "localhost";
$username = "root";
$password = "sarthak";
$dbanme="result";
// Create connection
$conn = new mysqli($servername,$username,$password,$dbanme);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$roll=$_REQUEST["rno"];
$sql="select * from examsheet where RollNo='+$roll+' ";
$result=$conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    if($row = $result->fetch_assoc()) {
        

echo "Your Roll Number = ".$roll;
echo "<table border='0' cellspacing='10'>
		<center>
				<tr><td>Institute Code & Name </td><td>- ". $row["InstituteCodeName"]."</td><td>Name</td><td>".$row["Name"]."</td></tr>
				<tr><td>Branch Code & Name</td><td>- ".$row["BranchCodeName"]."</td><td>Gender</td><td>".$row["Gender"]."</td></tr>
				<tr><td>Course Code & Name </td><td>- ".$row["CourseCodeName"]."</td><td>Father's Name</td><td>".$row["FatherName"]."</td></tr>
		</center>

		</table></div>";

		echo "<h2 style='padding:2%;'>One View Result</h2>";
		echo "<div style='border:1px solid maroon;padding:1%;background:#ffefef;margin-left:2%;margin-right:2%;margin-bottom:5%;'><h3 style='padding-left:2%;'>Session".$row["Session"]." Semester".$row["Semesters"]." Result ".$row["Result"]."Marks ".$row["ObtainMarks"]."/".$row["TotalMarks"]."</h3></div>";
}
}
} 
 ?>
<center><p style="margin-bottom:5%;color:red;">Note: University doesn't own for the errors or omissions, if any, in this statement.
Designed & Developed by AKTU-SDC Team</p></center>
</div>
</body>
</html>