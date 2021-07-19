<?php
include 'connection.php';
if(isset($_POST['submit'])){
$blog_title = $_POST['bltitle'];
$blog_content = $_POST['content'];
$blog_img = $_POST['image'];
$blog_author = $_POST['author'];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
$isVisible = $_POST['visible'];





$sql_query = "INSERT INTO blogs(Blog_Title, Blog_Content, Blog_Image, Blog_Author, Date, Visible)
VALUES ('$blog_title', '$blog_content', '$blog_img', '$blog_author', '$date','$isVisible')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Blog added successfully");
window.location.replace("../blogs-add.html");
</script>
<?php
}
else{
?>
<script>
alert("Failed to add blog");
window.location.replace("../blogs-add.html");
</script>
<?php
}
}
?>