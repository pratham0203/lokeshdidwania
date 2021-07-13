<?php
include 'connection.php'; // Connection to the databases
if(isset($_POST['submit'])){
//Submitted Form values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//SQL Insert Query
$sql_query = "INSERT INTO contact_message(name, email, subject, message)
VALUES ('$name', '$email', '$subject', '$message')";

$ins = mysqli_query($conn,$sql_query);

// 
$to = "aharnishks@gmail.com";

$details = "Sender Details: <br>Name: " . $name . ", Email ID: ". $email . "<br><br>Message:<br>"; 

$message = $details . $message;

// use wordwrap() if lines are longer than 70 characters
$message = wordwrap($message ,70);

$headers = 'From: noreply@lokeshdidwania.com' . "\r\n";
// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// send email
mail($to,$subject,$message, $headers);

if($ins){
?>

<script>
window.location.replace("thankyou.html");
</script>
<?php
}
else{
?>
<script>
alert("Unable to send message");
window.location.replace("contact.html");
</script>
<?php
}
}
?>