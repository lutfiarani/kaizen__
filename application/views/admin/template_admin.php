<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KaizenKU - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>template/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>template/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/template/css/bootstrap.css" />
    <link href="<?php echo base_url();?>template/css/style.css" rel="stylesheet" />

    <!-- responsive style -->
    <link href="<?php echo base_url();?>template/css/responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>template/css/baru.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>index.php/C_kaizen_admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3">KaizenKU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php 
                if($sub == 0){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
              
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Status Ide</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/gedung">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Update Departemen</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                HomePage Content
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
                if($sub == 1){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/welcome" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Welcoming Page</span>
                </a>
            </li>
            <?php 
                if($sub == 2){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/tentang_kami">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tentang Kami</span>
                </a>
            </li>
                <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tentang Kami</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>/index.php/C_kaizen_admin/welcoming_page/tim_kaizen">Tim Kaizen</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/index.php/C_kaizen_admin/welcoming_page/kaizen_story">Kaizen Story</a>
                        <a class="collapse-item" href="<?php echo base_url();?>/index.php/C_kaizen_admin/welcoming_page/kegiatan">Kegiatan</a>
                        
                    </div>
                </div> -->
            <?php 
                if($sub == 3){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/tim_kaizen" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tim Kaizen</span>
                </a>
            </li>
            <?php 
                if($sub == 7){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/kaizen_story" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Isi Kaizen Story</span>
                </a>
            </li>
            <?php 
                if($sub == 4){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/aktivitas_kaizen" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Aktivitas Kaizen</span>
                </a>
            </li>
            <?php 
                if($sub == 5){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/pemberian_hadiah" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pemberian Hadiah</span>
                </a>
            </li>
            <?php 
                if($sub == 6){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/welcoming_page/hadiah">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Hadiah Kaizen</span>
                </a>
            </li>
            <?php 
                if($sub == 8){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/kaizen_implemented">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kaizen Implemented</span>
                </a>
            </li>
            <?php 
                if($sub == 9){
                    echo '<li class="nav-item active">';
                }else{
                    echo '<li class="nav-item ">'; 
                }
            ?>
                <a class="nav-link" href="<?php echo base_url();?>index.php/C_kaizen_admin/kaizen_summary">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Summary Kaizen</span>
                </a>
            </li>
            

           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
             <!-- Main Content -->
        <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, <?php echo $username;?>!</span>
                <div class="topbar-divider d-none d-sm-block"></div>
                <a class="nav-link" href="<?php echo base_url('C_login/logout');?>" role="button" >Logout
            </a>
            <!-- </a> -->
            
        </nav>
        
        
           

               
