
<!-- By Eihab Adel Shokry -->


<?php require 'inc/header.php'; ?> 

<?php  
 // By Eihab Adel Shokry
    
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {

        header("location: index.php");
        exit();
    }

    
    $id = $_GET['id'];
    
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    
    $check = mysqli_num_rows($sql);

    if($check == 0) {
        header("location: index.php");
        exit();
    }

    $sql2 = "DELETE FROM `users` WHERE id='$id' ";
    mysqli_query($conn, $sql2);

    $success_message  = "User Deleted Success";
    header("refresh:3; url=index.php");


    require 'inc/message.php'; 
 // By Eihab Adel Shokry
?>
