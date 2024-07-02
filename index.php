<?php

require __DIR__.'/vendor/autoload.php';

use App\LawyerRating;
use Dotenv\Dotenv;

$dotenv =  Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiUrl = $_ENV['API_URL'];
$apiToken = $_ENV['API_TOKEN'];

$lawyerRating = new LawyerRating($apiToken, $apiUrl);

$result = $lawyerRating->getRating('This lawyer is the best!');

if($result['error']) {
    echo $result['message'];
    exit;
}
var_dump(json_encode($result['result']));
// OUTPUT: string(49) "[{"label":"POSITIVE","score":0.9998682737350464}]"
