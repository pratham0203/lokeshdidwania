<?php
include 'connection.php';
if(isset($_POST['submit'])){
$book_id = $_POST['bkid'];
$book_name = $_POST['bkname'];
$book_cover = $_POST['cover'];
$book_desc = $_POST['desc'];
$price = $_POST['price'];
$isVisible = $_POST['visible'];

$sql_query = "INSERT INTO books(Book_ID, Book_Name, Book_Cover, Book_Description, Price, Visible)
VALUES ('$book_id', '$book_name', '$book_cover', '$book_desc', '$price', '$isVisible')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Book added successfully");
</script>
<?php
}
else{
?>
<script>
alert("Failed to add book");
</script>
<?php
}
}
?>