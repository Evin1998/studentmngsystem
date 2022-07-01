<?php
if (isset($_POST['btnClose']) || isset($_POST['btnOK'])) {
    header("location:index.php");
} ?>
<div id="thanksBox" style="display:block; position:fixed; z-index:1; padding-top:1%; left:0; top:0; width:100%; height:100%; background-color:rgba(0, 0, 0, 0.35);">
    <div style="width:60%; padding:0; margin:auto;">
        <div style="padding-left:50px; padding-right:50px; padding-bottom:10px; background-color:#f4f2f2d9;">
		<form action="confirmenroll.php" method="post">
            <button style="float:right; color:black; font-size:200%; border:hidden; background-color:transparent" name="btnClose" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'"><b>X</b></button>
            <h2 style="text-align:center; padding-top:20px;">You have Successfully Enrolled</h2>
        </div>
        <div style="background-color:white; text-align:center; padding-top:30px; padding-bottom:30px;">
            <h2 style="color:red; margin-top:0;"><img src="icons/tick.gif" style="height:30px; width:30px; margin-right:10px;" />Done Booking</h2>
			<p style="text-align:left; padding-left:10px; padding-right:10px"><b>Course Info</b></p>
			<p style="text-align:left; padding-left:10px; padding-right:10px">Course Name: <?php echo $_SESSION['subjectname']; ?></p>
			<p style="text-align:left; padding-left:10px; padding-right:10px">Time: <?php echo $_SESSION['time']; ?></p>
			<p style="text-align:left; padding-left:10px; padding-right:10px">Session: <?php echo $_SESSION['session']; ?></p>
			
			
			<p><h4>Thanks for Using Our System.</h4></p>
        </div>
        <div style="background-color:#f4f2f2d9; text-align:center; padding-top:20px; padding-bottom:20px;">
                <button name="btnOK" class="btn btn-box" style="margin:0">OK</button>
				</form>
        </div>
    </div>
</div>