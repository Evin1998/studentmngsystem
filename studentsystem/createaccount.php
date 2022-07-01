<?php
session_start();
error_reporting(0);
if (isset($_POST['register'])) {
    $rUsername = $_POST['rUsername'];
    $rPassword = $_POST['rPassword'];
    $rEmail = $_POST['rEmail'];
	$student_Name = $_POST['student_Name'];
	$student_no= $_POST['student_no'];

    $conn = mysqli_connect("localhost", "root", "", "student");
    $sql = "INSERT INTO `user` (`UserID`, `Password`, `Email`, `student_Name` ,`student_no`,`isStudent`) VALUES ('$rUsername', '$rPassword', '$rEmail', '$student_Name','$student_no','0')";

 
    if (mysqli_query($conn, $sql)) { ?>
	<script>
	alert("Register Successfully");
	</script><?php } else { ?>
	<script>
	alert("FAIL to Register");
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
            <h1>Student Registration</h1>
        </div>
        <!-- end top bar -->
        <!-- main-container -->
        <div class="container main-container">
            <div class="col-md-12">
                <h3>Registration</h3>
                <h5>Please Fill In the Information Below:</h5>
                <div class="h-10"></div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-contact" required>
                                <input type="text" name="rUsername" id="rUsername" required />
                                <span>User ID</span>
                            </div>
                        </div>
						<div class="col-md-6" required>
                        <div class="input-contact">
                                <input type="text" name="student_Name" id="student_Name" required />
                                <span>Student Name</span>
                            </div>
                        </div>
						<div class="col-md-6" required>
                        <div class="input-contact">
                                <input type="text" name="student_no" id="student_no" required />
                                <span>Student Number</span>
                            </div>
                        </div>
						 <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="rPassword" id="rPassword" required />
                                <span>Password</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="rEmail" id="rEmail" required />
                                <span>Email</span>
                            </div>
                        </div>
                        
                       <div style="background-color:transparent; padding:10px">
              <button name="register" class="btn btn-box" onclick="return validateRegister()">REGISTER</button>
            </div>
          </div>
          <script>
            function openRegisterForm(){
            document.getElementById("registerForm").style.display="block";
            }
            function closeForm() {
            document.getElementById("registerForm").style.display="none";
            }
			   </script>
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
