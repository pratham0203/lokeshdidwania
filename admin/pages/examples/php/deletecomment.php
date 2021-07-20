<?php 
include 'connection.php';
$id = $_GET['id'];

$delete_query = "delete from blog_comments where Comment_ID = '$id'";

$del = mysqli_query($conn,$delete_query);

if($del){
    ?>

<script>
alert("Comment deleted successfully");
window.location.replace("../blogs-detail.php");
</script>
<?php
    }
    else{
    ?>
<script>
alert("Failed to delete Comment");
window.location.replace("../blogs-detail.php");
</script>
<?php
    }

    ?>