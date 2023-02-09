<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Học tiếng anh tại nhà</title>

  
   <link rel="stylesheet" href="css/style.css">
  
   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="css/log.css">
</head>
<body>
   

<header>

    <div id="menu" class="fas fa-bars"></div>

    <a href="#" class="logo"><i class="fas fa-user-graduate"></i>Home</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">home</a></li>
            <li><a href="#about">about</a></li>
            <li><a href="#course">course</a></li>
            <li><a href="#teacher">more</a></li>
            <li><a href="#contact">contact</a></li>
        </ul>
    </nav>

    <div id="login" class="fas fa-user-circle">


    <a href="logout.php" class="logo">logout</a>
    </div>

</header>


<!-- home section starts  -->

<section class="home" id="home">
<div class="container">

<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
   </div>
</div>

    <div class="shape"></div>

</section>





</body>
</html>
