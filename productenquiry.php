<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['send'])){
    $companyName = $_POST["company-name"];
    $personName = $_POST["person-name"];
    $email = $_POST["email"];
    $tell = $_POST["tell"];
    $cell = $_POST["cell"];
    $web = $_POST["web"];
    $productName = $_POST["product-name"];
    $quality = $_POST["quality"];
    $quality1 = $_POST["quality-1"];
    $arrPort = $_POST["arr-port"];
    $ePrice = $_POST["e-price"];
    $finalDest = $_POST["final-dest"];
    $message = $_POST["msg"];
    
    //Load Composer's autoloader
    require 'phpmailer\Exception.php';
    require 'phpmailer\PHPMailer.php';
    require 'phpmailer\SMTP.php';


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0; //debuger
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                                                  
        $mail->Username   = 'info@raghuveergroup.com';                     
        $mail->Password   = 'jnsp lxke accr tjjm';                               
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom($email, 'User');
        $mail->addAddress('info@raghuveergroup.com', 'Admin');     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Raghuveer Group - Product Enquiry';
        $mail->Body    ="
        <p><strong>Company Name:</strong> $companyName</p>
        <p><strong>Contact Person:</strong> $personName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Tel:</strong> $tell</p>
        <p><strong>Cell:</strong> $cell</p>
        <p><strong>Web:</strong> $web</p>
        <p><strong>Product Name:</strong> $productName</p>
        <p><strong>Quality:</strong> $quality</p>
        <p><strong>Quality 1:</strong> $quality1</p>
        <p><strong>Arrival Port:</strong> $arrPort</p>
        <p><strong>Expected Price:</strong> $ePrice</p>
        <p><strong>Final Destination:</strong> $finalDest</p>
        <p><strong>Message:</strong> $message</p>";

        $mail->send();
        
        // Redirect to productenquiry.html with success message
        header("Location: productenquiry.html?success=1");

        exit;
    }
    catch (Exception $e) 
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}