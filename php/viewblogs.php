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
    $select_query2 = " select * from blog_comments where Blog_ID='$id'";

    $query2 = mysqli_query($conn, $select_query2);
    while ($res2 = mysqli_fetch_array($query2)) {
        $cid = $res['Comment_ID'];
        $bid = $res['Blog_ID'];
        $name = $res['Name'];
        $email = $res['Email'];
        $comment = $res['Comment'];
        $date = $res['Date'];
        $time = $res['Time'];
 ?>


<!-- HTML Code -->


<?php
}
}

?>