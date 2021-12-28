<?php



function getToken()
{
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://demo.campay.net/api/token/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
     "username": "Bo1IKDOGkHfWEYj2XPHlxU2wZty0tBdMrPw_RuCeHGNLMHksCQP48ZcJqr8KJH5pbsH8NnVmTdC07hukvPdNWA",
     "password": "R06-K23Kt-u4mLa6lAIuB-jpyjHAdkcfEz9qIRNJzhCB-ctPSZXE7DdcZvMFLQ4-ABaJSYT4jFvDEHNjaM-mrg"
     }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $object = json_decode($response);
  return $object->{ 'token'};
}




function requestToPay($token, $phone_number, $description, $amount)
{

  $external_reference = strval(random_int(100000000, 999999999));
  $phone = '237' . $phone_number;

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://demo.campay.net/api/collect/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
        "amount":' . json_encode($amount) . ',
        "from":' . json_encode($phone) . ', 
        "description":' . json_encode($description) . ',
        "external_reference": ' . json_encode($external_reference) . '
      }',
    //'{"amount":"5","from":"237"' . $phone_number . ',"description":' . $description .',"external_reference": ' . $external_reference . '}',
    CURLOPT_HTTPHEADER => array( //"123456789"}
      'Authorization: Token ' . $token, //54982975 //curl_escape //654982975
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return json_decode($response)->{ 'reference'};
}


function paymentStatus($reference, $token)
{

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://demo.campay.net/api/transaction/' . $reference . '/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Token ' . $token,
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return json_decode($response)->{ 'status'};
}


function withdrawal($token, $phone_number, $amount)
{

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://demo.campay.net/api/withdraw/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
        "amount": ' . json_encode($amount) . ',
        "to": ' . json_encode($phone_number) . ',
        "description": "Withdrawal",
        "external_reference": ' . json_encode(strval(random_int(100000000, 999999999))) . '
    }',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Token ' . $token, //8jf4qm1m
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return json_decode($response);
}

$token = getToken();








?>


