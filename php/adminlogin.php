<?php
include 'connection.php'; // Connecting to the database
if(isset($_POST['submit'])){
// SQl Submitted Query
$username = $_POST['uname'];
$password = $_POST['pword'];

//SQL Select Query
$select_query = "select * from admin_user where Username='$username'";


$query = mysqli_query($conn,$select_query);

// Fetching Query Results
$res = mysqli_fetch_array($query);

if($res!=NULL)
{
if($res['username']==$username && $res['password']==$password){
?>
<script>
window.location.replace("../admin/index.html");
</script>
<?php
}
else
{
?>
<script>
alert("Incorrect username or password");
window.location.replace("../admin.html");
</script>
<?php
}
}
else
{
?>
<script>
alert("Username does not exist");
window.location.replace("../admin.html");
</script>
<?php
}
}
?>