<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
	<?php
	//head
	include "head.php";
	?>
	<body>
		<?php
		//preloader
		include "preloader.php";
		//header
		include "header.php";
		//nav
		include "nav.php";
		?>
		<!-- intro -->
		<section class="box-intro">
		<div class="h-20"></div>
			<div class="table-cell">
				<h1 class="box-headline letters rotate-2">
					<span class="box-words-wrapper">
						<b class="is-visible">Student&nbsp Management &nbsp System!</b>
						<b>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Easy &nbsp And&nbsp Convinient!</h6></b>
					</span>
				</h1>
				
				<h5>Enroll your Subjects Now!!!</h5>
				<div class="col-md-12">
					<a href="enroll.php" class="btn btn-box">Enroll Now</a>
				</div>
		</section>	
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