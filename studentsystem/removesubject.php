<?php
  session_start();
    $subject = $_POST['subject'];
  error_reporting(0);
  if(isset($_POST['edit'])){
	$subject = $_POST['subject'];
    $time = $_POST['time'];
	$session = $_POST['session'];
	
  	
  	$db = mysqli_connect('localhost','root','','student');
  	$sql = "UPDATE `subjects` SET `subject` = '$subject', `time` = '$time', `session` = '$session'";
  	$result = mysqli_query($db,$sql);
  	header ("location: index.php");
  }
  
if($_SESSION["admin"] != "admin") {
	header("location: index.php");
}
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
      <h1>Edit Course</h1>
    </div>
    <!-- end top bar -->
    <!-- main-container -->
    <div class="container main-container">
      <div class="col-md-12">
        <h3>Edit Information</h3>
        <h5>Please Edit Carefully:</h5>
        <div class="h-10"></div>
        <form action="editjobs.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="row">
            <div class="col-md-6">
              <div class="input-contact"required>
                <input type="text" name="subject" id="subject" required value="<?php echo $subject ?>">
                <span class="active">Name of Course</span>
              </div>
            </div>
            <div class="col-md-6"required>
              <div class="input-contact">
                <?php 
                  $conn = mysqli_connect("localhost", "root", "","student"); 
                  $sql = "SELECT * FROM subjects WHERE subject='$subject'"; 
                  $result = mysqli_query($conn, $sql); 
                  $queryResult = mysqli_num_rows($result); 
                  $row = mysqli_fetch_assoc($result);
                  $_SESSION['id'] = $row['id'];
                  $name = $row['companyName'];
                  $title = $row['jobtitle'];
                  $email = $row['email'];
                  $area = $row['companyLocation'];
                  $address = $row['companyAddress'];
                  $start = $row['startTime'];
                  $finish = $row['finishTime'];
                  $no = $row['contactNo'];
                  mysqli_free_result($result);
                  mysqli_close($conn);
                  ?>
                <input type= "text" maxLength=11 name="contact_No" id="contact_No" required value="<?php echo "$no";?>" >
                <span class="active">Contact</span>
              </div>
            </div>
			<div class="col-md-6"required>
              <div class="input-contact">
                <input type= "text" name="job_title" id="job_title" required value="<?php echo "$title";?>">
                <span class='active'>Job Title</span>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-contact" style='border-color: transparent'>
                <input type="file" id="company_Pic" name="company_Pic" accept="image/*" style="padding-top:8px; z-index:0">
              </div>
            </div>
            <div class="col-md-12">
              <input type = "submit" class="btn btn-box" value = "Edit Details" name = "edit" onclick="return validateImage()">
              <script>
                function validateForm() {
					if(document.getElementById("company_Pic").value == "" || isNaN(document.getElementById("contact_No").value) || (document.getElementById("contact_No").value.length < 10 || document.getElementById("contact_No").value.length > 11)) {
						var errMsg="";
						if (isNaN(document.getElementById("contact_No").value) || (document.getElementById("contact_No").value.length < 10 || document.getElementById("contact_No").value.length > 11)) {
							errMsg=errMsg+"Please Key In a Correct Phone Number\n";
							}
							if (document.getElementById("company_Pic").value == "") {
								errMsg=errMsg+"Please Insert An Image\n";
								}
								alert(errMsg);
								return false;
								}
				}
              </script>
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