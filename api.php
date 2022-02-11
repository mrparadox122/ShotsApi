<?php
$con = mysqli_connect("localhost","root","Soosle@123#","sooslein_shots");
$response = array();
if($con){
	$sql = "SELECT * FROM `post_details`;";
    $result = mysqli_query($con,$sql);
    if($result){
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['url']= $row['url'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
?>