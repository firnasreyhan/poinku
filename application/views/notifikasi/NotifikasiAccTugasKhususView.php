<?php
    $curl           = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "registration_ids":["'.$token.'"],
      "notification": {
        "title": "Tugas Khusus Telah Divalidasi",
        "body": "Tugas Khusus anda telah divalidasi, silahkan periksa aplikasi anda"
      },
      "priority":"high"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-type: application/json',
        'Authorization: key=AAAAcGKeTO0:APA91bHXimdeYIAvYgPPRU9qP3fDl2nZWt1C6Y9f5JaspVqQqOk9vlCl5kXom0hC-XiqmLgmau6L3Gg_KX7XPQah-UbKBzgaFXrEFSSdvWz6EM_Gj2QKkDxCSIg_K8xX2QZbyMOz0sBR'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

?>
