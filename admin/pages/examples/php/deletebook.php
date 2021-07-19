<?php 
include 'connection.php';
$id = $_GET['id'];

$delete_query = "delete from books where Book_ID = '$id'";

$del = mysqli_query($conn,$delete_query);

if($del){
    ?>

<script>
alert("Book deleted successfully");
window.location.replace("../books-detail.php");
</script>
<?php
    }
    else{
    ?>
<script>
alert("Failed to delete book");
window.location.replace("../books-detail.php");
</script>
<?php
    }

    ?>