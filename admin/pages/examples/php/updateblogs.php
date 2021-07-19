<?php
include 'connection.php';
if(isset($_POST['submit'])){
$blog_id = $_POST['blid'];
$blog_title = $_POST['bltitle'];
$blog_content = $_POST['content'];
$blog_img = $_POST['image'];
$blog_author = $_POST['author'];
$isVisible = $_POST['visible'];


$id = $_GET['id'];

$sql_query = "UPDATE blogs
SET Blog_Title = '$blog_title', Blog_Content = '$blog_content', Blog_Image = '$blog_img', Blog_Author = '$blog_author', Visible = '$isVisible'
WHERE Blog_ID = '$id'";

$upd = mysqli_query($conn,$sql_query);

if($upd){
?>

<script>
alert("Blog updated successfully");
window.location.replace("../blogs-detail.php");
</script>
<?php
}
else{
?>
<script>
alert("Failed to update blog");
window.location.replace("../blogs-detail.php");
</script>
<?php
}
}
?>