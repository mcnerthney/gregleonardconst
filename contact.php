<?
///////////////////////////
//Begin Configuration
///////////////////////////

// Your email
$to = "lleonard@carroll.edu" . ", " ;

// Email Subject
$subject = "Leonard Construction Contact form submission";

// Server name, to display in the headers
$server_name = "lleonarddomian.com";

///////////////////////////
//End Configuration
///////////////////////////

if (!empty($_POST['send']) || !empty($_GET['send']))
	{
	$action = (!empty($_POST['send'])) ? $_POST['send'] : $_GET['send'];
	}
else
	{
	$action = '';
	}

$build_message = false;
if($action != "")
	{
	$build_message = true;
	$message = trim($_POST['description']);
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$time = time();
	$date = date("F j, Y", time());
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
	$headers .= "From: $email\r\n";
	$headers .= "X-mailer: " . $server_name . " Server\r\n";
	}

if($build_message)
	{
/* message */
$message = "
Name: $name\n 
E-Mail: $email\n
Phone Number: $phone\n
Date Sent: $date\n 
Description:\n----------------------------------------\n$message \n";

	if(mail($to, $subject, $message, $headers))
		{
		$result = "<b>Thank you</b>.<br />I will get back to you very soon.<br />";
		}
	else
		{
		$result = "Sorry: An error occured, please try again later.";
		}
	}

// Output a result Message
//print $result;

header ('Location: http://www.lleonarddomian.com/contactThanks.html');
exit ();
?>

