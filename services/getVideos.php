<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 12/29/16
 * Time: 5:53 PM
 */

require_once('apikeys.php');

$output = [
    'success'=>false
];

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");

$searchQuery = filter_var($_POST["q"], FILTER_SANITIZE_STRING);
$searchQuery = addslashes($searchQuery);
$searchAmount = $_POST["maxResults"];

if($youtubeData = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&key=$youtubeKey&q=$searchQuery&maxResults=$searchAmount&type=video&videoDefinition=high", false, stream_context_create($arrContextOptions))){
    $decoded = json_decode($youtubeData);

    $videos = [];

    foreach($decoded->items as $videoItem){
        $videos[] =[
            'title'=>$videoItem->snippet->title,
            'id'=>$videoItem->id->videoId
        ];
    }

    $output=[
        'success'=>true,
        'video'=>$videos
    ];
}

print_r(json_encode($output));
