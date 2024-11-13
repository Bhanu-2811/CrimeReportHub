<?php
include("header.php");
if(!isset($_SESSION['cop_id']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM station WHERE station_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('station record deleted successfully...');</script>";
		echo "<script>window.location='viewstation.php';</script>";
	}
}	
?>

<section class="pad50" style="background-color: rgba(250, 250, 250, 1);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-section">
						
					<h3 class="underline"><span>View Station</span></h3>

					<p class="mb30">


						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><h5>Station</h5></th>			
									<th><h5>State</h5></th>			
									<th><h5>City</h5></th>			
									<th><h5>Address</h5></th>			
									<th><h5>Contact No.</h5></th>					
									<th><h5>Status</h5></th>
									<th><h5>Action</h5></th>
								</tr>
							</thead>
							<tbody>
								<?php
								//$sql = "SELECT * FROM station";
								$sql = "SELECT *,state.state as st,city.city as ct FROM station JOIN city ON station.city_id= city.city_id JOIN state ON station.state_id= state.state_id";
								$qsql = mysqli_query($con,$sql);
								while($rs = mysqli_fetch_array($qsql))
								{
									echo "<tr>
												<td>$rs[station]</td>			
												<td>$rs[st]</td>			
												<td>$rs[ct]</td>			
												<td>$rs[station_addresss]</td>			
												<td>$rs[contact_no]</td>				
												<td>$rs[status]</td>
												
									<td>
									<a href='station.php?editid=$rs[0]' class='btn btn-warning'>Edit</a>
									</td>
									</tr>";
									
								}
								?>
							</tbody>
						</table>



					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>