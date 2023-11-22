<?php 

include_once '../connection.php';

$dlt_cmt = $_GET['cmt_id_e'];

$sql_select = "select * from post_comment where cmt_id = $dlt_cmt";
$data = mysqli_query($conn,$sql_select);
$row_cmt_select = mysqli_fetch_assoc($data);

echo json_encode($row_cmt_select);


 ?>