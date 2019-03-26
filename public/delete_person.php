
<?php

require('../initialize.php');

//going to delete the person with this id
$person_ID = $_POST['person_ID'];

$url = $baseApiUrl . '/api/v1/people/' . $person_ID . '?access_token=' . $token; 

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($ch, CURLOPT_TIMEOUT, '10'); 


$json_response = curl_exec($ch);
curl_close($ch);

$response = json_decode($json_response, true);

if(empty($response))
	echo 'DELETED'; 

else{
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

