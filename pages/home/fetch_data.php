<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM users ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'userid',
	1 => 'email',
	2 => 'fullname',
	3 => 'username',
	4 => 'password',
	5 => 'phone',
	6 => 'usertype',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE username like '%".$search_value."%'";
	$sql .= " OR email like '%".$search_value."%'";
	$sql .= " OR phone like '%".$search_value."%'";
	$sql .= " OR fullname like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY userid desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['userid'];
	$sub_array[] = $row['email'];
	$sub_array[] = $row['fullname'];
	$sub_array[] = $row['username'];
	$sub_array[] = $row['password'];
	$sub_array[] = $row['phone'];
	
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['userid'].'"  class="btn btn-primary btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['userid'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
