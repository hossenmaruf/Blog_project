<?php

if (isset($_POST['add_cat'])) {
  $return_msg =  $obj->add_category($_POST);
}

  
//    if (isset($_GET['status'])) {
//     if ($_GET['status'] = 'edit') {
//         $id = $_GET['id'];

//        $obj -> edit_category($id) ;
//     }
// }



?>




<h2> Add Category page </h2>


<?php if (isset($return_msg)) {
  echo $return_msg;
} ?>

<form action="" method="POST">


  <div class="form-group">
    <label class="mb-1" for="cat_name">Add Category</label>
    <input name="cat_name" class="form-control py-4" id="cat_name" type="text" />
  </div>

  <div class="form-group">
    <label class="mb-1" for="cat_des">Category Description</label>
    <input name="cat_des" class="form-control py-4" id="cat_des" type="text" />
  </div>

  <input type="submit" name="add_cat" value="Add Category " class="btn btn-primary">


</form>