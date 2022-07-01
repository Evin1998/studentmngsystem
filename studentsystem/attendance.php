<?php
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
	$course_id = $_POST['course_id'];
    $status = $_POST['status'];
	
	$conn = mysqli_connect("localhost", "root", "", "student"); 
    $sql = "INSERT INTO `attendance` (`course_id`, `status`) VALUES ('$course_id', '$status')";

 if (mysqli_query($conn, $sql)) { ?>
	<script>
	alert("Able to Check In ");
	</script><?php } else { ?>
	<script>
	alert("Unable to Check In ");
	</script>
<?php }

    mysqli_close($conn);
}?>
<!DOCTYPE html>
<html lang="en">
    <?php include "head.php"; ?>
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
            <h1>Check In Attendance</h1>
            <p>Please Check In your Attendance</p>
        </div>
		
		<form action="" method="post" autocomplete="off">
            <?php  ?>

            <div style="padding: 100px;">
                <center>
                    <img src="img\student.jpg" />
                    <h1>Press Present For Attendance</h1>
                </center>

                <div class="row">
					<div class="col-md-6">
					<div class="input-contact">
                <select name='status' style='outline-color:transparent; width:100%; height:100%; border: 0; padding: 0 20px; float: left; position: relative; background-color: transparent; z-index: 0; font-size: 14px; color: #9a9a9a;'>
                  <option VALUE='Present'>Present</option>
                  <option VALUE='Absent'>Absent</option>
				</select>
                <span class="active">Attendance</span>
              </div>
            </div>
			  <div class="col-md-12">
              <input type = "submit" class="btn btn-box" value = "Submit" name = "submit">
              <input type = "hidden" name = "submitted" value = "true">
            </div>
			</div>
        </form>
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