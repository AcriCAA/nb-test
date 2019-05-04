<?php

require('../initialize.php');

//assemble the api call for the url 
$url = $baseApiUrl . '/api/v1/people?access_token=' . $token; 

$ch = curl_init($url);

for($i = 0, $i <=300, $++){
//creating a random id here just to facilitate multiple updating of the same record on refresh 
$randomID = uniqid(); 

//randomly created details
$first_name = 'Corey'.$randomID;
$last_name = 'Last'.$randomID;
$email = $randomID.'@email.com'; 

$data = array(
    'person' => array(
    'email' => $email,
    'last_name' => $last_name,
    'first_name' => $first_name
    )
);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
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

}

?>

<!DOCTYPE html>
<html>
<body>

</body>
</html>