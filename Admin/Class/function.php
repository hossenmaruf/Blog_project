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

    $query = " SELECT * FROM admin_info WHERE admin_email = '$admin_email' && admin_pass = '$admin_pass'   ";

    if (mysqli_query($this->conn, $query)) {

       
      $admin_info = mysqli_query($this->conn, $query);


      if ($admin_info) {
        header("location: dashboard.php");
         
          $admin_data = mysqli_fetch_assoc($admin_info) ;
           
           SESSION_start() ;

           $_SESSION['adminID'] = $admin_data['id'] ;
           $_SESSION['adminName'] = $admin_data['admin_name'] ;


      }
    }
  }
}
