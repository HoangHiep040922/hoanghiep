<?php include ('admin/login-check.php');

$sql = "SELECT * FROM admin";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

$full_name = $row['full_name'];
?>
<title> Quản Lý </title>
<div class="container-fluid">
    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="col-sm-2">
            <img class="d-inline-block align-center" src="/AdamKhanh/images/logo.png" style="width:220px; height:100px;" ><br><br>
      
                    <img class="rounded-circle" src="/AdamKhanh/images/icon.png" alt="Cinque Terre" style="width:40px; height:40px">&nbsp&nbsp
                    
                    <a><strong>
                        <?php if(isset($_SESSION['name']))
                        {
                            echo $_SESSION['name'];
                            
                        }  ?></strong></a><br><br>
                        <a><strong>Username: 
                        <?php if(isset($_SESSION['user']))
                        {
                            echo $_SESSION['user'];
                            
                        }  ?></strong></a>
                    <br><br>
                    <a href="admin.php?admin=logout" class="btn btn-danger">Đăng Xuất</a><hr>
                    <h3 class="mt-4">Quản Lý</h3>
                    <p>Tất cả danh sách về sản phẩm và tài khoản</p>

                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }

                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }

                        if(isset($_SESSION['edit']))
                        {
                            echo $_SESSION['edit'];
                            unset($_SESSION['edit']);
                        }

                        if(isset($_SESSION['user-not-found']))
                        {
                            echo $_SESSION['user-not-found'];
                            unset($_SESSION['user-not-found']);
                        }
                        
                        if(isset($_SESSION['pwd-not-match']))
                        {
                            echo $_SESSION['pwd-not-match'];
                            unset($_SESSION['pwd-not-match']);
                        }

                        if(isset($_SESSION['change-pwd']))
                        {
                            echo $_SESSION['change-pwd'];
                            unset($_SESSION['change-pwd']);
                        }

                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        if(isset($_SESSION['add-brand']))
                        {
                            echo $_SESSION['add-brand'];
                            unset($_SESSION['add-brand']);
                        }
                        if(isset($_SESSION['delete-brand']))
                        {
                            echo $_SESSION['delete-brand'];
                            unset($_SESSION['delete-brand']);
                        }
                        if(isset($_SESSION['edit-brand']))
                        {
                            echo $_SESSION['edit-brand'];
                            unset($_SESSION['edit-brand']);
                        }
                        if(isset($_SESSION['add-product']))
                        {
                            echo $_SESSION['add-product'];
                            unset($_SESSION['add-product']);
                        }
                        if(isset($_SESSION['delete-product']))
                        {
                            echo $_SESSION['delete-product'];
                            unset($_SESSION['delete-product']);
                        }
                        if(isset($_SESSION['edit-product']))
                        {
                            echo $_SESSION['edit-product'];
                            unset($_SESSION['edit-product']);
                        }
                        if(isset($_SESSION['delete-comment']))
                        {
                            echo $_SESSION['delete-comment'];
                            unset($_SESSION['delete-comment']);
                        }
                        if(isset($_SESSION['edit-post']))
                        {
                            echo $_SESSION['edit-post'];
                            unset($_SESSION['edit-post']);
                        }
                        if(isset($_SESSION['delete-post']))
                        {
                            echo $_SESSION['delete-post'];
                            unset($_SESSION['delete-post']);
                        }
                        if(isset($_SESSION['add-post']))
                        {
                            echo $_SESSION['add-post'];
                            unset($_SESSION['add-post']);
                        }
                    ?>
                    <hr>
                    
                    <ul class="nav flex-column">
                    <div class="tab">
                        <li class="nav-item">
                        <button class="tablinks">Sản Phẩm</button>
                        </li>
                        <li class="nav-item">
                        <button class="tablinks">Thể Loại</button>
                        </li>
                        <li class="nav-item">
                        <button class="tablinks">Tài Khoản</button>
                        </li>
                        <li class="nav-item">
                        <button class="tablinks">Đánh Giá</button>
                        </li>
                        <li class="nav-item">
                        <button class="tablinks">Bài Post</button>
                        </li>
                    </div>
                    </ul>
            </td>
            <td class="col-sm-10">
            
            <div id="Sản Phẩm" class="tabcontent">
                <?php include ('admin/category.php'); ?>
            </div>

            <div id="Thể Loại" class="tabcontent">
                <?php include ('admin/brandcategory.php'); ?>
            </div>

            <div id="Tài Khoản" class="tabcontent">
                <?php include ('admin/manage-admin.php'); ?>
            </div>
            <div id="Đánh Giá" class="tabcontent">
                <?php include ('admin/comment.php'); ?>
            </div>
            <div id="Bài Post" class="tabcontent">
                <?php include ('admin/post.php'); ?>
            </div>

            </td>
        </tr>
        </tbody>
    </table>




<script type="text/javascript">
    var buttons = document.getElementsByClassName('tablinks');
    var contents = document.getElementsByClassName('tabcontent');
    function showContent(id){
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }
        var content = document.getElementById(id);
        content.style.display = 'block';
    }
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(){
            var id = this.textContent;
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("active");
            }
            this.className += " active";
            showContent(id);
        });
    }
    showContent('PHP');
</script>
<style>

/* định dạng thẻ div chưa các button tab */
div.tab {
    overflow: hidden; 
    background-color: #f1f1f1; 
}

/* định dạng các button tab */
div.tab button {
    background-color: inherit; 
    
    width: 250px;
    float: center;
    border: none;
    border-radius: 8px;
    outline: none;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* đổi màu khi một button tab được hover */
div.tab button:hover {
    background-color: #ddd;
}

/* đổi màu nền cho tab đang được hiển thị nội dung */
div.tab button.active {
    background-color: #00b3b3;
    color: white;
    box-shadow: 5px 5px 5px 5px #DCDCDC;
}


</style>