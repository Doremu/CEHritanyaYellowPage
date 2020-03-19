<?php 
    session_start();
    include 'connect.php';
 
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:jual.php?user=$username");
    }
    else{
        header("location:index.php?pesan=gagal");
    }
?>
