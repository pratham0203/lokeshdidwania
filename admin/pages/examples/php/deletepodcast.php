<?php 
include 'connection.php';
$id = $_GET['id'];

$delete_query = "delete from podcasts where Podcast_ID = '$id'";

$del = mysqli_query($conn,$delete_query);

if($del){
    ?>

<script>
alert("Podcast deleted successfully");
window.location.replace("../podcasts-detail.php");
</script>
<?php
    }
    else{
    ?>
<script>
alert("Failed to delete podcast");
window.location.replace("../podcasts-detail.php");
</script>
<?php
    }