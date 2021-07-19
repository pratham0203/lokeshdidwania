<?php
include 'connection.php';
if(isset($_POST['submit'])){
$book_id = $_POST['bkid'];
$book_name = $_POST['bkname'];
$book_link = $_POST['bklink'];
$book_cover = $_POST['cover'];
$book_desc = $_POST['desc'];
$price = $_POST['price'];
$isVisible = $_POST['visible'];

$id = $_GET['id'];

$sql_query = "UPDATE books
SET Book_Name = '$book_name', Book_Link = '$book_link', Book_Cover = '$book_cover', Book_Description = '$book_desc', Price = '$price', Visible = '$isVisible'
WHERE Book_ID = '$id'";

$upd = mysqli_query($conn,$sql_query); 

if($upd){
?>

<script>
alert("Book updated successfully");
window.location.replace("../books-detail.php");
</script>
<?php
}
else{
?>
<script>
alert("Failed to update book");
window.location.replace("../books-detail.php");
</script>
<?php
}
}
?>