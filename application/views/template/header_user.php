<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
        <title>Welcome</title>
    </head>
    <body class="Site">
        
<div>
        <nav nav class="navbar navbar-expand-sm sticky-top bg-dark fixed-topnavbar-dark mb-4 py-3" style="background: linear-gradient(darkgray, lightgrey);">
            
                <a class="navbar-brand" href="<?php echo site_url("User/index"); ?>">
                    <img src="<?php echo base_url("image/logo/logo666.jpg"); ?>" alt="Logo" style="width:120px;">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("User/index"); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/myProfile"); ?>">My profile</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/conferences"); ?>">Conferences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/project"); ?>">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/newProject"); ?>">New project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/invitations"); ?>">Invitations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("User/review"); ?>">Review</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo site_url("Ajaxsearch/index"); ?>">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('User/logout'); ?>">Logout</a>
                    </li>

                </ul>
            
        </nav>
</div>
        <div class="Site-content">
        <div class="container">