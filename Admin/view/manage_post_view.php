<?php

$posts = $obj->display_post();

if (isset($_GET['status'])) {
  if ($_GET['status'] == 'deletepost') {
    $delete_id = $_GET['id'];
    $msg =  $obj->delete_post($delete_id);
  }
}




?>





<h2> Manage Post </h2>


<div class="table-responsive">

  <table class="table">

    <thead>

      <th>ID</th>
      <th> Title </th>
      <th> Content </th>
      <th> Thumbnails </th>
      <th> Author </th>
      <th> Date </th>
      <th> Category </th>
      <th> Status </th>
      <th>

        Action


      </th>



    </thead>

    <tbody <?php while ($post_data = mysqli_fetch_assoc($posts)) { ?>>
    

      <tr>

        <td> <?php echo $post_data['post_id']; ?> </td>
        <td> <?php echo $post_data['post_title']; ?> </td>
        <td> <?php echo $post_data['post_content']; ?> </td>

        <td> <img height="50px" src="../upload/<?php echo $post_data['post_img']  ?> ">
          <br>
          <a href="edit_img.php?status=editimg&&id=<?php echo $post_data['post_id']; ?>"> Change </a>


        </td>

        <td> <?php echo $post_data['post_author']; ?> </td>
        <td> <?php echo $post_data['post_date']; ?> </td>
        <td> <?php echo $post_data['cat_name']; ?> </td>
        <td> <?php if ($post_data['post_status'] == 1) {
                echo "Published";
              } else {
                echo "Unpublished";
              }
              ?> </td>

        <td>

          <a class="btn btn-primary" href="edit_post.php?status=editpost&&id=<?php echo $post_data['post_id']; ?>"> Edit </a>
          <a class="btn btn-danger" href="?status=deletepost&&id=<?php echo $post_data['post_id']; ?>"> Delete </a>



        </td>



      </tr>

    <?php     } ?>

    </tbody>




  </table>



</div>