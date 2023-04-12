<?php
    require_once 'config/connet.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>


    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />

    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />

    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
    <link rel="icon" href="/AdamKhanh/images/icon.png" type="images/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:#eeeeee;">
<?php 
    if(isset($_GET['admin'])){
        switch($_GET['admin']){
            case 'category':
                require_once 'admin/category.php';
                break;
            
            case 'brand':
                require_once 'admin/brandcategory.php';
                break;

            case 'add-brand':
                require_once 'admin/add-brand.php';
                break;

            case 'edit-brand':
                require_once 'admin/edit-brand.php';
                break;

            case 'delete-brand':
                require_once 'admin/delete-brand.php';
                break;

            case 'add':
                require_once 'admin/add.php';
                break;
            
            case 'edit':
                require_once 'admin/edit.php';
                break;

            case 'delete':
                require_once 'admin/delete.php';
                break;

            case 'quan-ly':
                require_once 'admin/manage-admin.php';
                break;

            case 'add-admin':
                require_once 'admin/add-admin.php';
                break;

            case 'delete-admin':
                require_once 'admin/delete-admin.php';
                break;

            case 'edit-admin':
                require_once 'admin/edit-admin.php';
                break;

            case 'edit-password':
                require_once 'admin/edit-password.php';
                break;

            case 'login':
                require_once 'admin/login.php';
                break;

            case 'logout':
                require_once 'admin/logout.php';
                break;

            case 'index':
                require_once 'admin/index-admin.php';
                break;

            case 'comment':
                require_once 'admin/comment.php';
                break;
            case 'delete-comment':
                require_once 'admin/delete-comment.php';
                break;

            case 'post':
                require_once 'admin/post.php';
                break;
            case 'delete-post':
                require_once 'admin/delete-post.php';
                break;
            case 'edit-post':
                require_once 'admin/edit-post.php';
                break;
            case 'add-post':
                require_once 'admin/add-post.php';
                break;

                case 'test':
                    require_once 'admin/test.php';
                    break;


            default:
                require_once 'admin/index-admin.php';
                break;
        }
    }else{
        require_once 'admin/index-admin.php';
    }
?>




</body>
</html>
