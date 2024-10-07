
<!-- By Eihab Adel Shokry -->


<?php require 'inc/header.php'; ?> 
<?php require 'inc/validation.php'; ?> 
<?php require 'inc/db_conn.php'; ?>


    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>


<?php

        if(isset($_POST['update']))
        {
            $name =     sanString($_POST['name']);
            $email =    sanEmail($_POST['email']);

            if(requireInputs($name) &&  requireInputs($email)  )
            {
                if(minLen($name,3))
                {
                    if(validate($email))
                    {
                        $id = $_POST['id'];
                        if($password)
                        {
                            $password = sanString($_POST['password']);
                            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

                            $sql = "UPDATE `users` SET  `name`='$name' ,`email`='$email',`password`='$hashed_password' 
                            WHERE `id`='$id' ";

                        }   
                        else 
                        {
                            $sql = "UPDATE `users` SET  `name`='$name' ,`email`='$email'  
                            WHERE `id`='$id' ";
                        }
 // By Eihab Adel Shokry

                        $result = mysqli_query($conn,$sql);
 // By Eihab Adel Shokry

                        if($result)
                        {
                            $success_message = "Updated Successfully ";
                            header("refresh:3;url=index.php");
                        }
                    }
                    else 
                    {
                        $error_message = "Please Type Valid Email !";
                    }
                }
                else 
                {
                    $error_message = "Name Must Be Grater Than 3 Chars / Password Must Be Less Than 20 Chars";
                }
            }
            else 
            {
                $error_message =  "Please Fill All  Fields !";
            }
        }
    require 'inc/message.php'; 
 // By Eihab Adel Shokry


?>


  


<?php  include('inc/footer.php'); ?>
