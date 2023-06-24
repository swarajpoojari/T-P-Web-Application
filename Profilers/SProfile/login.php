<?php
session_start();
if ($_SESSION["username"]) {
} else {
  header("location: index.php");
}
?>

<?php
$connect = mysqli_connect("localhost", "root", "", "placement");


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Profile Home</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">
  <!--favicon-->
  <link rel="shortcut icon" href="favicon.ico" type="image/icon">
  <link rel="icon" href="T&P.jpeg" type="image/icon">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  
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
        echo "<h1>" . $Welcome . "<br>" . $_SESSION['username'] . "</h1>";
        ?>
      </header>
      <div>
        <form action="" method="post" id="form" enctype="multipart/form-data">
          <div class="profile-photo-container">
            <!-- <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive"> -->
            <?php
            $conn = mysqli_connect("localhost", "root", "", "placement");

            // $_SESSION["id"] = 1; // User's session
            // $sessionId = $_SESSION["id"];
            $sun = $_SESSION['username'];
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
      </div>

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
          $result2 = mysqli_query($connect, $sql2);

          if (mysqli_num_rows($result2) > 0) {
            $newImageName = "$sun" . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $sun = $_SESSION['username'];
            // $user_image = $_SESSION['image'];

            // if(isset($user_image))
            $query = "UPDATE upload SET image = '$newImageName' WHERE username = '$sun'";
            // else
            // $query = "INSERT INTO `upload`(`image`, `username`) VALUES ('$newImageName' , '$sun')";

            mysqli_query($connect, $query);
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            echo
            "
        <script>
        document.location.href = '../SProfile';
        </script>
        ";
          } else {
            $newImageName = "$sun" . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
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
          <li>
            <a href="#" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a>
          </li>
          <li>
            <a href="..\SProfile\table48 sorce code\index.php" class="active"><i class="fa fa-home fa-fw"></i>Calendar</a>
          </li>
          <li>
            <a href="resumeBuilder.php"><i class="fa fa-home fa-fw"></i>Resume Builder</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
          </li>
          <li>
            <a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Preferences</a>
          </li>
          <li>
            <a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
      <div class="templatemo-top-nav-container">
        <div class="row">
          <nav class="templatemo-top-nav col-lg-12 col-md-12">
            <ul class="text-uppercase">
              <li>
                <a href="../../Homepage/index.php">Home ACPCE T&P CELL</a>
              </li>
              <li>
                <a href="../../Drives/index.php">Drives Homepage</a>
              </li>
              <li>
                <a href="Notif.php">Notifications</a>
              </li>
              <li>
                <a href="Change Password.php">Change Password</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="templatemo-content-container">
        <div class="templatemo-flex-row flex-content-row">
          <div class="templatemo-content-widget white-bg col-2">
            <i class="fa fa-times"></i>
            <div class="square"></div>
            <h2 class="templatemo-inline-block"></a> Welcome to ACPCE T&P CELL </h2>
            <hr>
            <p>Work is Magic and it defines you at every aspect of ur life. As you Work Hard u will become smart and the Irony is Every Smart worker will be a Successfull man where as worthless hardwork is like a monkey finding gold in a sea.
              <a href="preferences.php" target="_parent">Go and Fill your Details in Preferences Tab</a>
            </p>
            <p>We have got number of Partners from the companies who are tied up to our college and it is Incresasing. We are doing our Job of getting u Placed and
              Being a Student its your duty to acompolish ur responsibilities.</p>
          </div>
          <div class="templatemo-content-widget white-bg col-1 text-center">
            <i class="fa fa-times"></i>
            <h4 class="text-uppercase">Assigned Projects</h4>
            <!-- <h5 class="text-uppercase margin-bottom-10">Projects (Beta)</h5> -->
            <img src="images/bicycle.jpg" alt="Bicycle" class="img-circle img-thumbnail">
          </div>
          <div class="templatemo-content-widget white-bg col-1">
            <i class="fa fa-times"></i>
            <h4 class="text-uppercase">Academics Progress</h4>
            <h5 class="text-uppercase">Grades of Progress</h5>
            <hr>
            <div class="progress">
              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
          </div>
        </div>
        <div class="templatemo-flex-row flex-content-row">
          <div class="col-1">
            <div class="templatemo-content-widget orange-bg">
              <i class="fa fa-times"></i>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                  </a>
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase">Latest Drive</h2>
                  <p>Click on and get the Latest Drive and Upcomming Drive Details</p>
                </div>
              </div>
            </div>
            <div class="templatemo-content-widget white-bg">
              <i class="fa fa-times"></i>
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object img-circle" src="images/sunset.jpg" alt="Sunset">
                  </a>
                </div>
                <div class="media-body">
                  <h2 class="media-heading text-uppercase">Upcomming Events</h2>
                  <p>Brace yourself for the Events that will take ur breath away. Get Started and be a Part of ACPCE T&P Family</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-1">
            <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
              <i class="fa fa-times"></i>
              <div class="panel-heading templatemo-position-relative">
                <h2 class="text-uppercase">Lately Placed Students</h2>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <td><a>Name</a></td>
                      <td><a>Branch</a></td>
                      <td><a>Company Name </a></td>
                      <td><a>Placed</a></td>
                      <td><a>Package</a></td>

                    </tr>
                  </thead>
                  <!-- <tbody>
                    <tr> -->

                      <?php

                      $num_rec_per_page = 15;
                      $connect = mysqli_connect('localhost', 'root', '', 'placement');
                      // mysqli_select_db('details');
                      if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                      } else {
                        $page = 1;
                      };
                      $start_from = ($page - 1) * $num_rec_per_page;
                      $sql = "SELECT a.* , u.*
From addpdrive a,updatedrive u 
WHERE a.CompanyName = u.CompanyName AND a.Date = u.VisitingDate ORDER BY u.Date DESC LIMIT $start_from, $num_rec_per_page";

                      // $sql3 = "SELECT * from "
                      $rs_result = mysqli_query($connect, $sql); //run the query

                      while ($row = mysqli_fetch_array($rs_result)) {
                      ?>
                    <tr>

                      <td>
                        <p><?php echo $row['Name'];  ?> </p>
                      </td>
                      <td>
                        <p><?php
                            // echo $row['Name']; 
                            $usn = $row['USN'];
                            $sql1 = "SELECT `Branch` FROM `basicdetails` WHERE `USN` = '$usn'";
                            $rs_result1 = mysqli_query($connect, $sql1);
                            $row1 = mysqli_fetch_assoc($rs_result1);
                            echo $row1["Branch"];
                            ?>
                        </p>
                      </td>
                      <td>
                        <p><?php echo $row['CompanyName']; ?></p>
                      </td>
                      <td>
                        <p><?php echo $row['Placed']; ?></p>
                      </td>
                      <td>
                        <p><?php echo $row['Package']; ?></p>
                      </td>


                    </tr>
                  <?php
                      }
                  ?>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Second row ends -->
        <footer class="text-right">
          <p> ACPCE T&P
          </p>
        </footer>
      </div>
    </div>
  </div>
  <script></script>
  <!-- JS -->
  <script src="js/jquery-1.11.2.min.js"></script>
  <!-- jQuery -->
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <!-- jQuery Migrate Plugin -->
  <script type="text/javascript" src="js/templatemo-script.js"></script>
  <!-- Templatemo Script -->
</body>

</html>