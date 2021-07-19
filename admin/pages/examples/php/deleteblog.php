<?php 
include 'connection.php';
$id = $_GET['id'];

$delete_query = "delete from blogs where Blog_ID = '$id'";

$del = mysqli_query($conn,$delete_query);

if($del){
    ?>

<script>
alert("Blog deleted successfully");
window.location.replace("../blogs-detail.php");
</script>
<?php
    }
    else{
    ?>
<script>
alert("Failed to delete blog");
window.location.replace("../blogs-detail.php");
</script>
<?php
    }

    ?>