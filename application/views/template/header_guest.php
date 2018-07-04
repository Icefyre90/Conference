<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <title>Welcome</title>
    </head>
    <body class="Site">
        <div>
<nav class="navbar navbar-expand-sm sticky-top bg-dark fixed-topnavbar-dark mb-4 py-3" style="background: linear-gradient(darkgray, lightgrey);">
   
 <a class="navbar-brand" href="<?php echo site_url("Guest/index"); ?>">
 <img src="<?php echo base_url("image/logo/logo666.jpg"); ?>" alt="Logo" style="width:120px;" >
 </a>
 <ul class="navbar-nav">
 <li class="nav-item ">
     <a class="nav-link" href="<?php echo site_url("Guest/index"); ?>">Home</a>
 </li>
  <li class="nav-item">
 <div class="dropdown nav-item">
 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
 Conferences
 </a>
 <div class="dropdown-menu">
     <?php
                foreach ($confdata as $el) { ?>
 <a class="dropdown-item" href="<?php echo site_url("$controller/dataconf/" . $el['idconference']); ?>"><?php echo $el['title']; ?></a>
         <?php } ?>
 </div>
</div>

 </li>
 </ul>
    <ul class="nav navbar-nav ml-auto">

 <li class="nav-item">
     <!-- Button trigger modal -->
 <a class="nav-link" data-toggle="modal" data-target="#LoginModal" href="">Login</a>
 </li>
 <li class="nav-item">
     <!-- Button trigger modal -->
 <a class="nav-link" data-toggle="modal" data-target="#RegistrationModal" href="">Registration</a>
 </li>
 
 <li class="nav-item">
     <a class="nav-link" href="<?php echo site_url("Ajaxsearch/index"); ?>">Search</a>
 </li>
 
 </ul>
</nav>
            </div>
    <div class="Site-content">
    <div class="container">
        







