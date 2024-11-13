<?php
include("header.php");
if(isset($_POST['submit']))
{
 	$sql ="UPDATE complainer  SET name='$_POST[name]',email_id='$_POST[email_id]',phoneno='$_POST[phoneno]' WHERE complainer_id='$_SESSION[complainer_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) >= 1)
	{
		echo "<script>alert('Complainer Profile updated successfully');</script>";
        echo "<script>window.location='index.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to update Complainer Profile');</script>";
        echo "<script>window.location='index.php';</script>";
	}
}
?>
<?php
if(isset($_SESSION['complainer_id']))
{
	$sqlcopprofile = "SELECT * FROM complainer WHERE complainer_id='$_SESSION[complainer_id]'";
	$qsqlcopprofile = mysqli_query($con,$sqlcopprofile);
	$rscopprofile = mysqli_fetch_array($qsqlcopprofile);
}
?>  
<section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.png);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title">
					<h1 style="background-color: #626262; background-color: rgba(98, 98, 98, 0.6);">Complainer - Profile</h1>
				</div>
			</div>
		</div>
	</div>
</section>


<form method="post" action="">
	<section class="pad-t100 pad-b70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="feature-4">
						<center style="padding: 15px;"><h2><a href="#">Complainer - Profile</a></h2></center>
						<div class="intro-text">
							<p>
								<div class="row">
									<div class="col-md-2">Name</div>
									<div class="col-md-10">
										<input type="text" name="name" id="name" class="form-control" value="<?php echo $rscopprofile['name']; ?>" >
									</div>
								</div><br>

								<div class="row">
									<div class="col-md-2">Email ID</div>
									<div class="col-md-10">
										<input type="email" name="email_id" id="email_id" class="form-control" value="<?php echo $rscopprofile['email_id']; ?>">
									</div>
								</div><br>

								<div class="row">
									<div class="col-md-2">Phone No.</div>
									<div class="col-md-10">
									<input type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo $rscopprofile['phoneno']; ?>">
									</div>
								</div><br>

								<div class="row" style="padding-left:25%">
									<div class="col-md-2"></div>
									<div class="col-md-10">
									<input type="submit" name="submit" id="submit" class="form-control btn btn-danger" style="width: 250px;" value="Update Profile" >
									</div>
								</div><br>
							</p>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </section>
</form>


<?php
include("footer.php");
?>     