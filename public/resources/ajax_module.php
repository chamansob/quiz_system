<?php
require_once('../../includes/initialize.php');
if (!$session->is_logged_in()) {
	redirect_to("login.php");
}


$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */
$table = ucfirst($_POST['action']);
$url = strtolower($_POST['action']);
$tablename = $table::table();
$filen = "ajax_" . $table . ".php";
$consss = 0;

// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;

$columns = array(
	// datatable column index  => database column name
	0 => 'id',
	1 => 'name'
);

// getting total number records without any search


$sql = "SELECT  * ";
$sql .= " FROM `" . $url . "`";
$query = mysqli_query($conn, $sql) or die($filen . ": get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT * ";
$sql .= " FROM `" . $url . "` WHERE 1=1";
if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql .= " AND ( name LIKE '%" . $requestData['search']['value'] . "%' ";
	$sql .= " OR  id ='" . $requestData['search']['value'] . "'";
	$sql .= "  )";
}
$query = mysqli_query($conn, $sql) or die($filen . ": get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query = mysqli_query($conn, $sql) or die($filen . ": get employees");

$data = array();
$row = array();
while ($row = mysqli_fetch_array($query)) {  // preparing an array
	$nestedData = array();


	$ro = $table::findOrFail($row['id']);
	if (strtolower($ro->status) == "active") {
		$scol = 'badge outline-badge-success';
		$status = "Deactive";
	} else {
		$status = "Active";
		$scol = 'badge outline-badge-danger';
	}
	$img = SITE_ROOT . DS . BASE_FOLDER . UPLOAD_PATH . $url . DS . $ro->image;
	if (file_exists($img)) {
		if ($ro->image != '') {
			$img = BASE_PATH . $ro->path() . webp($ro->image);
		} else {
			$img = BASE_PATH . DS . BASE_FOLDER . UPLOAD_PATH . webp('sample.jpg');
		}
	} else {
		$img = BASE_PATH . DS . BASE_FOLDER . UPLOAD_PATH . webp('sample.jpg');
	}
	$code = "'" . TP_BACK_SIDE . $url . '/status/' . $ro->id . "','" . $status . "'";
	$status = '<a href="javascript:confirmStatus(' . $code . ')"  class="' . $scol . '">' . $ro->status . '</a>';

	$nestedData[] = '<input type="checkbox" value="' . $ro->id . '" name="checkbox[]"/> ' . $ro->id;

	$nestedData[] = ucfirst($ro->name);
	$nestedData[] = '<img src="' . $img . '"  class="img-thumbnail img-responsive" width="100px" border="0">';
	$nestedData[] =	'<span class="d-inline-block text-truncate" style="max-width: 150px;">' . $ro->small_text . '</span>';
	$nestedData[] = $status;
	$nestedData[] = '<ul class="table-controls">
	<li>
	<a href="' . TP_BACK_SIDE . $url . '/edit/' . $ro->id . '" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a></li>
	<li>
	<form id="delform" class="widget-content" action="' . TP_BACK_SIDE . $url . '/delete_data" method="post"><input type="hidden" name="delete_id" value="' . $ro->id . '">
	<button onClick="archiveFunction(' . $ro->id . ')" type="submit" name="sub_delete" class="bg-transparent border-0 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon table-cancel"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
	</form>
		</li>
		</ul>';


	$data[] = $nestedData;
}
$json_data = array(
	"draw"            => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
	"recordsTotal"    => intval($totalData),  // total number of records
	"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
	"data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
