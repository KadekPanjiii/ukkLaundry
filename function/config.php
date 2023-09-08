<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "un";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

  class Login extends Connection{
    public function Loginkan(){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tb_user WHERE username = '$username' and password = '$password' ";
    $result = $this->conn->query($sql);

    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if($row['role'] == 'admin'){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = 'admin';
        header('Location: admin');
      } else if ($row['role'] == 'kasir') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = 'kasir';
        header('Location: kasir');
      } else if ($row['role'] == 'owner') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = 'owner';
        header('Location: owner');
    } else {
      header('Location: index.php?info=gagal');
    }
    } else {
        header('Location: index.php?info=gagal');
    }
  }
}