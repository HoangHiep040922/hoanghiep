<title>AdamKhanh</title>
<link rel="icon" href="/AdamKhanh/images/icon.png" type="images/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
    body{
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
    }
    </style><script type=”text/JavaScript”>
    function killCopy(e){
    return false
    }
    function reEnable(){
    return true
    }
    document.onselectstart=new Function (“return false”)
    if (window.sidebar){
    document.onmousedown=killCopy
    document.onclick=reEnable
    }
    </script>
    <script language="JavaScript">
    window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
            //document.onkeydown = function(e) {
            // "I" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
                disabledEvent(e);
            }
            // "F12" key
            if (event.keyCode == 123) {
                disabledEvent(e);
            }
        }, false);
 
        function disabledEvent(e) {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        }
    };
</script>
<?php 
require_once 'config/connet.php';
include ('header.php');
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['tim-kiem'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "xin hãy nhập gì vào trong đó";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from products where title like '%$search%'";

                // Thực thi câu truy vấn
                $sql = mysqli_query($conn, $query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "<br>$num kết quả được tìm thấy với từ: <strong>$search</strong><br><br>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    
                    while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <table class="table table-borderless">
                            <tbody>
                            <tr>
                            <td style="width: 500px;">
                            <div class=" zoom">
                            <div class="card " style="width: 300px;">
                            <a class="rounded" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>">
                                <img height="350px" src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="card-img-top"></a>
                            <div class="card-body">
                            <div class="d-flex justify-content-center">
                            <a href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #00664d" class="text-center"><?php echo $row['title']; ?></a>
                            </div>
                                <div class="d-flex justify-content-center">
                                            <div class="small-ratings">
                                                <i class="bi bi-star-fill rating-color"></i>
                                                <i class="bi bi-star-fill rating-color"></i>
                                                <i class="bi bi-star-fill rating-color"></i>
                                                <i class="bi bi-star-fill rating-color"></i>
                                                <i class="bi bi-star-fill rating-color"></i>
                                            </div>
                                    </div>
                                <div class="d-flex justify-content-between">
                                    <span class="h5 mt-auto" style="font-size: 17px;margin-right: auto;margin-left: auto;margin-top: auto;margin-bottom: auto; font-weight: 500; color: red"><?php echo $row['price']; ?>đ</span>
                                </div>
                            </div>
                            </div></td>
                            <td><h4>Mô tả sản phẩm</h4><br>
                            <pre style="width: 1100px; height: auto"><?php echo $row['description']; ?></pre>
                            </td>
                            </tr></tbody></table>   <br><br><br><br><br><br><br>
                    <?php } 
                    echo '</table>';
                } 
                else {
                    echo "<br>Không tìm thấy sản phẩm nào!!!";
                }
            }
        }
        ?>   

<br><br><br>
<br><br><br><br><br><br>
<style>
.zoom {
  padding: 10px;
  background-color: none;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}


.rating-color{
    color:#fbc634;
}

.small-ratings{
  color:#cecece;   
}







</style>                
<br><br><br><br><br><br><br><br><br>  


<?php
// include footer.php file
include ('footer.php');
?>