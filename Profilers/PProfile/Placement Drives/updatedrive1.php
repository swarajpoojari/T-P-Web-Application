<?php
$connect = mysqli_connect("localhost", "root", "", 'placement'); // Establishing Connection with Server
// mysqli_select_db("details"); // Selecting Database from Server
if(isset($_POST['submit']))
{ 
$usn = $_POST['usn'];
echo "$usn";
$name = $_POST['sname'];
$comname = $_POST['comname'];
$Vdate = $_POST['Date'];
$attend = $_POST['Attendance'];
$wt = $_POST['WrittenTest'];
$gd = $_POST['GD'];
$tech = $_POST['Tech'];
$placed = $_POST['Placed'];
$package = $_POST['package'];
$date = $_POST['Pdate'];
if($query = mysqli_query($connect, "INSERT INTO updatedrive(USN, Name, CompanyName, VisitingDate, Attendence, WT, GD, Techical, Placed, Package, Date)
		VALUES('$usn', '$name', '$comname', '$Vdate', '$attend', '$wt', '$gd', '$tech', '$placed',  '$package' , '$date')"))
        {
                      echo "<center>Data Inserted successfully...!!</center>";
		}
		else
		{ 
	       echo "<center>FAILED</center>";
	    }
}
