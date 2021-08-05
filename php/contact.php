<?php
include 'connection.php'; // Connection to the databases
if(isset($_POST['submit'])){
//Submitted Form values
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$notify = "Yes";

//SQL Insert Query
$sql_query = "INSERT INTO contact_message(name, email, subject, message, notify)
VALUES ('$name', '$email', '$subject', '$message', '$notify')";

$ins = mysqli_query($conn,$sql_query);

// 
$to = "lokeshdidwania3@gmail.com";

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
window.location.replace("../thankyou");
</script>
<?php
}
else{
?>
<script>
alert("Unable to send message");
window.location.replace("../contact");
</script>
<?php
}
}
?>