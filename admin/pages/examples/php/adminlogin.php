<?php
include 'connection.php'; // Connecting to the database
if(isset($_POST['submit'])){
// SQl Submitted Query
$username = $_POST['uname'];
$password = $_POST['pword'];



$ip = "";

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
    // Check for IP address from shared Internet
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
    // Check for the proxy user
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
    $ip = $_SERVER["REMOTE_ADDR"];
}

$ipaddress = $ip;

//SQL Select Query
$select_query = "select * from admin_user where Username='$username'";


$query = mysqli_query($conn,$select_query);

// Fetching Query Results
$res = mysqli_fetch_array($query);

if($res!=NULL)
{
if($res['username']==$username && $res['password']==$password){
$insert_query = "INSERT INTO admin_login(Ip_Address)
VALUES('$ipaddress')";
$query2 = mysqli_query($conn,$insert_query);
?>
<script>
window.location.replace("../../../index.php");
</script>
<?php
}
else
{
?>
<script>
alert("Incorrect username or password");
window.location.replace("../login.html");
</script>
<?php
}
}
else
{
?>
<script>
alert("Username does not exist");
window.location.replace("../login.html");
</script>
<?php
}
}
?>