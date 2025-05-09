<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.paymongo.com/v1/links",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'data' => [
      'attributes' => [
        'amount' => 250000, // Amount in centavos, 10000 = 100 PHP
        'description' => 'Payment for Minangun Resort',
        'remarks' => 'Optional remarks here'
      ]
    ]
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Basic c2tfdGVzdF9IR1dlRVV5Tjk0ZkxzU3J5R1Vad3lDOHQ6", // Replace with your actual API key (in base64 if necessary)
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $responseData = json_decode($response, true);

  // Extract the checkout URL
  $checkoutUrl = $responseData['data']['attributes']['checkout_url'];

  // Redirect the user to the PayMongo payment page
  header("Location: " . $checkoutUrl);
  exit(); // Make sure the script stops after the redirect
}
?>
