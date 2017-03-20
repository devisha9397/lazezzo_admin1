 <?php 
	$table_id=$_REQUEST["id"];
	require 'database.php';
	
	$obj=new database();
	
	$res1=$obj->getfkuseremailbyBooktableid($table_id);
	while($row=mysqli_fetch_array($res1))
	{
		$fk_user_email=$row["fk_user_email"];
		$rest_name=$row["rest_name"];
	}
	$res=$obj->booktableApprove($table_id);															
	if($res==1)
	{
		
		error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
		require_once "phpmailer/class.phpmailer.php";



$message = 'Your Table is Booked Successfully at '.$rest_name.'  !!!'.'<br><br>'.
			'Thank you for booking table through LAZEEZO.'. '<br>';
        
// creating the phpmailer object
$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'lazeezo123@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'lazeezo@123';

// add a subject line
$mail->Subject = ' Table Booked Successfully ';

// Sender email address and name
$mail->SetFrom('lazeezo123@gmail.com', 'lazeezo');

//$email1="kinnarigandhi96jan@gmail.com";
// reciever address, person you want to send
$mail->AddAddress($fk_user_email);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	
    $mail->Send();
    $msg = "Mail send successfully";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}

		
		
		header('location:booktablestobeapproved.php');
	}

?>