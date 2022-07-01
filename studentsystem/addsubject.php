<?php
session_start();
error_reporting(0);


if (isset($_POST['add'])) {
	$subjectname = $_POST['subjectname'];
    $subjectcode = $_POST['subjectcode'];
	$time = $_POST['time'];
	$session = $_POST['session'];
	$sem=$_POST['sem'];


	$subject_Pic = $_FILES['subject_Pic']['tmp_name'];
    $imgContent = addslashes(file_get_contents($subject_Pic));

    $conn = mysqli_connect("localhost", "root", "", "student");
    $sql = "INSERT INTO `subjects` (`subjectname`, `subjectcode`, `time`, `session`, `sem`, `subjectPic`) VALUES ('$subjectname', '$subjectcode', '$time', '$session', '$sem', '$imgContent' )";

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
                <h3>Course Subject</h3>
                <h5>Please Key in the Course:</h5>
                <div class="h-10"></div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-contact" required>
                                <input type="text" name="subjectname" id="subjectname" required />
                                <span>Name of Subject</span>
                            </div>
                        </div>
						 <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="subjectcode" id="subjectcode" required />
                                <span>Code of Subject</span>
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
						<div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="sem" id="sem" required />
                                <span>Semester</span>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="input-contact" style="border-color: transparent;">
                                <input type="file" id="subject_Pic" name="subject_Pic" accept="image/*" style="padding-top: 8px; z-index: 0;" />
                            </div>
                        </div>
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
