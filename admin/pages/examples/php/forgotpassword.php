<?php 

include 'connection.php'; // Connecting to the database
if(isset($_POST['submit'])){
$email = $_POST['email'];

$select_query = "select * from admin_user where email='$email'";


$query = mysqli_query($conn,$select_query);

// Fetching Query Results
$res = mysqli_fetch_array($query);

if($res){

    $delete_query = "delete from admin_recovery";

    $del = mysqli_query($conn,$delete_query);

    $sql_query = "INSERT INTO admin_recovery(email)
VALUES ('$email')";

$ins = mysqli_query($conn,$sql_query);
    ?>
<script>
window.location.replace("../recover-password.html");
</script>
<?php
}
else {
    ?>
<script>
alert("Invalid Email Address. Please try again..");
window.location.replace("../forgot-password.html");
</script>
<?php
}
}
?>