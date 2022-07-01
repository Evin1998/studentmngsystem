<?php
session_start();
$id = $_SESSION['subjectsID'];

$servername = "localhost";
$username = "root";
$dbname = "student";
$conn = mysqli_connect($servername, $username, "", $dbname);

$sql = "SELECT * FROM `subjects` WHERE `id`=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['subjectname'] = $row['subjectname'];
        $_SESSION['subjectcode'] = $row['subjectcode'];
        $_SESSION['time'] = $row['time'];
        $_SESSION['session'] = $row['session'];
        $_SESSION['sem'] = $row['sem'];
    }
}
mysqli_close($conn);
if (isset($_POST['btnSubmitBook'])) {
    $servername = "localhost";
    $username = "root";
    $dbname = "student";
    $conn = mysqli_connect($servername, $username, "", $dbname);
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $displayDate = date("Y/m/d-h:i:sa");
	if (mysqli_query($conn, $sql)) {
    } else {
    }
	$course_Name = $_SESSION['course_Name'];
    $sql = "INSERT INTO `enrolledcourse` (`course_Name`) VALUES ('$course_Name')";
    if (mysqli_query($conn, $sql)) {
        include "confirmenroll.php";
    } else {
    }
	echo "$UserID";
   mysqli_close($conn);
   
}
?>
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
            <h1>Course Enrollment Confirmation</h1>
            <p>Please Confirm the Course You Selected</p>
        </div>

        <form action="" method="post" autocomplete="off">
            <?php  ?>

            <div style="padding: 100px;">
                <center>
                    <img src="img\student.jpg" />
                    <h1>Course Confirmation</h1>
                </center>

                <div class="row">
                    <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['subjectname']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Subject Name</span>
                        </div>
                    </div>

                   <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['subjectcode']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Subject </span>
                        </div>
                    </div>

                    <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['time']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Time</span>
                        </div>
                    </div>

                     <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['session']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Session</span>
                        </div>
                    </div>
					 <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['sem']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Semester</span>
                        </div>
                    </div>
					 <div class="col-md-6" required>
                        <div class="input-contact">
                            <input type="text" style="z-index: 0;" value="<?php echo $_SESSION['username']; ?>" readonly />
                            <span class="active" style="z-index: 0;">Student ID</span>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-box" name="btnSubmitBook" onclick="return validateForm()" value="<?php echo $id; ?>">Confirm</button>
                </div>
            </div>
        </form>
		
        <?php
        //footer
        include "footer.php";
        //back to top button
        include "btn_backtotop.php";
        //javascript scripts
        include "jsscripts.php";
        ?>
    </body>
</html>
