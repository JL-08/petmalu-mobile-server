<?php

require "conn.php";
$json = json_decode(file_get_contents('php://input'), true);

$title = $json['title'];
$body = $json['body'];
$vet_id = $json["vet_id"];

    date_default_timezone_set('Asia/Manila');
    $newdate = new DateTime();
    $current_date = $newdate->format('Y-m-d H:i:s');
    $mysql_qry = "insert into posts (title, body, vet_id, created_at, updated_at) 
    values ('$title','$body','$vet_id','$current_date', '$current_date')";
	
    if($conn->query($mysql_qry) == TRUE){
        echo json_encode("The post has been created.");
    }else{
	    echo json_encode("Error: ".$mysql_qry."<br>".$conn->error);
    }


?>