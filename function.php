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

?>