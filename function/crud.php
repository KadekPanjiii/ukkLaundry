<?php 
class Crud extends Connection{
  // CREATE
  public function tambahOutlet($post){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];

    $sql = "INSERT INTO tb_outlet (nama, alamat, tlp) VALUES ('$nama', '$alamat', '$tlp')";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan");
    header("Location: outlet.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function tambahPaket($post){
    $outlet = $_POST['outlet'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO tb_paket (id_outlet, jenis, nama_paket, harga) VALUES ('$outlet','$jenis','$nama','$harga')";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan");
    header("Location: paket.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function tambahMember($post){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jeniskelamin'];
    $tlp = $_POST['telp'];

    $sql = "INSERT INTO tb_member (nama, alamat, jenis_kelamin, tlp) VALUES ('$nama','$alamat','$jk','$tlp')";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan");
    header("Location: member.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function tambahUser($post){
    $outlet = $_POST['outlet'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['jabatan'];

    $sql = "INSERT INTO tb_user (nama, username, password, id_outlet, role) VALUES ('$nama','$username','$password','$outlet', '$role')";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan");
    header("Location: user.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  // READ
  public function tampilOutlet(){
    $sql = "SELECT * FROM tb_outlet";
    return $this->conn->query($sql);
  }
  public function tampilPaket(){
    $sql = "SELECT tb_paket.*, tb_outlet.nama FROM tb_paket LEFT JOIN tb_outlet ON tb_paket.id_outlet = tb_outlet.id";
    return $this->conn->query($sql);
  }
  public function tampilMember(){
    $sql = "SELECT * FROM tb_member";
    return $this->conn->query($sql);
  }
  public function tampilUser(){
    $sql = "SELECT * FROM tb_user";
    return $this->conn->query($sql);
  }

  //UPDATE
  public function ubahOutlet($post){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $id = $_POST['id'];

    $sql = "UPDATE tb_outlet SET nama='$nama', alamat='$alamat', tlp='$tlp' WHERE id='$id'";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil diubah");
    header("Location: outlet.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function ubahPaket($post){
    $outlet = $_POST['outlet'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id = $_POST['id'];

    $sql = "UPDATE tb_paket SET id_outlet='$outlet', jenis='$jenis', nama_paket='$nama', harga='$harga' WHERE id='$id'";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil diubah");
    header("Location: paket.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function ubahMember($post){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jeniskelamin'];
    $tlp = $_POST['telp'];
    $id = $_POST['id'];

    $sql = "UPDATE tb_member SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', tlp='$tlp' WHERE id='$id'";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil diubah");
    header("Location: member.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }
  public function ubahUser($post){
    $outlet = $_POST['outlet'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['jabatan'];
    $id = $_POST['id'];

    $sql = "UPDATE tb_user SET nama='$nama', username='$username', password='$password', role='$role' WHERE id='$id'";
    $result = $this->conn->query($sql);
    if($result){
    FlashMessage::setFlashMessage("success", "Data berhasil diubah");
    header("Location: user.php");
    exit(0);
    } else {
      echo "Error " .$result. "<br>".$this->conn->error;
    }
  }


  //DELETE
  public function hapusOutlet($hapusid){
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_outlet WHERE id = '$id'";
    $result = $this->conn->query($sql);
    if($result){
        header('Location: outlet.php');
        exit(0);
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
    }  
}
  public function hapusPaket($hapusid){
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_paket WHERE id = '$id'";
    $result = $this->conn->query($sql);
    if($result){
        header('Location: paket.php');
        exit(0);
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
    }
}
  public function hapusMember($hapusid){
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_member WHERE id = '$id'";
    $result = $this->conn->query($sql);
    if($result){
        header('Location: member.php');
        exit(0);
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
    }  
}
  public function hapusUser($hapusid){
    $id = $_POST['id'];
    $sql = "DELETE FROM tb_user WHERE id = '$id'";
    $result = $this->conn->query($sql);
    if($result){
        header('Location: user.php');
        exit(0);
    } else {
        echo "Error ".$result."<br>".$this->conn->error;
    }  
}
}
?>
<link rel="stylesheet" href="../assets/dist/css/sweetsalert2.min.css">
<script src="../assets/dist/js/sweetalert2.min.js"></script>