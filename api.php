<?php
function methodGET() {
    if (!isset($_GET['user'])) {
        http_response_code(400);
        header("HTTP/1.1 400 Bad Request");
        die(json_encode([
            'success' => false,
            'error' => "No user ID provided in the GET request!"
        ], JSON_PRETTY_PRINT));
    }
    if(!isset($_GET['link'])) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => "No link provided in the GET request!"
        ], JSON_PRETTY_PRINT));
    }
    $url = urldecode($_GET['link']);
    if (strpos($url, 'https') === false || strpos($url, 'http') === false) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => "Invalid link format provided in the request!"
        ], JSON_PRETTY_PRINT));
    }
    $base = "https://link-to.net/" . $_GET['user'];
    $base .= "/" . rand(100, 1000) . "." . rand(999, 10000000) . "/dynamic/?r=";
    $base .= base64_encode(urlencode($_GET['link']));
    if (!isset($_GET['plain'])) {
        die(json_encode([
            'success' => true,
            'link' => $base
        ], JSON_PRETTY_PRINT));
    } else {
        die($base);
    }
}

function methodPOST() {
    $post = json_decode(file_get_contents("php://input"));
    if (!isset($post['user'])) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => "No user ID provided in the POST request!"
        ], JSON_PRETTY_PRINT));
    }
    if (!isset($post['link'])) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => "No link provided in the POST request!"
        ], JSON_PRETTY_PRINT));
    }
    $url = $post['link'];
    if (strpos($url, 'https') === false || strpos($url, 'http') === false) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => "Invalid link format provided in the request!"
        ], JSON_PRETTY_PRINT));
    }
    $base = "https://link-to.net/" . $post['user'];
    $base .= "/" . rand(100, 1000) . "." . rand(999, 10000000) . "/dynamic/?r=";
    $base .= base64_encode(urlencode($post['link']));
    die(json_encode([
        'success' => true,
        'link' => $base
    ], JSON_PRETTY_PRINT));
}

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        methodGET();
        break;
    case "POST":
        methodPOST();
        break;
    default:
        http_response_code(501);
        die(json_encode([
            'success' => false,
            'error' => "Invalid request method."
        ], JSON_PRETTY_PRINT));
        break;
}