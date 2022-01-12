<?php
require_once "functions.php";
$fields = ["name","email","event","message"];
$fields = validateAllPostInput($fields);
$body = generateBody($fields);
$html = generateHtml($body);
$emailData = ["to"=>$fields['email'],"subject"=>exactGreeting($fields['event']),"message"=>$html];
sendEmail($emailData);
echo $body;
?>