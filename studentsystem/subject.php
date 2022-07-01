<?php
session_start();
error_reporting(0);


if (isset($_POST['add'])) {
	$subject = $_POST['subject'];
    $time = $_POST['time'];
	$session = $_POST['session'];


    $conn = mysqli_connect("localhost", "root", "", "student");
    $sql = "INSERT INTO `subjects` (`subject`, `time`, `session`) VALUES ('$subject', '$time', '$session')";

      if (mysqli_query($conn, $sql)) { ?>
	<script>
	alert("Added Successfully");
	</script><?php } else { ?>
	<script>
	alert("FAIL to Add the Course");
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
            <h1>Add Course</h1>
        </div>
        <!-- end top bar -->
        <!-- main-container -->
        <div class="container main-container">
            <div class="col-md-12">
                <h3>Course for Enrollment</h3>
                <h5>Please Key in the Course:</h5>
                <div class="h-10"></div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-contact" required>
                                <input type="text" name="subject" id="subject" required />
                                <span>Subject</span>
                            </div>
                        </div>
						 <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="time" id="time" required />
                                <span>Time</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="session" id="session" required />
                                <span>Session</span>
                            </div>
                        </div>
                       <div style="background-color:transparent; padding:10px">
              <button name="add" class="btn btn-box" onclick="return validateCourse()">ADD</button>
            </div>
          </div>
          <script>
            function openCourseForm(){
            document.getElementById("courseForm").style.display="block";
            }
            function closeForm() {
            document.getElementById("courseForm").style.display="none";
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
