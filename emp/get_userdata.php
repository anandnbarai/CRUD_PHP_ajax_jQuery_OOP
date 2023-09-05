<?php
include('connect.php');

$requestData= $_REQUEST;
$columns = array(
	0 => 'id',
	1 => 'name',
	2 => 'email',
	3 => 'phone',
	4 => 'countryName',
	5 => 'stateName',
	6 => 'cityName',
	7 => 'eStatus'
);

$SELECTFIELDS = "SELECT e.id,e.name,e.email,e.phone,c.name as countryName,s.StateName as stateName,ci.name as cityName";
$SINGLEFIELD = "SELECT e.id";
$sql = " 
FROM
emp as e
LEFT JOIN countries as c ON c.id = e.country
LEFT JOIN states as s ON s.id = e.state
LEFT JOIN cities as ci ON ci.id = e.city
WHERE 
e.eStatus = 'y' ";

if(!empty($requestData['search']['value'])){
	$strString = $requestData['search']['value'];
	$sql.=" AND (
		e.name LIKE '".$strString."%' OR
		e.email LIKE '".$strString."%' OR
		e.phone LIKE '".$strString."%' OR
		c.name LIKE '".$strString."%' OR
		s.StateName LIKE '".$strString."%' OR
		ci.name LIKE '".$strString."%'

	)";
}

$query=$emp->mf_query($SINGLEFIELD.$sql);
$totalFiltered = $emp->mf_num_rows($query); 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."";	
$query=$emp->mf_query($SELECTFIELDS.$sql);

$data = array();
$i=1;
while($row=$emp->mf_fetch_array($query)){
	$id = $row['id'];
	// if($iEditPer){
	// 	$view='<a class="btn small btnic btn-grey2 mr-5 tip" title="Edit" href="manage-assembly-uom?id='.$row["id"].'"><i class="icon" data-feather="edit"></i></a>';
	// }
	// if($iDelPer){
	// 	$delete='<a class="btn small btnic btn-grey2 mr-5 tip" title="Delete" href="manage-assembly-uom?act=del&id='.$row["id"].'" onclick="return deleteconfirm()"><i class="icon" data-feather="trash-2"></i></a>';
	// }

	$btnEdit = '<a class="text-dark" href="update.php?edit='.$id.'" role="button">Edit</a>';
	$btnDelete = '<a class="text-danger delete" deleteid="'.$id.'" role="button">Delete</a>';

	$nestedData=array(); 
	$nestedData[] = $i;	
	$nestedData[] = $row["name"];	
	$nestedData[] = $row["email"];
	$nestedData[] = $row["phone"];
	$nestedData[] = $row["countryName"];
	$nestedData[] = $row["stateName"];
	$nestedData[] = $row["cityName"];	
	$nestedData[] = $btnEdit.'&nbsp;'.$btnDelete;
	$data[] = $nestedData;
	$i++;
}

$json_data = array(
	"draw"            => intval($requestData['draw']),
	"recordsTotal"    => intval($totalFiltered),
	"recordsFiltered" => intval($totalFiltered),
	"data"            => $data
);

echo json_encode($json_data);

exit;
