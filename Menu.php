<p><h4>Tools</h4></p>

<?php
session_start();
    if (isset($_SESSION['flag']) and isset($_SESSION['current_user']) and ($_SESSION['current_user'] == 'admin')){
        echo'<p><a href="index.php?content_page=page1action">Edit Customer Account Information</a><br/></p>';
        echo'<p><a href="index.php?content_page=Createbag">Create Bag</a><br/></p>';
        echo'<p><a href="index.php?content_page=Createbagcat">Create Bag Category</a><br/></p>';
        echo'<p><a href="index.php?content_page=orders">Current Orders</a><br/></p>';
    }
    else if (isset($_SESSION['flag']) and isset($_SESSION['current_user']) and $_SESSION['current_user'] != 'admin'){
        echo'<p><a href="index.php?content_page=orders">Current Orders</a><br/></p>';
    }
    else {
        echo'<p>Please <a href="index.php?content_page=Login" style="color:#cf942d;">Log in</a> to access member features.<br/></p>';
    }
?>