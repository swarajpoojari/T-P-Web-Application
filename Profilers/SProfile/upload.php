<?php
$connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server
if (isset($_POST['upload'])) {

  // echo "<pre>";
  // print_r($_FILES['image']);
  // echo "</pre>";

  $img_name= $_FILES['image']['name'];
  $img_size= $_FILES['image']['size'];
  $tmp_name= $_FILES['image']['tmp_name'];
  $error= $_FILES['image']['error'];

  if($error == 0) {
    if($img_size > 125000) {
      $em = "Sorry, your file is too large. ";
      // header("location: index.php?error=$em"); 
    }
    else{
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      echo ($img_ex);
    }
  }
  else{
    $em = "Sorry, your file is too large. ";
      header("location: index.php?error=$em"); 
  }

  $file = $_FILES['image']['name'];

  // $query = "INSERT INTO `basicdetails`(`profile`) VALUES('$file')";

  $result = mysqli_query($connect, "INSERT INTO `upload`(`image`) VALUES ('$file')");

  // $result = mysqli_query($connect, $res);

  if ($result) {
    move_uploaded_file($_FILES['image']['tmp_name'], "$file");
  }



}

?>

<?php
// $connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server
// $sel = "SELECT * FROM placement";


$que = mysqli_query($connect, "SELECT * FROM `upload`");

$output = " ";

// if (mysqli_num_rows($que) < 1) {

//   $output .= "<hr class= 'text-center> No image uploaded</h3>";
// }

while ($row = mysqli_fetch_array($que)) {

  echo "<img src='" . $row['image'] . "' class='my-3' 
        style= 'width:11%, height: 10%';>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
</head>

<body>
  <form class="templatemo-login-form" method="post" enctype="multipart/form-data">
    <div class="row form-group">
      <div class="col-lg-12">
        <label class="control-label templatemo-block">Upload your Profile Pic</label>
        <!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
        <input type="file" name="image" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
        <p>Maximum upload size is 5 MB.</p>
      </div>
    </div>
    <div class="form-group text-right">

      <input type="submit" name="upload" value="UPLOAD" class="templatemo-blue-button">add</button>
      <button type="submit" name="update" class="templatemo-blue-button">update</button>
      <button type="reset" class="templatemo-white-button">Reset</button>
    </div>
  </form>





</body>

</html>