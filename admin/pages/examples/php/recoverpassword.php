<?php 

include 'connection.php'; // Connecting to the database
if(isset($_POST['submit'])){
$pword = $_POST['pword'];
$cpword = $_POST['cpword'];

$select_query = "select email from admin_recovery";

$query = mysqli_query($conn,$select_query);

$res = mysqli_fetch_array($query);

$email = $res['email'];

if($cpword == $pword){
$update_query = "UPDATE admin_user
SET password = '$pword'
WHERE email = '$email'";
$update = mysqli_query($conn,$update_query);


$delete_query = "delete from admin_recovery";

$del = mysqli_query($conn,$delete_query);

?>
<script>
alert("Password reset");
window.location.replace("../login.html");
</script>
<?php
}
else {
    ?>
<script>
alert("Passwords don't match!!!");
window.location.replace("../recover-password.html");
</script>
<?php
}

}
?>