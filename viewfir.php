<?php
include("header.php");
if(!isset($_SESSION['cop_id']) && !isset($_SESSION['complainer_id']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM fir WHERE fir_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('fir record deleted successfully...');</script>";
		echo "<script>window.location='viewfir.php';</script>";
	}
}
?>

<section class="pad50" style="background-color: rgba(250, 250, 250, 1);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-section">
					<h3 class="underline"><span>View FIR</span></h3>
					<p class="mb30">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Complaint No.</th>		
									<th>FIR Registration No.</th>		
									<th>Section</th>			
									<th>Complaint type</th>			
									<th>FIR Registration date</th>
									<th>Status</th>
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
							<tbody>
								<?php
								if(isset($_SESSION['cop_id'])){
									$sql = "SELECT fir.* FROM fir";
								}
								else{
									$sql = "SELECT fir.*,complaint.complainer_id FROM fir LEFT JOIN complaint ON fir.complaint_id = complaint.complaint_id WHERE fir.fir_id != 0 ";
								}
								if(isset($_SESSION['complainer_id']))
								{
									$sql = $sql . " AND complaint.complainer_id='$_SESSION[complainer_id]' ";
								}
								$qsql = mysqli_query($con,$sql);
								while($rs = mysqli_fetch_array($qsql))
								{
									$results[] = $rs;
								}
								$results = array_reverse($results);
								foreach ($results as $rs)
								{
									echo "<tr>
												<td>$rs[complaint_id]</td>
												<td>$rs[fir_id]</td>						
												<td>$rs[section]</td>			
												<td>$rs[complaint_type]</td>			
												<td>" . date("d-M-Y",strtotime($rs['fir_regdate']))  . "</td>	
												<td>$rs[status]</td>";
									if(isset($_SESSION['cop_id']))
									{
									echo "<td STYLE='WIDTH: 100px;'>
									<a href='fir.php?editid=$rs[0]&complaint_id=$rs[complaint_id]' class='btn btn-warning' STYLE='WIDTH: 100px;'>Edit</a>
									</td>";
									}
									echo "	</tr>";
										
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