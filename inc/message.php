

<!-- error message -->
<?php if(isset($error_message) && $error_message != '') {
?>
<div class="col-sm-6 offset-sm-3 p-1 mt-2">
    <h1 class="alert alert-danger text-center show fs-4"><?php echo $error_message ;?></h1>
</div>
<?php } ?>


<!-- success message -->
<?php if(isset($success_message) && $success_message != '') { ?>
<div class="col-sm-6 offset-sm-3 p-1 mt-2">
    <h1 class="alert alert-success text-center fs-4"><?php echo $success_message ;?></h1>
</div>
<?php } ?>

