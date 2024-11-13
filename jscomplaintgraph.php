<?php
	include("dbconnection.php");
	$sqlcomplaint ="SELECT MONTHNAME(complaint_date) as month, YEAR(complaint_date) as year, COUNT(*) as total FROM complaint WHERE MONTH(complaint_date) >= MONTH(CURDATE()) - 12 AND YEAR(complaint_date) = YEAR(CURDATE()) GROUP BY MONTH(complaint_date) ORDER BY complaint_date DESC";
	$qsqlcomplaint  = mysqli_query($con,$sqlcomplaint);

	$complaint_count_array = array();
	while($rscomplaint = mysqli_fetch_array($qsqlcomplaint)){
		$complaint_count_array[$rscomplaint['month'].' '.$rscomplaint['year']] = $rscomplaint['total'];
	}

	$xValues = array();
	$xMonth = array();
	$yValues = array();
	for($i=0;$i<12;$i++){
		$month_year1 = date('M y', strtotime("-$i month") );  // 'M y' will give you the abbreviated month and two-digit year
		$month_year = date('F Y', strtotime("-$i month") );  // 'M y' will give you the abbreviated month and two-digit year
		if(isset($complaint_count_array[$month_year])){
			$yValues[] = $complaint_count_array[$month_year];
		}
		else{
			$yValues[] = 0;
		}
		$xValues[] = $month_year1;
	}

	$dataPoints = array();
	$data['months'] = array();
	$data['counts'] = array();
	for($i=0;$i<count($xValues);$i++){
		$dataPoints[] = array("label"=> $xValues[$i], "y"=> $yValues[$i]);
		$data['months'][] = $xValues[$i];
		$data['counts'][] = (int)$yValues[$i];
	}

	echo json_encode($data);
?>
