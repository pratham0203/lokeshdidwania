<?php
include 'connection.php';
if(isset($_POST['submit'])){
$book_name = $_POST['bkname'];
$book_link = $_POST['bklink'];
$book_cover = $_POST['cover'];
$book_desc = $_POST['desc'];
$price = $_POST['price'];
$isVisible = $_POST['visible'];

$select_query = "SELECT count(Book_ID) from books"; 

$query = mysqli_query($conn, $select_query);

$check = mysqli_fetch_array($query);

if($check==NULL){
    $book_id = 1;
}
else {
    $book_id = $check['count(Book_ID)'] + 1;   
}

$sql_query = "INSERT INTO books(Book_ID, Book_Name, Book_Link, Book_Cover, Book_Description, Price, Visible)
VALUES ('$book_id', '$book_name', '$book_link', '$book_cover', '$book_desc', '$price', '$isVisible')";

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