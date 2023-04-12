<?php 
    if(isset($_POST['cmtbtn']))
    {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $cmtName = mysqli_real_escape_string($conn, $_POST['cmtName']);
        $cmtEmail = mysqli_real_escape_string($conn, $_POST['cmtEmail']);
        $cmtMSG = mysqli_real_escape_string($conn, $_POST['cmtMSG']);

        $query = mysqli_query($conn, "INSERT INTO comment (`comment`, `sender`, `email` , `product_id` ) VALUES ('$cmtMSG','$cmtName', '$cmtEmail','$id')");
        if($query)
        {
            $_SESSION['errorMSG'] = "<font class='text-black'>Bình luận đã được gửi.</font>";
            header("location: index.php?trang=san-pham&id={$id}#danh-gia");
        }
        else
        {
            $_SESSION['errorMSG'] = "<font class='text-black'>Không thể gửi bình luận.</font>";
            header("location: index.php?trang=san-pham&id={$id}#danh-gia");
        }
    }
?>