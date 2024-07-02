<?php

require __DIR__.'/vendor/autoload.php';

use App\LawyerRating;
use Dotenv\Dotenv;

$dotenv =  Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiUrl = $_ENV['API_URL'];
$apiToken = $_ENV['API_TOKEN'];

$lawyerRating = new LawyerRating($apiToken, $apiUrl);

$ressult = $lawyerRating->getRating('This lawyer is the best!');

// Expect below data on success
// [
//   [
//     {
//       "label": "POSITIVE",
//       "score": 0.9973899722099304
//     },
//     {
//       "label": "NEGATIVE",
//       "score": 0.002610080409795046
//     }
//   ]
// ]

var_dump($ressult);
