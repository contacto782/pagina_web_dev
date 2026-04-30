<?php

if (sizeof($_POST) > 0 ):

    $data  = 'https://docs.google.com/forms/d/e/1FAIpQLSde0WU9YxnZZSdcOrJv-xi3iU05n281AcouplUlSjZeGoYtsQ/formResponse?entry.948479658='.urlencode($_POST['email']).'&entry.16094281='.urlencode($_POST['nombre']);
    ;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Access-Control-Allow-Origin: *",
        "cache-control: no-cache"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    header('location:/gracias');

endif;