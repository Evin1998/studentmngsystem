<?php
session_start();
//error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <?php
    //head
    include "head.php";
    ?>
  
  <body>
    <?php
      //preloader
      //include "preloader.php";
      //header
      include "header.php";
      //nav
      include "nav.php";
	?>
		<div class="container mt-5 pt-5">
			<canvas id="myChart" class="mx-auto mt-5 pt-5" style="width:100%;max-width:700px"></canvas>
		</div>
	</body>
</html>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){	
		$.ajax({
			type: "POST",
			url: 'fetch_student_attendance.php',
			data: {student: 'student'},
			success: function(data){
				console.log(data);
				var xValues = ["Present", "Absent"];
				var barColors = ["red", "green"];
				
				new Chart("myChart", {
				  type: "bar",
				  data: {
					labels: xValues,
					datasets: [{
					  backgroundColor: barColors,
					  data: data
					}]
				  },
				});
			}
		})
	})
</script>
