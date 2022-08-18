<?php

   if(isset($_GET['status'])) {
        if($_GET['status'] == 'editpost' ) {
            $id = $_GET['id'] ;
          $post_data =  $obj -> get_post_info($id) ;
        }
   }
   
     if(isset($_POST['update_post'])) {
     
       $msg =   $obj -> update_post($_POST) ;

     }


?>


<div class="shadow m-5 p-5">

    <?php  if (isset($msg)) {
        echo $msg;
    } ?>

    <form action="" method="POST"  class="form">


        <input type="hidden" name="edit_post_id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label class="mb-1" for="change_title">Change Title</label><br>
            <input value=" <?php echo $post_data['post_title']?>" class="form-control" name="change_title" class="py-4" id="change_title" type="text" />
        </div>

        <div class="form-group">
        <label  class="mb-1" for="Change_Content">Change Content</label>



        <input class="form-control" name="change_content" id="change_content" 
          value="<?php echo $post_data['post_content'] ; ?>" ></input>

       <?php  var_dump($post_data) ;    ?>


    </div>

        <input type="submit" value="Update post" name="update_post" class="btn btn-primary">



    </form>


</div>