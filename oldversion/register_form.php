
<?php

@include 'config.php';


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
        $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
        mysqli_query($conn, $insert);
        header('location:login_form.php');
      }
   }

};
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM ĐĂNG KÝ</title>
	<link rel="stylesheet" type="text/css" href="css/login_form.css">
</head>
<body>
     <form action="" method="post">
     	<h2>ĐĂNG KÝ</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <label>Name</label>
        <input type="text" name="name" required placeholder="enter your name">

     	<label>Email</label>
     	<input type="email" name="email" required placeholder="enter your email">

     	<label>Password</label>
     	<input type="password" name="password" required placeholder="enter your password">

        <label>Confirm password</label>
        <input type="password" name="cpassword" required placeholder="confirm your password">

        <label>Confirm Type</label>
        <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
        </select>

     	<input type="submit" name="submit" value="Đăng ký ngay">
		<p>Đã có tài khoản? <a href="login_form.php">Đăng nhâp</a></p>
    
     </form>
</body>
</html>