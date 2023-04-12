<?php
    require_once 'config/connet.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="icon" href="/AdamKhanh/images/icon.png" type="images/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body  style="background-color:#eeeeee;">
<div id="preloader"></div>

<style>
#preloader{
    background: #fbfbfb url(images/loading.gif) no-repeat center center;
    background-size: 30%;
    height: 100vh;
    width: 100%;
    position: fixed;
    z-index: 100;
    
    
}

</style>
<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
        loader.style.display = "none";

    });

</script>
<?php 
    if(isset($_GET['trang'])){
        switch($_GET['trang']){

            case 'danh-muc':
                require_once 'brand.php';
                break;

            case 'san-pham':
                require_once 'details.php';
                break;

            case 'danh-gia':
                require_once 'cmt.php';
                break;
            case 'test':
                require_once 'test.php';
                break;

            case 'test1':
                require_once 'test1.php';
                break;

            default:
                require_once 'trangchu.php';
                break;
        }
    }else{
        require_once 'trangchu.php';
    }
?>




</body>

</html>
