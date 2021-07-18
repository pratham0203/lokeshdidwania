<?php

include 'connection.php';

$select_query = " select * from books";

$query = mysqli_query($conn, $select_query);

while ($res = mysqli_fetch_array($query)) {
    $id = $res['Book_ID'];
    $name = $res['Book_Name'];
    $link = $res['Book_Link'];
    $image = $res['Book_Cover'];
    $desc = $res['Book_Description'];
    $price = $res['Price'];
    $visible = $res['Visible'];
?>

<!-- HTML Code -->

<?php

}

?>