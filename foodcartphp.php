<?php
    session_start();
    if(isset($_POST["delete"])){
        header("location:foodmenu.php?error=back");
        exit();
    }
    elseif(isset($_POST["back"])){
        header("location:foodmenu.php?error=back");
        exit();
    }
    else {
        header("location:foodcart.php?error=error");
        exit();
    }
?>