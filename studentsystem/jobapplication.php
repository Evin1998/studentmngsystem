<?php
session_start();
error_reporting(0);
if (isset($_POST['submit'])) {
	$job_title = $_POST['job_title'];
    $contact_No = $_POST['contact_No'];
    $company_Name = $_POST['company_Name'];
    $company_Location = $_POST['company_Location'];
    $start_time = $_POST['start_time'];
    $finish_time = $_POST['finish_time'];
    $full_address = $_POST['full_address'];
	$Email=$_SESSION['Email'];
	$description = nl2br($_POST['description']);

    $company_Pic = $_FILES['company_Pic']['tmp_name'];
    $imgContent = addslashes(file_get_contents($company_Pic));

    $db = mysqli_connect('localhost', 'root', '', 'jobfinder');

    $userID = $_SESSION["username"];
    $sql = "INSERT INTO `jobdatabase` (`companyName`,`jobtitle`, `userID`, `Email`, `companyLocation`, `companyAddress`, `companyPic`, `startTime`, `finishTime`, `contactNo`, `description`) VALUES ('$company_Name', '$job_title' ,'$userID', '$Email', '$company_Location', '$full_address', '$imgContent', '$start_time', '$finish_time', '$contact_No', '$description')";

    $query_jobfinder = mysqli_query($db, $sql);
    if ($query_jobfinder) {
        $lastID = mysqli_insert_id($db);
    }
    mysqli_close($db);
    header('Location: index.php');
}

if ($_SESSION["isCompany"] == 1) {
	header("location:index.php");
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
            <h1>Job Application</h1>
        </div>
        <!-- end top bar -->
        <!-- main-container -->
        <div class="container main-container">
            <div class="col-md-12">
                <h3>Request Form</h3>
                <h5>Please Fill In the Information Below:</h5>
                <div class="h-10"></div>
                <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-contact" required>
                                <input type="text" name="company_Name" id="company_Name" required />
                                <span>Company Name</span>
                            </div>
                        </div>
						 <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="job_title" id="job_title" required />
                                <span>Job Title</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" maxLength=11 name="contact_No" id="contact_No" required />
                                <span>Contact</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-contact">
                                <select
                                    name="company_Location"
                                    style="outline-color: transparent; width: 100%; height: 100%; border: 0; padding: 0 20px; float: left; position: relative; background-color: transparent; z-index: 0; font-size: 14px; color: #9a9a9a; padding-top:10px"
                                >
                                    <option>Pulau Pinang</option>
                                    <option>Kedah</option>
                                    <option>Perlis</option>
                                    <option>Kuala Lumpur</option>
                                    <option>Kelantan</option>
                                    <option>Pahang</option>
                                    <option>Perak</option>
                                    <option>Melaka</option>
                                    <option>Johor</option>
                                    <option>Terengganu</option>
                                    <option>Negeri Sembilan</option>
                                    <option>Selangor</option>                         
                                </select>
                                <span class="active">State</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <select
                                    name="start_time"
                                    style="outline-color: transparent; width: 100%; height: 100%; border: 0; padding: 0 20px; float: left; position: relative; background-color: transparent; z-index: 0; font-size: 14px; color: #9a9a9a; padding-top:10px"
                                >
                                    <option>6.00a.m.</option>
                                    <option>7.00a.m.</option>
                                    <option>8.00a.m.</option>
                                    <option>9.00a.m.</option>
                                    <option>10.00a.m.</option>
                                    <option>11.00a.m.</option>
                                    <option>12.00p.m.</option>
                                    <option>1.00p.m.</option>
                                    <option>2.00p.m.</option>
									<option>3.00p.m.</option>
									<option>4.00p.m.</option>
									<option>5.00p.m.</option>
									<option>6.00p.m.</option>
									<option>7.00p.m.</option>
									<option>8.00p.m.</option>
									<option>9.00p.m.</option>
									<option>10.00p.m.</option>
									<option>11.00p.m.</option>
									<option>12.00a.m.</option>
                                </select>
                                <span class="active">Start Work</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <select
                                    name="finish_time"
                                    style="outline-color: transparent; width: 100%; height: 100%; border: 0; padding: 0 20px; float: left; position: relative; background-color: transparent; z-index: 0; font-size: 14px; color: #9a9a9a; padding-top:10px"
                                >
                                    <option>1.00a.m.</option>
									<option>2.00a.m.</option>
									<option>3.00a.m.</option>
									<option>4.00a.m.</option>
									<option>5.00a.m.</option>
									<option>6.00a.m.</option>
                                    <option>7.00a.m.</option>
                                    <option>8.00a.m.</option>
                                    <option>9.00a.m.</option>
                                    <option>10.00a.m.</option>
                                    <option>11.00a.m.</option>
                                    <option>12.00p.m.</option>
                                    <option>1.00p.m.</option>
                                    <option>2.00p.m.</option>
									<option>3.00p.m.</option>
									<option>4.00p.m.</option>
									<option>5.00p.m.</option>
									<option>6.00p.m.</option>
									<option>7.00p.m.</option>
									<option>8.00p.m.</option>
									<option>9.00p.m.</option>
									<option>10.00p.m.</option>
									<option>11.00p.m.</option>
									<option>12.00a.m.</option>
                                </select>
                                <span class="active">Finish Work</span>
                            </div>
                        </div>
                        <div class="col-md-6" required>
                            <div class="input-contact">
                                <input type="text" name="full_address" id="full_address" required />
                                <span>Full Address</span>
                            </div>
                        </div>
						<div class="col-md-7">
                            <textarea
                                name="description"
                                rows="10"
                                cols="100"
                                placeholder="JOB DESCRIPTION"
                                style="padding: 10px 20px; resize: none; z-index: 0; font-size: 14px; background-color: transparent; color: #9a9a9a;"
                                required
                            ></textarea>
                        </div>
						
                        <div class="col-md-6">
                            <div class="input-contact" style="border-color: transparent;">
                                <input type="file" id="company_Pic" name="company_Pic" accept="image/*" style="padding-top: 8px; z-index: 0;" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-box" value="Send Request" name="submit" onclick="return validateForm()" />
                            <script>
                                function validateForm() {
									if(document.getElementById("company_Pic").value == "" || isNaN(document.getElementById("contact_No").value) || (document.getElementById("contact_No").value.length < 10 || document.getElementById("contact_No").value.length > 11)) {
										var errMsg="";
										if (isNaN(document.getElementById("contact_No").value) || (document.getElementById("contact_No").value.length < 10 || document.getElementById("contact_No").value.length > 11)) {
											errMsg=errMsg+"Contact Number is Invalid!\n";
										}
										if (document.getElementById("company_Pic").value == "") {
											errMsg=errMsg+"Please Insert A Picture of your Company\n";
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
