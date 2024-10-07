<?php require 'inc/header.php'; ?> 
<?php require 'inc/validation.php'; ?> 
<?php require 'inc/message.php'; ?> 
<?php require 'inc/db_conn.php'; ?>

<?php 

    if(isset($_POST['submit']) /* || $_SERVER['REQUEST_METHOD'] == "POST" */) {
        $name = SanString($_POST['name']);
        $email = sanEmail($_POST['email']);
        $password = SanString($_POST['password']);
        $file = $_FILES['image'];

        if(requireInputs($name) && requireInputs($password)) {

            if(minLen($name, 3) && minLen($password, 6) && maxLen($password, 18)) {

                if(validate($email)) {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);

                        $f_name = $file['name'];
                        $f_type = $file['type'];
                        $f_error = $file['error'];
                        $f_size = $file['size'];
                        $f_tmp_name = $file['tmp_name'];

                        if($f_name != '') {
                            $ext = pathinfo($f_name);  // contains image name and ext

                            $org_name = $ext['filename'];
                            $org_ext = strtolower($ext['extension']);

                            $allowed = array("png", "jpg", "jpeg", "pdf");
                            if(in_array($org_ext , $allowed)) {

                                if($f_size <= 500000) {

                                    $new_name = uniqid('', true) . $org_ext;
                                    $destination = "uploads/" . $new_name;
                                    if(move_uploaded_file($f_tmp_name ,$destination)) {
                                        $image_path = $destination;
                                    } else {
                                        $error_message = "Failed to upload image.";
                                        }

                                } else {
                                    $error_message = "Image is very large";
                                }

                            } else {
                                $error_message = "Invalid file type. Only PNG, JPG, JPEG, and PDF are allowed.";
                            }

                        } else {
                            $error_message = "Please upload an image";
                        }

                        if(empty($error_message)) {
                            $sql = "INSERT INTO users (`name`, `email`, `password` ,`image_path` ) VALUES ('$name', '$email', '$hash_password', '$image_path' )";
                            $result = mysqli_query($conn, $sql);
                            if($result) {
                                $success_message = "Added Successfully!";
                            } else {
                                $error_message = "Error adding user to the database.";
                            }
                        }
                } else {
                    $error_message = "Invalid email format.";
                }
            } else {
                $error_message = "Name must be greater than 2 ch and password between 6 and 20";
                }
                } else {
        $error_message = "Please fill all the required fields.";
    }
}
            

        require 'inc/message.php';

?>





    <div class="col-md-6 offset-md-3">
    <h1 class="text-center col-12 bg-primary py-3 text-white my-3 border">Add New User</h1>

    <form class="my-3 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload user Image</label>
            <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary m-2 p-2 fs-6">Submit</button>
        </div>
    </form>
    </div>