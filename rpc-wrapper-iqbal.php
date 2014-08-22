<?php
include("get-twitter-stream.php");
$twStrm = new twitterStream();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
    case "getDwarves":
        $data = $twStrm->getDwarves();
        break;
    case "greetUser":
        $data = $twStrm->greetUser(
            filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)
        );
        break;
    default:
        http_response_code(400);   
        $data = array("error" => "bad request");
    }
    header("Content-Type: application/json");
    echo json_encode($data);
}


