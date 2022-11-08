<?php
$conn = mysqli_connect('localhost','root','','kelompok');

function registrasi($data){
   
    global $conn;

    // ambil data
    $gmail = $data["email"];
    $username = strtolower( stripslashes( $data["username"] ) );
    $password = mysqli_real_escape_string($conn,$data["password"] );

    $result_gmail = mysqli_query($conn,"SELECT email FROM register WHERE email = '$gmail' ") ;
    $result_nama = mysqli_query($conn,"SELECT username FROM register WHERE username = '$username' ") ;

    // cek gmail dan user name tidak boleh sama
    if(mysqli_fetch_assoc($result_nama) ){
        echo "<script>
        alert('Nama Sudah ada')
        </script>";
        return false;
    }

    if(mysqli_fetch_assoc($result_gmail) ){
        echo "<script>
        alert('Gmail sudah ada')
        </script>";
        return false;
    }

    // memasukan ke database

    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO register VALUES ('','$gmail','$username','$password') ");
        

    return mysqli_affected_rows($conn);

}
?>