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


    $query = " INSERT INTO posts( post_title, post_content, post_img, post_category,post_author,post_date,post_comment_count,post_summery, post_tag ,post_status) VALUES( '$post_title', '$post_content', '$post_img',$post_category, 'Admin' ,now(),3, '$post_summery' , ' $post_tag', '$post_status' )  ";

    if (mysqli_query($this->conn, $query)) {
      move_uploaded_file($post_img_tmp, '../upload/'.$post_img);
      return "post Upload";
    }
  }
}
