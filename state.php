<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE state SET state='$_POST[state]',description='$_POST[description]',status='$_POST[status]' WHERE state_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('state record updated successfully');</script>";
		}	
	}
	else
	{
		$sql ="INSERT INTO state (state,description,status)values('$_POST[state]','$_POST[description]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('state record inserted successfully');</script>";
			echo "<script>window.location='state.php';</script>";
		}	
	}

}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM state WHERE state_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<section class="breadcrumb-section parallax" style="background-image: url(assets/images/bg/breadcrumb4.png);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title">
					<h1>STATE </h1>
				</div>
			</div>
		</div>
	</div>
</section>
<form method="post" action="" >
	<section class="pad-t100 pad-b70">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="feature-4">
						<center style="padding: 15px;"><h2><a href="#">State</a></h2></center>
						<div class="intro-text">
							<p>
								<div class="row">
									<div class="col-md-2">State</div>
									<div class="col-md-10">
									<input name="state" id="state" class="form-control" type="text" value="<?php echo $rsstate['state']; ?>">
									</div>
								</div><br>

								<div class="row">
									<div class="col-md-2">Description</div>
									<div class="col-md-10">
										<textarea name="description" id="description" class="form-control"><?php echo $rsedit['description']; ?> </textarea>
									</div>
								</div><br>
								<div class="row">
									<div class="col-md-2">Status</div>
									<div class="col-md-10">
										<select name="status" id="status" class="form-control">
											<option value="">Select Status</option>
											<?php
											$arr = array("Active","Inactive");
											foreach($arr as $val)
											{
												if($val == $rsedit['status'])
												{
												echo "<option value='$val' selected>$val</option>";
												}
												else
												{
												echo "<option value='$val'>$val</option>";
												}
											}
											?>
										</select>
									</div>
								</div><br>
								<div class="row" style="padding-left:25%"	>
									<div class="col-md-2"></div>
									<div class="col-md-10">
									<input type="submit" name="submit" id="submit" class="form-control btn btn-danger" style="width: 250px;" >
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