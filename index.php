<?php

require __DIR__.'/vendor/autoload.php';

use App\LawyerRating;
use Dotenv\Dotenv;

$dotenv =  Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiUrl = $_ENV['API_URL'];
$apiToken = $_ENV['API_TOKEN'];

$lawyerRating = new LawyerRating($apiToken, $apiUrl);

$reviews = [
    'I had an exceptional experience with Attorney Smith. She was incredibly knowledgeable and always took the time to explain complex legal terms in a way that I could understand. Her dedication to my case was evident from the start, and she consistently kept me updated on any progress. Her strategic thinking and professionalism were impressive, leading to a very favorable outcome. I felt supported and confident throughout the entire process. The only reason I’m not giving a full 5 stars is because there was a minor delay in returning one of my calls, but it was promptly addressed. Highly recommended!',
    'Working with Attorney Johnson had its ups and downs. On the positive side, he was knowledgeable and provided good advice for my case. He was professional and courteous in our interactions. However, there were a few areas that left me somewhat dissatisfied. Sometimes, communication was slower than I expected, and I had to follow up for updates. While he did address my concerns eventually, I felt that a bit more promptness and attentiveness could have improved the overall experience. The case was resolved adequately, and with some minor adjustments, Attorney Johnson could certainly deliver a higher level of service.',
    'My experience with Attorney Lee was disappointing. While he seemed knowledgeable during our initial consultation, that level of engagement did not continue throughout the process. There were significant delays in communication, and my emails and calls often went unanswered for days. When I did receive responses, they were brief and did not fully address my questions. Additionally, there were several mistakes in the paperwork that caused delays and additional stress. The final outcome of my case was not as favorable as I had hoped, and I feel that a lack of attention to detail and poor communication were major factors. I would not recommend his services based on my experience.'
];
$ratings = [];

foreach($reviews as $review) {
    $result = $lawyerRating->getRating($review);
    if(!$result['error']) {
        $ratings[$review] = $result['result'][0];
    }
}

echo '<div style="width:700px;overflow:scroll">
        <pre style="word-wrap:break-word;white-space:break-spaces">';
print_r($ratings);
echo '</pre>
    </div>';
// OUTPUT: string(49) "[{"label":"POSITIVE","score":0.9998682737350464}]"
