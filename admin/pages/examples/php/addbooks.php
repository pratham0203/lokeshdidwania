<?php
include 'connection.php';
if(isset($_POST['submit'])){
$book_name = $_POST['bkname'];
$book_link = $_POST['bklink'];
$book_cover = $_POST['cover'];
$book_desc = $_POST['desc'];
$price = $_POST['price'];
$isVisible = $_POST['visible'];




$sql_query = "INSERT INTO books(Book_Name, Book_Link, Book_Cover, Book_Description, Price, Visible)
VALUES ('$book_name', '$book_link', '$book_cover', '$book_desc', '$price', '$isVisible')";

$ins = mysqli_query($conn,$sql_query);

if($ins){
?>

<script>
alert("Book added successfully");
window.location.replace("../books-add.html");
</script>
<?php
}
else{
?>
<script>
alert("Failed to add book");
window.location.replace("../books-add.html");
</script>
<?php
}
}
?>