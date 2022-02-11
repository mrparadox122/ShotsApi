<?php

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$con = mysqli_connect('localhost','root','Soosle@123#');
mysqli_select_db($con,'sooslein_shots');
$data = json_decode(file_get_contents("php://input"),true);
$video_id=$data['video_id'];$flag=$data["flag"];
    if ($flag=="1"){
        $query = "UPDATE `post_details` SET `likes`=`likes`+1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con,$query);

        if ($query_run){
            echo "liked";
        }
        else{
            echo "////////////";
        }
    }

    if ($flag=="2"){
        $query = "UPDATE `post_details` SET `shares`=`shares`+1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con,$query);

        if ($query_run){
             echo "shared";
        }
        else{
            echo "////////////";
        }
    }


    if ($flag=="3"){
        $query = "UPDATE `post_details` SET `comments`=`comments`+1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con,$query);

        if ($query_run){
            echo "commented";
        }
        else{
            echo "////////////";
        }
    }
    if ($flag=="4"){
        $query = "UPDATE `post_details` SET `likes`=`likes`-1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con,$query);

        if ($query_run){
            echo "disliked";
        }
        else{
            echo "////////////";
        }
    }
    if ($flag=="5") {
        $query = "UPDATE `post_details` SET `comments`=`comments`-1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo "comment removed";
        } else {
            echo "////////////";
        }
    }
    if ($flag=="6") {
        $query = "UPDATE `post_details` SET `views`=`views`+1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo "view added";
        } else {
            echo "////////////";
        }
    }
    if ($flag=="7") {
        $query = "UPDATE `post_details` SET `views`=`views`-1 WHERE `videoid`=$video_id";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo "view removed";
        } else {
            echo "////////////";
        }
    }