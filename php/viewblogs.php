<?php

include 'connection.php';

$select_query = " select * from blogs";

$query = mysqli_query($conn, $select_query);

while ($res = mysqli_fetch_array($query)) {
    $id = $res['Blog_ID'];
    $title = $res['Blog_Title'];
    $content = $res['Blog_Content'];
    $image = $res['Blog_Image'];
    $author = $res['Blog_Author'];
    $date = $res['Date'];
    $visible = $res['Visible'];
?>

<!-- HTML Code -->

<?php

}

?>