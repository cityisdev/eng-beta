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
      $error[] = '';
   }
 
};

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="css/login_form.css">
</head>
<body>
    <form action="" method="post">
     	<h2>LOGIN</h2>
     	<?php
		  if(isset($error))
			{ 
			foreach($error as $error)
				{
					echo '<span class="error-msg">'.$error.'</span>';
				};
			};
		?>

     	<label>Email</label>
     	<input type="email" name="email" required placeholder="enter your email">

     	<label>Password</label>
     	<input type="password" name="password" required placeholder="enter your password"><br>

     	<input type="submit" name="submit" value="Login Now">

		<p>Chưa có tài khoản? <a href="register_form.php">Đăng ký</a></p>
      
    
    </form>
</body>
</html>