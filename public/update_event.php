<?php

require('../initialize.php');

$event_ID = $_POST['event_ID'];

$new_event_name = $_POST['event_name'];

$url = $baseApiUrl . '/api/v1/sites/'.$site_slug.'/pages/events/' . $event_ID . '?access_token=' . $token; 

$ch = curl_init($url);


	$data = array(
		'event' => array(

			"status"=> "published",
			"name"=> $new_event_name,
			"intro"=> "Take the 24hr nofoodchallenge!!!",
			"time_zone"=> "Pacific Time (US & Canada)",
			"start_time"=> "2020-05-08T17:00:00-00:00",
			"end_time"=> "2020-05-08T19:00:00-00:00",
			"contact"=> array(
				"name"=> "Byron Anderson",
				"contact_phone"=> "1234567890",
				"show_phone"=> true,
				"contact_email"=> "contact@venue.com",
				"email"=> "contact@venue.com",
				"show_email"=> true
			)
		)
	);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($ch, CURLOPT_TIMEOUT, '10'); 
curl_setopt($ch, CURLOPT_HTTPHEADER, 
array("Content-Type: application/json","Accept: application/json"));

$json_data = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
$json_response = curl_exec($ch);
curl_close($ch);
$response = json_decode($json_response, true);
echo "<pre>";
print_r($response); 
echo "</pre>";

?>

<!DOCTYPE html>
<html>
<body>

</body>
</html>