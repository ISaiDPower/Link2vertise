<?php
if (!isset($_GET['user_id'])) {
    http_response_code(400);
    die(json_encode([
        'success' => false,
        'error' => 'No user ID provided in the POST request!'
    ], JSON_PRETTY_PRINT));
} else if (!isset($_GET['link'])) {
    http_response_code(400);
    die(json_encode([
        'success' => false,
        'error' => 'No link was provided in the POST request!'
    ], JSON_PRETTY_PRINT));
} else {
    if (strpos(urldecode($_GET['link']), 'http') === false || strpos(urldecode($_GET['link']), 'https') === false) {
        http_response_code(400);
        die(json_encode([
            'success' => false,
            'error' => 'Could not find a valid redirect in the link you have provided!'
        ], JSON_PRETTY_PRINT));
    }
}

$base = "https://link-to.net/" . $_GET['user_id'] . "/" . rand(0, 1000) . "/dynamic/";
$link = base64_encode(urldecode($_GET['link']));
$final_link = $base . "?r=" . $link;
http_response_code(200);
die(json_encode([
    'success' => true,
    'link' => $final_link
]));