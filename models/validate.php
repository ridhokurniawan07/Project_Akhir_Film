<?php
session_start();
ob_start();
$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => '6LfLjzApAAAAAHL47mB3JFC8soO-k38BkYTHtUK6',
    'response' => $_POST['g-recaptcha-response'],
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
if ($result->success){
    echo 'Validasi Berhasil';
    return;;
}

echo 'Apakah Kamu Robot';
ob_end_flush();
?>