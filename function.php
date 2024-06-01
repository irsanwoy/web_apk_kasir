<?php 

    
    // bikin koneksi
    $conn = mysqli_connect('localhost','root','','kasirv1');


    // login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
        

        $hitung = mysqli_num_rows($check);

        if($hitung > 0){
            $_SESSION['login'] = true;
            header('location:index.php');
        }else{
            echo "<script>alert('username atau password salah');</script>";
            echo "<script>location='login.php';</script>";
        }
    }

    if(isset($_POST['tambah'])){
        $namaproduk = $_POST['namaproduk'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, stok) VALUES ('$namaproduk', '$deskripsi','$harga', '$stok')");
        if($insert){
            echo "<script>alert('data berhasil ditambahkan');</script>";
            echo "<script>location='stok.php';</script>";
        }else{
            echo "<script>alert('data gagal ditambahkan');</script>";
            echo "<script>location='stok.php';</script>";
        }
    }
    

?>