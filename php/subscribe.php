<?php
include 'connection.php'; // Connection to the database
if(isset($_POST['submit'])){
//Submitted Form values
$email = $_POST['email'];

//SQL Insert Query
$sql_query = "INSERT INTO subscribers(Email)
VALUES ('$email')";

$ins = mysqli_query($conn,$sql_query);

// 
$to = $email;

$subject = "Subsciption to Lokeshdidwania newsletter";

$message = "Hey there,<br><br>Thanks for subscribing to us. <br> We'll notify you when we start."; 

$headers = 'From: noreply@lokeshdidwania.com' . "\r\n";
// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// send email
mail($to,$subject,$message, $headers);

if($ins){
?>

<script>
window.location.replace("../podcast.html");
</script>
<?php
}
else{
?>
<script>
alert("Unable to send email");
window.location.replace("../podcast.html");
</script>
<?php
}
}
?>