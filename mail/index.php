<?php

include 'mail.php';


$recipientEmail = 'kouamekouadiofrancisbennett@gmail.com';
$emailSubject = 'Testing mail server';
$msg = 'This is a test mail sending';
$fromEmailAddress = 'kintech@rabbinetwork.org';
$fromEmailAddressPassword = 'ZSnzTbBjFqf6';
$fromText = "KinTech";
$smtpHost = 'mail.rabbinetwork.org';



$send_mail = email($recipientEmail,$emailSubject,$msg,$fromEmailAddress,$fromEmailAddressPassword,$fromText,$smtpHost);

if($send_mail){
    echo "Yay, it worked";
}else{
    echo "Oops, something wrong with the email function";
}