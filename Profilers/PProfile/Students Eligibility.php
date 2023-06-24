<?php
session_start();
if (isset($_SESSION["pusername"])) {
} else
  header("location: index.php");
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
  <title>Principal - Student Details</title>
  <meta name="description" content="">
  <meta name="author" content="templatemo">
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
        echo "<h1>" . $Welcome . "<br>" . $_SESSION['pusername'] . "</h1>";
        ?>
      </header>
      <div>
        <form action="" method="post" id="form" enctype="multipart/form-data">
          <div class="profile-photo-container">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "placement");

            $sun = $_SESSION['pusername'];
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `upload` WHERE `username` = '$sun'"));
            ?>
            <?php


            ?>
            <?php
            $image = $user["image"];
            ?><div>

              <img src="img/<?php echo $image; ?>" style="object-fit: cover; " class="profileImage" title="<?php echo $image; ?>">
            </div>
            <div class="profile-photo-overlay"></div>
          </div>
          <div class="round">
            <i class=" fa fa-solid fa-camera" style="color:#188dcc; font-size:25px; background-color:aliceblue; padding: 6px"></i>
            <!-- <input type="file" name="image" id="image" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false"> -->
            <input type="file" name="image" id="image" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false">
            </input>
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
            $query = "UPDATE upload SET image = '$newImageName' WHERE username = '$sun'";

            mysqli_query($connect, $query);
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
          <li><a href="Placement Drives.php"><i class="fa fa-home fa-fw"></i>Placement Drives</a></li>
          <li><a href="manage-users.php"><i class="fa fa-users fa-fw"></i>View Students</a></li>
          <li><a href="queries.php"><i class="fa fa-users fa-fw"></i>Queries</a></li>
          <li><a href="Students Eligibility.php" class="active"><i class="fa fa-sliders fa-fw"></i>Students Eligibility Status</a></li>
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
              <li><a href="">Drives Home</a></li>
              <li><a href="Notif.php">Notifications</a></li>
              <li><a href="Change Password.php">Change Password</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="templatemo-content-container">
        <div class="templatemo-content-widget white-bg">
          <h2 class="margin-bottom-10">ELIGIBILITY CRITERIA</h2>

          <form action="eligibility.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data">

            <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">
                <label class="control-label templatemo-block">Branch of Study</label>
                <!-- <select name="Branch" class="form-control"> -->
                  <!-- <option value=""><input type="checkbox"/> Branch</option>
                  <option value="ISE"><input type="checkbox"/> ISE</option>
                  <option value="CSE"><input type="checkbox"/> CSE</option>
                  <option value="EEE"><input type="checkbox"/> EEE</option>
                  <option value="ECE"><input type="checkbox"/> ECE</option>
                  <option value="ME"><input type="checkbox"/> ME</option>
                  <option value="CVE"><input type="checkbox"/> CVE</option> -->
                <!-- </select> -->
                <div id="list1" class="dropdown-check-list" tabindex="100">
                  <span class="anchor">Select Branch</span>
                  <ul class="items" multiple>
                    <li ><input type="checkbox" name="branch[]" value="AIDS"/>AIDS</li>
                    <li><input type="checkbox" name="branch[]" value="CSE"/>CSE</li>
                    <li><input type="checkbox" name="branch[]" value="ELT"/>ELT</li>
                    <li ><input type="checkbox" name="branch[]" value="EXTC"/>EXTC</li>
                    <li><input type="checkbox" name="branch[]" value="IOT"/>IOT</li>
                    <li><input type="checkbox" name="branch[]" value="IT"/>IT</li>
                    <li><input type="checkbox" name="branch[]" value="ME"/>ME</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label for="sslc">SSLC/10th Aggregate</label>
                <input type="text" name="sslc" class="form-control" id="sslc" placeholder="">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label for="Pu">12th/Diploma Aggregate</label>
                <input type="text" name="pugg" class="form-control" id="Pu" placeholder="">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label for="BE">BE Aggregate</label>
                <input type="text" name="beagg" class="form-control" id="BE" placeholder="">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label class="control-label templatemo-block">Current Backlogs</label>
                <input type="number" name="curback" class="form-control" placeholder="Numbers">
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label class="control-label templatemo-block">History of Backlogs</label>
                <select name="hob" class="form-control">
                  <option value="Y/N">Y/N</option>
                  <option value="1">Y</option>
                  <option value="0">N</option>
                </select>
              </div>

              <div class="col-lg-6 col-md-6 form-group">
                <label class="control-label templatemo-block">Detain Years</label>
                <select name="dy" class="form-control">
                  <option value="select">Years</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="col-lg-6 col-md-6 form-group">
                <label class="control-label templatemo-block">Batch</label>
                <select name="batch" class="form-control">
                  <option value="select">Year</option>
                  <option value="2019-23">2019-23</option>
                  <option value="2020-24">2020-24</option>
                  <option value="2021-25">2021-25</option>
                  <option value="2022-26">2022-26</option>
                  <!-- <option value="4">4</option> -->
                </select>
              </div>




              <br>
              <div class="form-group text-right">
                <button type="submit" name="submit" class="templatemo-blue-button">submit</button>
                <button type="reset" class="templatemo-white-button">Reset</button>
              </div>
          </form>
        </div>

        <footer class="text-right">
          <p>ACPCE T&P CELL
        </footer>
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

  <script>
    var checkList = document.getElementById('list1');
    checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
      if (checkList.classList.contains('visible'))
        checkList.classList.remove('visible');
      else
        checkList.classList.add('visible');
    }
  </script>
</body>

</html>