<?php
$post = json_decode(file_get_contents("php://input"), true);
if (!isset($post['user_id'])) {
    http_response_code(400);
    die(json_encode([
        'success' => false,
        'error' => 'No user ID provided in the POST request!'
    ], JSON_PRETTY_PRINT));
} else if (!isset($post['link'])) {
    http_response_code(400);
    die(json_encode([
        'success' => false,
        'error' => 'No link was provided in the POST request!'
    ], JSON_PRETTY_PRINT));
} else {
    if (strpos($post['link'], 'http') === false || strpos($post['link'], 'https') === false) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => 'Could not find a valid redirect in the link you have provided!'
        ], JSON_PRETTY_PRINT));
    }
}

$base = "https://link-to.net/" . $post['user_id'] . "/" . rand(0, 1000) . "/dynamic/";
$link = base64_encode($post['link']);
$final_link = $base . "?r=" . $link;
http_response_code(400);
die(json_encode([
    'success' => true,
    'link' => $final_link
]));