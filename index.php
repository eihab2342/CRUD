<?php include ('inc/header.php')?> 
<?php include ('inc/db_conn.php');?>

<?php 

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

?>


<h1 class="text-center col-12 bg-primary py-3 my-3 text-white">All Users</h1>
<div
    class="table-responsive mt-5"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr class="text-center">
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Edit </th>
                <th scope="col">Delete </th>
            </tr>
        </thead>
        <tbody class="mb-3">


        <?php
            if(mysqli_num_rows($result) > 0) : ?>
                <?php 
                    while($row = mysqli_fetch_assoc($result)) :?>
            <tr class="p-4 text-center">
                <td class="pt-3"> <?php echo $row['id']; ?></td>
                <td> 
                    <?php if(!empty($row['image_path'])) : ?>
                        <img src="<?php echo $row['image_path']; ?> " alt="User Image" width="50" height="50">
                        <?php else : ?>
                            <P>No image</P>
                        <?php endif; ?>
                </td>
                <td class="pt-3"> <?php echo $row['name']; ?></td> 
                <td class="pt-3"> <?php echo $row['email']; ?></td> 
                <td class="pt-3"> <?php echo $row['created_at']; ?></td> 
                
                <td>
                    <a class="btn btn-info" href="edit.php?id=<?php echo $row['id']; ?>"> <ion-icon name="create-outline"></ion-icon></a>
                </td>
                <td>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"><ion-icon name="close-outline"></ion-icon> </a>
                </td>
                    
            </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>













<?php require 'inc/footer.php' ?>