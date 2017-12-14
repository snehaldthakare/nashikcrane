<?php
ob_start();
if(isset($_POST['submit']))
{
require("class.phpmailer.php");

$mail = new PHPMailer();

//Your SMTP servers details

$mail->IsSMTP();               // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server or localhost
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "manoj@aviatorsinfotech.com";  // SMTP username manoj@aviatorsinfotech.com  test@cakeshopnashik.com
$mail->Password = "hashamtaiyyab7@1234"; // SMTP password hashamtaiyyab7@1234 test@1234
//It should be same as that of the SMTP user

$redirect_url = "http://".$_SERVER['SERVER_NAME']; //Redirect URL after submit the form

$mail->From = $mail->Username;	//Default From email same as smtp user
$mail->FromName = $_POST['name'];

 //Email address where you wish to receive/collect those emails.
///*$mail->AddAddress("aviatorsinfotech@gmail.com");*/
$mail->AddAddress("aatifshaikh29@gmail.com");
//$mail->AddAddress("vishwakarmacranenashik@rediffmail.com"); 

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Enqury From ".$_POST['email'];
$message = "name :".$_POST['name'].
" \r\n <br>email:".$_POST['email'].
" \r\n <br>telephone :".$_POST['telephone'].
" \r\n <br>message :".$_POST['message'];
$mail->Body    = $message;

if(!$mail->Send())
{ ?>
   <script>
               alert('This message is not send');
               history.go(-1);
        </script>
<?php
}else{

//echo "Message has been sent";
?>
     <script>
             alert('This message is send successfully');
             window.open('index.php','_self');
    </script>
<?php    
}
}
?>
