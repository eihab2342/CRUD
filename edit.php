<!-- By Eihab Adel Shokry -->


<?php require 'inc/header.php'?> 
<?php    //require 'inc/db_conn.php'; ?>
<?php    require 'inc/validation.php'; ?>
<?php    require 'inc/message.php'; ?>
<?php include ('inc/db_conn.php');?>



<?php  
    
    // التحقق من وجود id في رابط الـ GET وأنه قيمة رقمية
    if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        // إعادة توجيه أو إظهار رسالة خطأ إذا لم يكن id موجودًا أو ليس رقمًا
        header("location: index.php");
        exit();
    }
 // By Eihab Adel Shokry

    $id = $_GET['id'];
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    
    $check = mysqli_num_rows($sql);
 // By Eihab Adel Shokry

    if($check == 0) {
        header("location: index.php");
        exit();
    }

    // تخزين البيانات في assocc array
    $user = mysqli_fetch_assoc($sql);
 // By Eihab Adel Shokry

?>

<div class="col-md-6 offset-md-3">
    <h1 class="text-center col-12 bg-primary py-3 text-white my-3 border">Edit Usser</h1>

    <form class="my-3 p-3 border" method="POST" action="update.php">
        <div class="form-group">
            <label for="exampleInputName1"> Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" value="<?php echo $user['name']; ?>">
            <input type="hidden" value="<?php echo $user['id']; ?>" name="id">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Psaaword</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $user['password']; ?>">
        </div>
        <div class="text-center">
            <button type="submit" name="update" class="btn btn-primary m-2 p-2 fs-6">Update</button>
        </div>
    </form>
</div>
