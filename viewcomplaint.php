<?php
include("header.php");
if(!isset($_SESSION['cop_id']) && !isset($_SESSION['complainer_id'])){
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid'])){
	$sql = "DELETE FROM complaint WHERE complaint_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) >= 1)
	{
		echo "<script>alert('Complaint record deleted successfully...');</script>";
		echo "<script>window.location='viewcomplaint.php';</script>";
	}
}
?>

<section class="pad50" style="background-color: rgba(250, 250, 250, 1);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-section">
					<h3 class="underline"><span>View Complaints</span></h3>
					<p class="mb30">
						<table  class="table table-striped table-bordered">
							<thead>
								<tr>		
									<th>Complaint No.</th>		
									<th>Complaint date</th>		
									<th>Complainer</th>		
									<th>Station</th>		
									<th>Complaint Type</th>			
									<th>Complaint</th>			
									<th>Accused</th>			
									<th>Victim</th>				
									<th>Complaint status</th>			
									<th>Case Status</th>
									<?php
									if(isset($_SESSION['cop_id']))
									{
									?>
									<th>Action</th>
									<?php
									}
									?>
								</tr>
							</thead>
							<!-- <tbody>  LEFT JOIN complainer ON complainer.complainer_id=complaint.complainer_id WHERE complaint.status != '' "
								complainer.email_id, complainer.phoneno  -->
								<?php
								if(isset($_SESSION['cop_id'])){
									$sql = "SELECT complaint.*,station.station,station.contact_no,station.station_addresss, state.state,city.city,complainer.name FROM complaint LEFT JOIN station on complaint.station_id=station.station_id LEFT JOIN state ON state.state_id=station.state_id LEFT JOIN city ON city.city_id=station.city_id JOIN complainer";
								}
								else{
									$sql = "SELECT complaint.*,station.station,station.contact_no,station.station_addresss, state.state,city.city, complainer.name,complainer.email_id, complainer.phoneno FROM complaint LEFT JOIN station on complaint.station_id=station.station_id LEFT JOIN state ON state.state_id=station.state_id LEFT JOIN city ON city.city_id=station.city_id LEFT JOIN complainer ON complainer.complainer_id=complaint.complainer_id WHERE complaint.status != ''" ;
									if(isset($_SESSION['complainer_id']))
									{
										$sql = $sql . " AND complaint.complainer_id='$_SESSION[complainer_id]' ";
									}
									if(isset($_GET['complainerid']))
									{
										$sql = $sql . " AND complaint.complainer_id='$_GET[complainerid]' ";
									}
								}
								$qsql = mysqli_query($con,$sql);
								while($rs = mysqli_fetch_array($qsql))
								{
									$results[] = $rs;
								}
								$results = array_reverse($results);
								foreach ($results as $rs) {
									echo "<tr>		
										<td>$rs[0]</td>	
										<td>" . date("d-M-Y h:i A",strtotime($rs['complaint_date'])) ."</td>	
										<td>$rs[name]<br>$rs[email_id]<br>$rs[phoneno]</td>	
										<td>$rs[station],<br>$rs[city], $rs[state]</td>	
										<td>$rs[complaint_type]</td>			
										<td>$rs[complaint]</td>			
										<td>$rs[accusedby],<br>$rs[accused_address],<br>Ph. No. $rs[accused_phoneno]</td>			
										<td>$rs[victim_address],<br>Ph. No. $rs[victim_phoneno]</td>								
										<td>$rs[complaint_status]</td>
										<td>$rs[status]</td>";
										if(isset($_SESSION['cop_id']))
										{
											echo "<td style='width: 100px;'>
											<a href='complaint.php?editid=$rs[0]' class='btn btn-warning' style='width: 100px;'>Edit</a>
											</td>";
										}
									echo "</tr>";
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