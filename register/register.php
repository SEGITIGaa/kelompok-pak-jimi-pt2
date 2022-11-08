<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="./register.css">
    </head>
    <?php
   require 'fungsi.php';

    
   // cek registrasi berhasil apa tidak
   if(isset ($_POST["submit"]) ){

       if( registrasi($_POST) ){
           echo "<script>
           alert('USER BARU'); 
           document.location.href = './../index/index.php'
           </script>";
       }else {
           echo mysqli_error($conn);
       }

   }
    ?>
    <form action="" method="post">
        <h1>Sign Up</h1>
        <div class="email">
        <h6>Email</h6>
            <input type="email" name="email" id="" required>
        </div>

        <div class="username">
        <h6>Username</h6>
            <input type="text" name="username" id="" required>
        </div>
        <div class="pass">
        <h6>Password</h6>
            <input type="password" name="password" id="" required>
        </div>

        <button type="submit" name="submit">
            Kirim
        </button>
        <h5>
            udah punya akun?
            <a href="./../login/Login.php"> Login</a>
        </h5>
    </form>
</body>
</html>