<?php

$cat_datas =  $obj->display_category();
   
   if(isset($_GET['status'])) {
    if($_GET['status']=='delete') {
        $delete_id = $_GET['id'] ;
         $msg =  $obj -> delete_category($delete_id) ; 
    }
   }
 

?>



<h2> Manage Category </h2>

   <?php if(isset($msg)) {echo $msg ; }  ?>

<table class="table">

    <thead>

        <tr>

            <th> ID </th>
            <th> Category Name </th>
            <th> Category Drscription </th>
            <th> Action </th>

        </tr>

    </thead>


    <tbody>
        <?php while ($cat_data = mysqli_fetch_assoc($cat_datas)) {  ?>
            <tr>

                <td> <?php echo  $cat_data['id'] ?> </td>
                <td> <?php echo  $cat_data['cat_name'] ?> </td>
                <td><?php echo  $cat_data['cat_des'] ?> </td>
                <td>

                    <a href="edit_category.php?status=editcategory&&id=<?php echo $cat_data['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="?status=delete&&id=<?php echo  $cat_data['id'] ?>" class="btn btn-danger">Deleted</a>

                </td>


            </tr>

        <?php     }   ?>

      


    </tbody>

</table>