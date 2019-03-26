<?php

//load env variables
require('../initialize.php');

$apicall = "/api/v1/people/";

//creating a random id here just to facilitate multiple updating of the same record on refresh 
$randomID = uniqid(); 

$first_name = 'Corey'.$randomID;

$data = array(
    'person' => array(
    "email"=> "bob@example.com",
    "last_name"=> "SmithUpdate3",
    "first_name"=> $first_name,
    "sex"=> "M",
    "signup_type"=> 0,
    "employer"=> "Dexter Labs",
    "party"=> "P",
    )
    
);

//updating third person in the Nationbuilder db
$personid = "3"; 

$url = $baseApiUrl . $apicall . $personid . '?access_token=' . $token; 

$ch = curl_init($url);

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