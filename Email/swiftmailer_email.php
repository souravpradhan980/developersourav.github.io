<?php

error_reporting(0);
require_once 'swiftmailer/lib/swift_required.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $visitor_email = $_REQUEST['email'];
    $to="sourav.bharatit@gmail.com";
    $from = "indiawebclass@gmail.com";
    $name = "Msg by ".$_REQUEST['username'];

    $ucword=ucwords($_REQUEST['username']);
    $strpos=strpos($ucword," ");
    if($strpos>0)
    {
        $user=substr($ucword,0,$strpos);
    }
    else{
        $user=$ucword;
    }
    
    
    $subject = $_REQUEST['subject'];
    $msg = $_REQUEST['comment']."<br> Gmail : $visitor_email";
   

    $name2="India Webclass";
    $subject2="Thanking you !! 🥇 ".$ucword;
    $msg2="Dear ".$user.",<br> Thanking you for being connected with us . We will contact you soon.<br> Regards <br> Sourav Pradhan <br> India Webclass ";
   
    $sent = email($to, $name, $from, $msg,$subject);
    $sent2 = email($visitor_email, $name2, $from, $msg2,$subject2);
    if($sent)
    { 
        echo "Massage sent successfully";    
    }
    else
    {
        echo "Unable to sent massage";
    }
}

function email($to, $name, $from, $msg,$subject)
{
    
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('indiawebclass')
            ->setPassword("Sourav#123");

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($subject)
            ->setFrom(array($from => $name))
            ->setTo(array($to))
            ->setBody($msg, 'text/html');

        $result = $mailer->send($message);

        return $result;

    // catch (Exception $e)
    // {
    //     echo 'Caught exception: ' . $e->getMessage() . "<br><br>";
    //     echo "Due to some technical problem your email verification message couldn't be sent to your registered email. Please login to your account after sometime to sent email verification message to your registered message.<br>";
    // }
}

?>

