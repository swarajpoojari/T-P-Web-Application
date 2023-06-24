<?php
session_start();
if (($_SESSION['husername'])) {
} else {
  header("location: index.php");
  die("You must be Log in to view this page <a href='index.php'>Click here</a>");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!--favicon-->
  <link rel="shortcut icon" href="favicon.ico" type="image/icon">
  <link rel="icon" href="favicon.ico" type="image/icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HOD - Preferences</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">
  <!-- 
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/style.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <!-- Left column -->
  <div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
      <header class="templatemo-site-header">
        <div class="square"></div>
        <?php
        $Welcome = "Welcome";
        echo "<h1>" . $Welcome . "<br>" . $_SESSION['husername'] . "</h1>";
        echo "<h1>(</h1>";
        echo "<h1>" . $_SESSION['department'] . "</h1>";
        echo "<h1>)</h1>";
        ?>
      </header>
      <form action="" method="post" id="form" enctype="multipart/form-data">
        <div class="profile-photo-container">
          <!-- <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive"> -->
          <?php
          $conn = mysqli_connect("localhost", "root", "", "placement");

          // $_SESSION["id"] = 1; // User's session
          // $sessionId = $_SESSION["id"];
          $sun = $_SESSION['husername'];
          $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `upload` WHERE `username` = '$sun'"));
          ?>
          <?php



          // $connect = mysqli_connect("localhost", "root", "", "placement"); // Establishing Connection with Server
          // $sun = $_SESSION["username"];
          // $que = mysqli_query($connect, "SELECT * FROM `upload` WHERE `username` = 'swaraj'");
          // while ($row = mysqli_fetch_array($que)) {

          //   echo "<img src='" . $row['image'] . "' class='my-3 student-profile-img img-responsive' 
          //     style= 'width:11px, height: 10px';>";
          // }

          ?>
          <?php
          // $sessionId = $_SESSION["id"];
          // $id = $user["id"];
          // $name = $user["username"];
          $image = $user["image"];
          ?><div>

            <img src="img/<?php echo $image; ?>" style="object-fit: cover; " class="profileImage" title="<?php echo $image; ?>">
          </div>
          <div class="profile-photo-overlay"></div>
        </div>
        <div class="round">
          <i class=" fa fa-solid fa-camera" style="color:#188dcc; font-size:25px; background-color:aliceblue; padding: 6px"></i>
          <input type="file" name="image" id="image" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
          </input>
          <!-- <input type="submit" name="upload" id=""> -->
        </div>
      </form>

      <script type="text/javascript">
        document.getElementById("image").onchange = function() {
          document.getElementById("form").submit();
        };
      </script>
      <?php
      if (isset($_FILES["image"]["name"])) {
        // $id = $_POST["id"];
        // $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
          echo
          "
        <script>
        alert('Invalid Image Extension');
        document.location.href = '../updateimageprofile';
        </script>
          ";
        } elseif ($imageSize > 1200000) {
          echo
          "
          <script>
          alert('Image Size Is Too Large');
          document.location.href = '../updateimageprofile';
          </script>
          ";
        } else {
          $sql2 = "SELECT `username` FROM `upload` WHERE `username` = '$sun'";
          $result2 = mysqli_query($conn, $sql2);

          if (mysqli_num_rows($result2) > 0) {
            $newImageName = "HIi" . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $sun = $_SESSION['husername'];
            // $user_image = $_SESSION['image'];

            // if(isset($user_image))
            $query = "UPDATE upload SET image = '$newImageName' WHERE username = 'manoj123'";
            // else
            // $query = "INSERT INTO `upload`(`image`, `username`) VALUES ('$newImageName' , '$sun')";

            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            echo
            "
          <script>
          document.location.href = '../SProfile';
        </script>
        ";
          } else {
            $newImageName = "HIi" . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            // $user_image = $_SESSION['image'];

            // if(isset($user_image))
            // $query = "UPDATE upload SET image = '$newImageName' WHERE username = $sun";
            // else
            $query = "INSERT INTO `upload`(`image`, `username`) VALUES ('$newImageName' , '$sun')";

            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            echo
            "
          <script>
          document.location.href = '../SProfile';
          </script>
          ";
          }
          //   $newImageName = "HIi" . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
          //   $newImageName .= '.' . $imageExtension;
          //   // $user_image = $_SESSION['image'];

          //   // if(isset($user_image))
          //   $query = "UPDATE upload SET image = '$newImageName' WHERE username = $sun";
          //   // else
          //   $query = "INSERT INTO `upload`(`image`, `username`) VALUES ('$newImageName' , '$sun')";

          //   mysqli_query($conn, $query);
          //   move_uploaded_file($tmpName, 'img/' . $newImageName);
          //   echo
          //   "
          // <script>
          // document.location.href = '../SProfile';
          // </script>
          // ";
        }
      }
      ?>
      <!-- Search box -->
      <form class="templatemo-search-form" role="search">
        <div class="input-group">
          <button type="submit" class="fa fa-search"></button>
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        </div>
      </form>
      <div class="mobile-menu-icon">
        <i class="fa fa-bars"></i>
      </div>
      <nav class="templatemo-left-nav">
        <ul>
          <li><a href="login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
          <li><a href="manage-student.php"><i class="fa fa-users fa-fw"></i>Manage Students</a></li>
          <li><a href="#" class="active"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
          <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
        </ul>
      </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
      <div class="templatemo-top-nav-container">
        <div class="row">
          <nav class="templatemo-top-nav col-lg-12 col-md-12">
            <ul class="text-uppercase">
              <li><a href="../../Homepage/indes.php">Home ACPCE T&P CELL</a></li>
              <li><a href="../../Drives/index.php">Drives</a></li>
              <li><a href="Notif.php">Notification</a></li>
              <li><a href="Change Password.php">Change Password</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="templatemo-content-container">
        <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">Preferences</h2>
          <p>Update your Details here:</p>
          <form action="index.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
            <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">
                <label for="inputFirstName">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" placeholder="John">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label for="inputLastName">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" placeholder="Smith">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">
                <label for="inputUsername">Username</label>
                <input type="text" class="form-control" id="inputUsername" placeholder="Admin">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="admin@company.com">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12 form-group">
                <label class="control-label" for="inputNote">Note</label>
                <textarea class="form-control" id="inputNote" rows="3"></textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <label class="control-label templatemo-block">File Input</label>
                <!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
                <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
                <p>Maximum upload size is 5 MB.</p>
              </div>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="templatemo-blue-button">Update</button>
              <button type="reset" class="templatemo-white-button">Reset</button>
            </div>
          </form>
        </div>
        <footer class="text-right">
          <p>ACPCE T&P CELL
      </div>
    </div>
  </div>

  <!-- JS -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script> <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
</body>

</html>