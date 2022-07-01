<?php
session_start();
error_reporting(0);


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
            <h1>Student Result</h1>
            <p>Please Check Your Result Here</p>
        </div>
        <!-- end top bar -->
        <!-- main container -->
        <div class="main-container portfolio-inner clearfix" style="background-color: f8f3ef;">
            <!-- product div -->
            <div class="portfolio-div">
                <div class="portfolio">
                    <!-- product filter -->
					<table border="2">
					  <tr>
						<td>Subject</td>
						<td>Score</td>
						<td>Grade</td>
					  </tr>
					
					

                   <?php
                    $db = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($db, 'student');
                    if (!$db) {
                        $errorMsg = mysqli_connect_error($db);
                        echo "Error:$errorMsg";
                    } else {
                        $query = mysqli_query($db, "SELECT * FROM result JOIN `course` ON result.course_id = course.id WHERE result.student_id = '".$UserID."' ");
                            while ($data = mysqli_fetch_assoc($query)) {

                               echo "<tr>";
                                echo "<td>" . $data['course_Name'] . "</td>";
                                echo "<td>" . $data['marks'] . "</td>";
                                echo "<td>" . $data['grade'] . "</td>";
                                echo "</tr>";
                            }
                        }
						mysqli_close($db);
                    ?>
                    </table>
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
