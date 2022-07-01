<?php
session_start();
if (isset($_POST['register'])) {
    $rUsername = $_POST['rUsername'];
    $rPassword = $_POST['rPassword'];
    $rEmail = $_POST['rEmail'];

    $conn = mysqli_connect("localhost", "root", "", "jobfinder");
    $sql = "INSERT INTO user (UserID, Password, Email, message, isCompany, isAdmin) VALUES ('$rUsername', '$rPassword', '$rEmail', '<li><a>You Have Been Registered, Welcome to Job Finder Web!</a></li>', '0', '0')";
	
    if (mysqli_query($conn, $sql)) { ?>
	<script>
	alert("Register Successfully");
	</script><?php } else { ?>
	<script>
	alert("FAIL to Register, this User ID has been USED");
	</script>
<?php }

    mysqli_close($conn);
}

$msg = "";
if (isset($_POST['login'])) {
	$_SESSION['login']=$_POST['login'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "jobfinder");

    $sql = "SELECT * FROM user WHERE `UserID`='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($id == $row['UserID'] && $password == $row['Password'] && $row['isAdmin']==0) {
                $_SESSION["isCompany"] = $row['isCompany'];
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
      <button type="text" style="color:red; background-color:transparent; border-color:transparent" onclick="openRegisterForm()"><u>Don't Have an Account? Click HERE to Register.</u></button>
	</div>
    <div class="logobox">
      <img class="biglogo" src="img/joblogo.png" alt="Logo" id="logo">
    </div>
	</div>
	<div id="registerForm" class="registerForm">
        <form action="signin.php" method="post" autocomplete="off">
          <div style="width:60%; padding:0; margin:auto">
            <div style="padding-left:50px; padding-right:50px; padding-bottom:20px; background-color:#ffffff">
              <span id="close" style="float:right; color:black; font-size:200%; cursor:pointer" onclick="closeForm()" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'"><b>X</b></span>
              <h3 style="text-align:center; padding-top:20px">Register Form</h3>
            </div>
            <div>
              <table class="registerTable">
                <tr>
                  <td class="registerTableIcon"><img src="icons/user.png" style="width:30px; height:30px; background-color:transparent"></td>
                  <td><input type="text" style="display:none" name="emptyUsername"><input type="text" style="background-color:rgb(88, 88, 88)" placeholder="User ID" name="rUsername" id="rUsername" required></td>
                </tr>
				<tr>
                  <td class="registerTableIcon"><img src="icons/email.png" style="width:30px; height:30px; background-color:transparent"></td>
                  <td><input type="email" style="background-color:rgb(88, 88, 88)" placeholder="Email Address" name="rEmail" id="rEmail" required></td>
                </tr>
                <tr>
                  <td class="registerTableIcon"><img src="icons/password.svg" style="width:30px; height:30px; background-color:transparent"></td>
                  <td><input type="password" style="display:none" name="emptyPassword"><input type="password" style="background-color:rgb(88, 88, 88); width:100%" placeholder="Password" name="rPassword" id="rPassword" onkeyup="checkPassword()" required></td>
                </tr>
                <tr>
                  <td class="registerTableIcon"></td>
                  <td>
                    <p id="displayStrength" style="color:red; text-align:left; padding:0; margin:0"></p>
                  </td>
                </tr>
                <tr>
                  <td class="registerTableIcon"><img src="icons/password.svg" style="width:30px; height:30px; background-color:transparent"></td>
                  <td><input type="password" style="background-color:rgb(88, 88, 88); width:100%" placeholder="Confirm Password" id="rPassword2" onkeyup="checkPassword()" required></td>
                </tr>
                <tr>
                  <td class="registerTableIcon"></td>
                  <td>
                    <p id="displayConfirm" style="color:red; text-align:left; padding:0; margin:0"></p>
                  </td>
                  <script>
                    function checkPassword() {
                    if(document.getElementById("rPassword2").value!=document.getElementById("rPassword").value) {
                     document.getElementById("displayConfirm").innerHTML="Password DOES NOT MATCH!";
                    } else if (document.getElementById("rPassword2").value==document.getElementById("rPassword").value){
                     document.getElementById("displayConfirm").innerHTML="";
                    }
					
                    if(document.getElementById("rPassword").value.length<=5) {
                     document.getElementById("displayStrength").innerHTML="Weak";
                    } else if(document.getElementById("rPassword").value.length>5) {
                     document.getElementById("displayStrength").innerHTML="Strong";
                    }
                    }
                  </script>
                </tr>
              </table>
            </div>
            <div style="background-color:transparent; padding:10px">
              <button name="register" class="btn btn-box" onclick="return validateRegister()">REGISTER</button>
              <script>
                function validateRegister() {
				if(document.getElementById("rPassword").value.length<=5 || document.getElementById("rPassword2").value!=document.getElementById("rPassword").value) {
                		return false;
                	} else {
                		return true;
                	}
				}
              </script>
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
    <!-- end main-container -->
    <?php
    //back to top button
    include "btn_backtotop.php";

    //javascript scripts
    include "jsscripts.php";
    ?>
  </body>
</html>