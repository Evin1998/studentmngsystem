<?php
session_start();
if (isset($_POST['register'])) {
    $rUsername = $_POST['rUsername'];
    $rPassword = $_POST['rPassword'];
    $rEmail = $_POST['rEmail'];

    $conn = mysqli_connect("localhost", "root", "", "student");
    $sql = "INSERT INTO `user` (`UserID`, `Password`, `Email`, `isStudent`, `isAdmin`) VALUES ('$rUsername', '$rPassword', '$rEmail', '0', '0')";
	

    mysqli_close($conn);
}

$msg = "";
if (isset($_POST['login'])) {
	$_SESSION['login']=$_POST['login'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "student");

    $sql = "SELECT * FROM `user` WHERE `UserID`='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($id == $row['UserID'] && $password == $row['Password'] && $row['isAdmin']==0) {
                $_SESSION["isStudent"] = $row['isStudent'];
                $_SESSION["admin"] = "user";
                $_SESSION["username"] = $id;
				$_SESSION['Email'] = $row['Email'];
                header('location:index.php');
            } else if ($id == $row['UserID'] && $password == $row['Password'] && $row['isAdmin']==1) {
                $_SESSION["admin"] = "admin";
                $_SESSION["username"] = $id;
                header('location:index.php');
            } else {
                $msg = "Wrong Username or Password.";
            }
        }
    } else {
        $msg = "Wrong Username or Password.";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>
  <body>
    <?php include "preloader.php"; ?>
    <!-- top bar -->
    <div class="signinbackground"></div>
    <!-- end top bar -->
    <!-- main-container -->
	<div class="signinbox">
    <div class="signintext">
      <form action="" method="post" autocomplete="off">
        <br>
        <h5 style="margin-top:15%"><?php echo "$msg"; ?></h5>
		<input type="text" name="id" required style="width: 70%;padding: 3%;border-radius: 20px;height: 1%;" placeholder="User ID">
		<input type="password" name="password" required style="margin-top: 3%;width: 70%;padding: 3%;border-radius: 20px;height: 1%" placeholder="Password">
            <input type="submit" class="btn btn-box" value="Log In" name="login"><br>
      </form>
     
	</div>
    <div class="logobox">
      <img class="biglogo" src="img/student.jpg" alt="Logo" id="logo">
    </div>
	</div>
	
                 
      </div>
    <!-- end main-container -->
    <?php
    //back to top button
    include "btn_backtotop.php";

    //javascript scripts
    include "jsscripts.php";
    ?>
  </body>
</html>