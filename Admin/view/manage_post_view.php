<?php   

  $posts = $obj -> display_post() ; 



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
   
      <tbody <?php while($post_data = mysqli_fetch_assoc($posts)) { ?>    >

        <tr>  
            
           <td> <?php  echo $post_data['post_id'] ; ?> </td>
           <td> <?php  echo $post_data['post_title'] ; ?>   </td>
           <td> <?php  echo $post_data['post_content'] ; ?>   </td>

           <td> <img height="50px" src="../upload/<?php echo $post_data['post_img']  ?> " >      </td>

           <td> <?php  echo $post_data['post_author'] ; ?>   </td>
           <td> <?php  echo $post_data['post_date'] ; ?>   </td>
           <td> <?php  echo $post_data['cat_name'] ; ?>   </td>
           <td> <?php  echo $post_data['post_status'] ; ?>   </td>
           <td>  
    
              <a class="btn btn-primary"   href="#"> Edit  </a>
              <a class="btn btn-danger"   href="#"> Delete  </a>



           </td>
          
        
        
        </tr> 

        <?php     } ?>

      </tbody>




  </table>



</div>