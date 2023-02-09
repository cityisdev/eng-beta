<?php

@include 'config.php';

session_start();


session_unset();




if(isset($_POST['submit']))
{
   if (isset($_POST['name']))
   {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
   }
   if (isset($_POST['email']))
   {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
   }
   if (isset($_POST['password'])){
      $pass = md5($_POST['password']);
   }
   if (isset($_POST['cpassword'])){
      $cpass = md5($_POST['cpassword']);
   }
   if (isset($_POST['user_type'])){
      $user_type = $_POST['user_type'];
   }
   

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'Sai tài khoản hoặc mật khẩu!';
   }
 
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập đăng ký</title>
  
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/log.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Chưa có tài khoản? <a href="register_form.php">Đăng ký</a></p>
   </form>

</div>

</body>
</html>