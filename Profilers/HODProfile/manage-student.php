<?php
session_start();
if (isset($_SESSION['husername'])) {
} else {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--favicon-->
  <link rel="shortcut icon" href="favicon.ico" type="image/icon">
  <link rel="icon" href="T&P.jpeg" type="image/icon">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Students</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/index.css">

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
        echo "<br>";
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
          <li><a href="#" class="active"><i class="fa fa-users fa-fw"></i>Manage Students</a></li>
          <li><a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>
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
              <li><a href="../../Homepage/index.php">Home ACPCE T&P CELL</a></li>
              <li><a href="../../Drives/index.php">Drives</a></li>
              <li><a href="Notif.php">Notification</a></li>
              <li><a href="Change Password.php">Change Password</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="templatemo-content-container">
        <div class="templatemo-content-widget no-padding">
          <div class="panel panel-default table-responsive">
            <form action="approves.php">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead>
                  <tr>



                    <td style="width:'200px';"><a class="white-text templatemo-sort-by">First Name </a></td>
                    <td><a class="white-text templatemo-sort-by">Last Name </a></td>
                    <td><a class="white-text templatemo-sort-by">USN</a></td>
                    <td><a class="white-text templatemo-sort-by">Mobile</a></td>
                    <td><a class="white-text templatemo-sort-by">Email</a></td>
                    <td><a class="white-text templatemo-sort-by">Dob </a></td>
                    <td><a class="white-text templatemo-sort-by">Current Sem</a></td>
                    <td><a class="white-text templatemo-sort-by">Branch</a></td>
                    <td><a class="white-text templatemo-sort-by">SSLC Percentage </a></td>
                    <td><a class="white-text templatemo-sort-by">PU Percentage</a></td>
                    <td><a class="white-text templatemo-sort-by">BE Aggregate</a></td>
                    <td><a class="white-text templatemo-sort-by">Current Backlogs </a></td>
                    <td><a class="white-text templatemo-sort-by">History of Backlogs </a></td>
                    <td><a class="white-text templatemo-sort-by">Detain Years</a></td>
                </thead>
                </tr>

                <?php
                $p = $_SESSION['department'];
                $num_rec_per_page = 15;
                $connect = mysqli_connect('localhost', 'root', '', "placement");
                // mysqli_select_db('placement');
                if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                } else {
                  $page = 1;
                };
                $start_from = ($page - 1) * $num_rec_per_page;
                $sql = "SELECT * FROM basicdetails WHERE Approve=0 and Branch='$p' LIMIT $start_from, $num_rec_per_page";
                $rs_result = mysqli_query($connect, $sql); //run the query

                while ($row = mysqli_fetch_assoc($rs_result)) {

                  print "<tr>";

                  // print "<input type='checkbox' name='checkbox_name' class='checkboxs'>" ;

                  print "<td>" . $row['FirstName'] . "</td>";

                  print "<td>" . $row['LastName'] . "</td>";
                  print "<td width:'200px';>" . "<input type='checkbox' name='checkbox_name' class='checkboxs' style='position: absolute; left: -20px' value='" . $row['USN'] ."'>"  . $row['USN'] . "</td>";
                  print "<td>" . $row['Mobile'] . "</td>";
                  print "<td>" . $row['Email'] . "</td>";
                  print "<td>" . $row['DOB'] . "</td>";
                  print "<td>" . $row['Sem'] . "</td>";
                  print "<td>" . $row['Branch'] . "</td>";
                  print "<td>" . $row['SSLC'] . "</td>";
                  print "<td>" . $row['PU/Dip'] . "</td>";
                  print "<td>" . $row['BE'] . "</td>";
                  print "<td>" . $row['Backlogs'] . "</td>";
                  print "<td>" . $row['HofBacklogs'] . "</td>";
                  print "<td>" . $row['DetainYears'] . "</td>";


                  print "</tr>";
                }
                ?>

                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>

      <div class="pagination-wrap">
        <a href="approves.php" type="submit" class="templatemo-edit-btn">Approve</a>
        <a href="approve2.php" class="templatemo-edit-btn">Approve by USN</a>
      </div>
      <div class="pagination-wrap">
        <ul class="pagination">

          <?php

          $num_rec_per_page = 15;
          mysqli_connect('localhost', 'root', '', 'placement');
          // mysqli_select_db('details');
          $sql = "SELECT * FROM basicdetails where Approve=0 and Branch='$p'";
          $rs_result = mysqli_query($connect, $sql); //run the query
          $total_records = mysqli_num_rows($rs_result);  //count number of records
          $totalpage = ceil($total_records / $num_rec_per_page);


          $currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
          if ($currentpage == 0) {
          } else if ($currentpage >= 1  &&  $currentpage <= $totalpage) {

            if ($currentpage > 1 && $currentpage <= $totalpage) {

              $prev = $currentpage - 1;
              echo "<li><a  href='manage-student.php?page=" . $prev . "'><</a></li>";
            }

            if ($totalpage > 1) {
              $prev = $currentpage - 1;
              for ($i = $prev + 1; $i <= $currentpage + 2; $i++) {
                echo "<li><a href='manage-student.php?page=" . $i . "'>" . $i . "</a></li>";
              }
            }


            if ($totalpage > $currentpage) {
              $nxt = $currentpage + 1;
              echo "<li><a  href='manage-student.php?page=" . $nxt . "' >></a></li>";
            }

            echo "<li><a>Total Pages:" . $totalpage . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <br><br>
      <center><label class="control-label" for="inputNote">
          <center>
            <h2>OR</h2>
          </center> <br /> <br />To View All Sudent Click Link below:
        </label><br />
        <br />
        <a href="manage-users1.php" class="templatemo-blue-button">View All</a>
      </center>
      </form>


      <div class="templatemo-flex-row flex-content-row">
        <div class="col-1">

        </div>
        <div>
          <footer class="text-right">
            <br>
            <p>ACPCE T&P CELL
              </br>
          </footer>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script> <!-- jQuery -->
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
  <script>
    $(document).ready(function() {
      // Content widget with background image
      var imageUrl = $('img.content-bg-img').attr('src');
      $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
      $('img.content-bg-img').hide();
    });
  </script>
</body>

</html>