<?php

if(isset($_GET['status'])) {
    if($_GET['status'] == 'editcategory' ) {
        $id = $_GET['id'] ;
      $post_data =  $obj -> get_category_info($id) ;
    }
}

   if(isset($_POST['update_cat'])) {
     
    $msg =   $obj -> update_category($_POST) ;

    }



?>



<div class="shadow m-5 p-5">


<form action="" method="POST">
   
   <?php if(isset($msg)) { echo $msg ;}    ?>

  <div class="form-group">
    <label class="mb-1" for="update_cat_name">Update Category Title</label>
    <input type="hidden" name="edit_cat_id" value=" <?php echo $post_data['id']   ; ?>">
    <input value=" <?php echo $post_data['cat_name']   ; ?>"   name="update_cat_name" class="form-control py-4" id="update_cat_name" type="text" />
  </div>

  <div class="form-group">
    <label class="mb-1" for="update_cat_des">Update Category Description</label>
    <input value=" <?php echo $post_data['cat_des']   ; ?>"    name="update_cat_des" class="form-control py-4" id="update_cat_des" type="text" />
  </div>

  <input type="submit" name="update_cat" value="Update Category " class="btn btn-primary">


</form>


</div>