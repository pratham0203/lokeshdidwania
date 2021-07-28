<?php
include 'connection.php';
if(isset($_POST['submit'])){
$podcast_id = $_POST['id'];
$podcast_title = $_POST['title'];
$podcast_content = $_POST['content'];
$podcast_video = $_POST['link'];
$isVisible = $_POST['visible'];


$id = $_GET['id'];

$sql_query = "UPDATE podcasts
SET Podcast_Title = '$podcast_title', Podcast_Content = '$podcast_content', Podcast_Link = '$podcast_video', Visible = '$isVisible'
WHERE Podcast_ID = '$id'";

$upd = mysqli_query($conn,$sql_query);

if($upd){
?>

<script>
alert("Podcast updated successfully");
window.location.replace("../podcasts-detail.php");
</script>
<?php
}
else{
?>
<script>
alert("Failed to update Podcast");
window.location.replace("../podcasts-detail.php");
</script>
<?php
}
}
?>