<?php
session_start();
error_reporting(0);
if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $marks = $_POST['marks'];
	$grade = $_POST['grade'];

    $conn = mysqli_connect("localhost", "root", "", "student");
    $sql = "INSERT INTO `result` (`student_id`, `course_id`, `marks`, `grade`) VALUES ('$student_id', '$course_id', '$marks', '$grade')";

    if (mysqli_query($conn, $sql)) { ?>
	<script>
	alert("Result Added Successfully");
	</script><?php } else { ?>
	<script>
	alert("FAIL to Add Result");
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
            <h1>Student Result</h1>
        </div>
        <!-- end top bar -->
        <!-- main-container -->
        <div class="container main-container">
            <div class="col-md-12">
                <h3>Course Result</h3>
                <h5>Please Fill In the Information Below:</h5>
                <div class="h-10"></div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-contact" required>
                                <input type="text" name="student_id" id="student_id" required />
                                <span>Student ID</span>
                            </div>
                        </div>
						<div class="col-md-6" required>
                        <div class="input-contact">
                                <input type="text" name="course_id" id="course_id" required />
                                <span>Course ID</span>
                            </div>
                        </div>
						<div class="col-md-6" required>
                        <div class="input-contact">
                                <input type="text" name="grade" id="grade" required />
                                <span>Grade</span>
                            </div>
                        </div>
						 <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="marks" id="marks" required />
                                <span>Marks</span>
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
