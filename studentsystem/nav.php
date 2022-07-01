<?php
$conn = mysqli_connect("localhost", "root", "", "student");
$StudentID = $_SESSION["username"];
$sql = "SELECT * FROM `user` WHERE `UserID`='$UserID'";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);
if(!isset($_SESSION['login'])) {
      header("Location: signin.php");
}
?>
<!-- nav -->
<nav>
  <ul class="box-primary-nav">
    <li class="box-label">MENU</li>
    <li><a href="index.php ">Home</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "index.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>		
    </li>
    <?php if ($_SESSION["admin"] == 'admin') { ?>
    <li><a href="createaccount.php">Student Registration</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "createaccount.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	   <?php
    } ?>
	 <?php if ($_SESSION["admin"] == 'admin') { ?>
    <li><a href="addsubject.php">Add Subjects</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "addsubject.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	 <?php
    } ?>
	
 	 <?php if ($_SESSION["admin"] == 'admin') { ?>
    <li><a href="addresult.php">Student Result</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "addresult.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
   <?php
    } ?>
	<?php if ($_SESSION["admin"] == 'admin') { ?>
    <li><a href="checkattendance.php">Check Attendance</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "checkattendance.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	   <?php
    } ?>
	<?php if ($_SESSION["admin"] == 'user') { ?>
    <li><a href="searchcourse.php">Attendance</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "searchcourse.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	   <?php
    } ?>
<?php if ($_SESSION["admin"] == 'user') { ?>
    <li><a href="studentresult.php">Results</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "studentresult.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	   <?php
    } ?>
<?php if ($_SESSION["admin"] == 'user') { ?>
    <li><a href="enroll.php">Enrollment</a>
      <?php
      $url = basename($_SERVER['PHP_SELF']);
      if ($url == "enroll.php") {
          echo "<i class=\"ion-ios-circle-filled color\"></i>";
      }
      ?>	
    </li>
	   <?php
    } ?>
    <li><a href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>
	
	<!-- end nav -->
	