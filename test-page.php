<?php

function send_mail()
    {
        $to  = 'agrawalm668@gmail.com';
        
        // subject
        $subject = 'New payment request received.';
        
        // message
        $message = 'New payment request received, please check your admin panel.';
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        // Additional headers
        $headers .= 'To: LuckyBet <info@luckybet.co.in>' . "\r\n";
        $headers .= 'From: Payment Reminder <info@luckybet.co.in>' . "\r\n";
        $headers .= 'Cc: info@luckybet.co.in' . "\r\n";
        $headers .= 'Bcc: info@luckybet.co.in' . "\r\n";
        
        // Mail it
        mail($to, $subject, $message, $headers);
    }
?>