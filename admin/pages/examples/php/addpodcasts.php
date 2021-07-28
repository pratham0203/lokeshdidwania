<?php
include 'connection.php';
if(isset($_POST['submit'])){
$podcast_title = $_POST['title'];
$podcast_content = $_POST['content'];
$podcast_video = $_POST['link'];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
$isVisible = $_POST['visible'];





$sql_query = "INSERT INTO podcasts(Podcast_Title, Podcast_Content, Podcast_Link, Date, Visible)
VALUES ('$podcast_title', '$podcast_content', '$podcast_video', '$date','$isVisible')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?> <script>
alert("Podcast added successfully");
window.location.replace("../podcasts-detail.php");
</script>
<?php
}
else{
?>
<script>
alert("Failed to add podcast");
window.location.replace("../podcasts-add.php");
</script>
<?php
}
}
?>