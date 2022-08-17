<?php


class adminBlog
{


  private $conn;

  public function __construct()
  {

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'blogproject';

    $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$this->conn) {
      die("Database connect error");
    }
  }


  public function admin_login($data)
  {

    $admin_email = $data['admin_email'];
    $admin_pass = md5(($data['admin_pass']));

    $query = " SELECT * FROM admin_info WHERE admin_email = '$admin_email' && admin_pass = '$admin_pass' ";

    if (mysqli_query($this->conn, $query)) {


      $admin_info = mysqli_query($this->conn, $query);


      if ($admin_info) {
        header("location: dashboard.php");

        $admin_data = mysqli_fetch_assoc($admin_info);

        SESSION_start();

        $_SESSION['adminID'] = $admin_data['id'];
        $_SESSION['adminName'] = $admin_data['admin_name'];
      }
    }
  }


  public function admin_logout()
  {


    unset($_SESSION['adminID']);
    unset($_SESSION['adminName']);

    header('location:index.php');
  }

  public function add_category($data)
  {

    $cat_name = $data['cat_name'];
    $cat_des = $data['cat_des'];

    $query = " INSERT INTO category (cat_name , cat_des) VALUE ( '$cat_name' , '$cat_des' )";

    if (mysqli_query($this->conn, $query)) {
      return "categories added successfully ";
    }
  }

  public function display_category()
  {

    $query = " SELECT * FROM category";
    if (mysqli_query($this->conn, $query)) {
      $category = mysqli_query($this->conn, $query);
      return $category;
    }
  }

  public function delete_category($id)
  {

    $query = "DELETE FROM category WHERE id=$id ";
    if (mysqli_query($this->conn, $query)) {
      return "deleted!!!!";
    }
  }

  public function edit_category($data)
  {


    $cat_id =  $data['u_cat_id'];
    $cat_name = $data['u_cat_name'];
    $cat_des = $data['u_cat_des'];

    $query = "UPDATE  category SET cat_name = ' $cat_name' , 
         cat_des = '$cat_des' WHERE id = $cat_id ";


    if (mysqli_query($this->conn, $query)) {
      return "update 100/100";
    }
  }

  public function add_post($data)
  {

    $post_title = $data['post_title'];
    $post_content = $data['post_content'];
    $post_img = $_FILES['post_img']['name'];
    $post_img_tmp = $_FILES['post_img']['tmp_name'];
    $post_category = $data['post_category'];
    $post_summery = $data['post_summery'];
    $post_tag = $data['post_tag'];
    $post_status = $data['post_status'];


    $query = " INSERT INTO posts( post_title, post_content, post_img, post_category,post_author,post_date,post_comment_count,post_summery, post_tag ,post_status) VALUES( '$post_title', '$post_content', '$post_img',$post_category,'Admin' ,now(),3, '$post_summery' , ' $post_tag', '$post_status' )  ";

    if (mysqli_query($this->conn, $query)) {
      move_uploaded_file($post_img_tmp, '../upload/' . $post_img);
      return "post Upload";
    }
  }

  public function display_post()
  {

    $query = " SELECT * FROM post_with_category ";
    if (mysqli_query($this->conn, $query)) {

      $posts = mysqli_query($this->conn, $query);
      return $posts;
    }
  }

  public function display_post_public()
  {

    $query = " SELECT * FROM post_with_category WHERE post_status == 1 ";
    if (mysqli_query($this->conn, $query)) {

      $posts = mysqli_query($this->conn, $query);
      return $posts;
    }
  }

  public function update_category($data)
  {

    $post_id = $data['edit_cat_id'];
    $post_title = $data['update_cat_name'];
    $post_content = $data['update_cat_des'];


    $query = " UPDATE category SET cat_name = '$post_title' , cat_des = '$post_content ' WHERE id = $post_id ";

    if (mysqli_query($this->conn, $query)) {
      return "Category update";
    }
  }

  public function get_category_info($data)
  {


    $query = " SELECT * FROM category where id = $data ";
    if (mysqli_query($this->conn, $query)) {
      $post_info = mysqli_query($this->conn, $query);
      $post = mysqli_fetch_assoc($post_info);
      return $post;
    }
  }



  public function edit_img($data)
  {

    $id = $data['edit_img_id'];
    $img_name = $_FILES['change_img']['name'];
    $tmp_name = $_FILES['change_img']['tmp_name'];


    $query = "UPDATE posts SET post_img = '$img_name' WHERE post_id = $id";

    if (mysqli_query($this->conn, $query)) {
      move_uploaded_file($tmp_name, '../upload/' . $img_name);
      return "Thumbnail Update successfully";
    }
  }

  public function get_post_info($id)
  {

    $query = " SELECT * FROM post_with_category where post_id = $id ";
    if (mysqli_query($this->conn, $query)) {
      $post_info = mysqli_query($this->conn, $query);
      $post = mysqli_fetch_assoc($post_info);
      return $post;
    }
  }

  public function update_post($data)
  {

    $post_id = $data['edit_post_id'];
    $post_title = $data['change_title'];
    $post_content = $data['change_content'];


    $query = " UPDATE posts SET post_title = '$post_title' , post_content = '$post_content ' WHERE post_id = $post_id ";

    if (mysqli_query($this->conn, $query)) {
      return "post update";
    }
  }
}
