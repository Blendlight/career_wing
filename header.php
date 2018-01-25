<?php
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Blank Page - Ace Admin</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/ace-rtl.min.css" />
        
        <link rel="stylesheet" href="<?= BASE_URL;?>/includes/style.css" />

        <!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
<![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?= BASE_URL;?>/assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
    </head>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-header pull-left">
                    <a href="<?= "#";?>" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Career Wing
                        </small>
                    </a>
                </div>

            </div><!-- /.navbar-container -->
            <div class="pull-right">
                <ul class="navbar-nav nav">
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
<button class="btn btn-success">
<i class="ace-icon fa fa-signal"></i>
</button>

<button class="btn btn-info">
<i class="ace-icon fa fa-pencil"></i>
</button>

<button class="btn btn-warning">
<i class="ace-icon fa fa-users"></i>
</button>

<button class="btn btn-danger">
<i class="ace-icon fa fa-cogs"></i>
</button>
</div>

<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
<span class="btn btn-success"></span>

<span class="btn btn-info"></span>

<span class="btn btn-warning"></span>

<span class="btn btn-danger"></span>
</div>
</div>-->
                <!-- /.sidebar-shortcuts -->
                <ul class="nav nav-list">
                    <li>
                        <a href="<?= BASE_URL;?>">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Companies
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li>
                                <a href="<?= BASE_URL;?>/add_company">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Company
                                    <b class="arrow fa fa-plus"></b>
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL;?>/companies">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Show Companies
                                    <b class="arrow fa fa-eye"></b>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Jobs </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="">
                                <a href="<?= BASE_URL;?>/jobs">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Show Jobs
                                    <b class="fa fa-eye arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="">
                                <a href="<?= BASE_URL;?>/add_job">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Job
                                    <b class="fa fa-plus arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Workers </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="<?= BASE_URL;?>/workers">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Show Worker
                                    <b class="fa fa-eye arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="<?= BASE_URL;?>/add_worker">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add new Worker
                                    <b class="fa fa-plus arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text"> Agnets </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="<?= BASE_URL;?>/agents">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Show Agnets
                                    <b class="fa fa-eye arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="<?= BASE_URL;?>/add_agent">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add new Agent
                                    <b class="fa fa-plus arrow"></b>
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="">
                        <div class="nav-search" id="nav-search">
                           <?php if(in_array($page, ["agents", "jobs", "companies", "workers"])):?>
                            <form class="form-search" method="get" action="<?= BASE_URL."/$page";?>">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" name="search" value="<?= $search;?>" />
                                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                                </span>
                            </form>
                            <?php endif;?>
                        </div><!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <?php
                        if(!empty($page_header_text)){
                        ?>
                        <div class="page-header">
                            <h1>
                                <?= $page_header_text;?>
                                <?php
                            if(!empty($page_header_subtext))
                            {                                       
                                ?>
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    <?= $page_header_subtext;?>
                                </small>
                                <?php
                            }
                                ?>
                            </h1>
                        </div><!-- /.page-header -->
                        <?php
                        }
                        ?>