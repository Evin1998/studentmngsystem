<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <?php
    //head
    include "head.php";
    ?>
  <body>
    <?php
      //preloader
      include "preloader.php";
      //header
      include "header.php";
      //nav
      include "nav.php";
      ?>
    <!-- top bar -->
    <div class="top-bar">
      <h1>Course Attendance</h1>
    </div>
    <!-- end top bar -->
    <!-- main-container -->
    <div class="container main-container">
      <div class="col-md-12">
        <h3>Course</h3>
        <div class="h-10"></div>
        <form action="attendance.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <div class="col-md-6">
              <div class="input-contact"required>
                <select name='companyName' style='width:100%; height:100%; border: 0; padding: 0 20px; float: left; position: relative; background-color: transparent; z-index: 0; font-size: 14px; color: #9a9a9a;'>
                  <?php
                    $conn = mysqli_connect("localhost", "root", "","student"); 
                    $sql = "SELECT * FROM `enrolledcourse` WHERE student_id = '".$UserID."'"; 
                    $result = mysqli_query($conn, $sql); 
                    $queryResult = mysqli_num_rows($result); 
                    while($row = mysqli_fetch_assoc($result)) { ?>
                  <option value=<?php $name=$row['course_Name']; echo "\"$name\"";?>><?php echo $row['course_Name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <input type = "submit" class="btn btn-box" value = "Search" name = "search">
              <input type = "hidden" name = "submitted" value = "true">
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery-2.1.1.js"></script>
    <!--  plugins -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/preview-img.js"></script>
    <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "contact.php")
      	echo "<script src=\"js/google-map.js\"></script>";
      	echo "<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAh9kCBt6Db8-g_Pyk3zLIUUmM1V0aTuHk&callback=myMap\"></script>";
      ?>
    <!-- moderizr -->
    <script src="js/modernizr.js"></script>
    <!--  custom script -->
    <script src="js/custom.js"></script>
    <!-- end main-container -->
    <?php
      //footer
      include "footer.php";
      //back to top button
      include "btn_backtotop.php";
      ?>
  </body>
</html>