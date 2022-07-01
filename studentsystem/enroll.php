<?php
session_start();
if (isset($_POST['btnBook'])) {
    $_SESSION['subjectsID'] = $_POST['btnBook'];
    header("location:confirmation.php");
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
            <h1>Course Enrollment </h1>
            <p>Please Choose the Course You Want to Enroll</p>
        </div>
        <!-- end top bar -->

        <!-- main container -->
        <div class="main-container portfolio-inner clearfix" style="background-color: f8f3ef;">
            <!-- product div -->
            <div class="portfolio-div">
                <div class="portfolio">
                    <!-- product filter -->
                    <?php
                    $db = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($db, 'student');
                    if (!$db) {
                        $errorMsg = mysqli_connect_error($db);
                        echo "Error:$errorMsg";
                    } else {
                        $query = mysqli_query($db, "SELECT * FROM `subjects` WHERE 1");
                        if ($query) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($row['session'] >= 1) { 
								$id = $row['id']; 
								$subjectname = $row['subjectname']; 
								$subjectPic = $row['subjectPic']; 
								$time = $row['time']; 
								$session = $row['session']; 
								?>
                    <div class="column <?php?>">
                        <div class="col-md-3 col-sm-6">
                            <a class="portfolio_item" style="width: 300px; height: 300px;">
                                <p style="text-align: center;">
                                    <img border="0" style="width: 300px; height: 300px;" img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($subjectPic); ?>" alt="image" class="img-responsive" />
                                </p>
                                <div class="portfolio_item_hover">
                                    <div class="portfolio-border clearfix">
                                        <div class="item_info">
                                            <form action="enroll.php" method="post">
                                                <span><input type="text" style="background-color: Transparent; text-align: center; color: white" name="Name" value="<?php echo $subjectname; ?>" readonly /></span>
                                                <button type="submit" name="btnBook" value="<?php echo $id; ?>" style="background-color: Transparent; background-repeat: no-repeat; border: none; cursor: pointer; overflow: hidden; outline: none;">
                                                    <em>
                                                        <?php echo "$time"; ?>
                                                        <br />
                                                        Session:
                                                        <?php echo $session; ?>
                                                    </em>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                                }
                            }
                        }
                        mysqli_close($db);
                    }
                    ?>
                </div>
            </div>
            <!-- end product div -->
        </div>
        <!-- end main container -->
        <?php
        //footer
        include "footer.php";
        //back to top button
        include "btn_backtotop.php";
        //javascript scripts
        include "jsscripts.php";
        ?>

        <script>
            filterSelection("all");
            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("column");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                    RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
                }
            }

            function AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {
                        element.className += " " + arr2[i];
                    }
                }
            }

            function RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function () {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
    </body>
</html>
