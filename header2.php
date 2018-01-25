<?php
$menu = [];

$menu[] = create_menu_element("Home", BASE_URL, $childs=[],$icon_1="menu-icon fa fa-tachometer");
$menu[] = create_menu_element("Companies", "apple", $childs=[
    create_menu_element("Add Company", BASE_URL."/companies", [], "menu-icon fa fa-caret-right", true, "arrow fa fa-eye"),
    create_menu_element("Show Company", BASE_URL."/add_company", [], "menu-icon fa fa-caret-right", true, "arrow fa fa-plus"),
],$icon_1="menu-icon fa fa-desktop", false, "arrow fa fa-angle-down");

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
                <div class="navbar-buttons navbar-header " role="navigation">
                    <ul class="nav ace-nav">

                        <li class="light-blue dropdown-modal">
                            <a href="<?= BASE_URL;?>/companies">
                                <i class="fa fa-eye fa-lg"></i> Companies
                            </a>
                        </li>
                        <li class="light-blue dropdown-modal">
                            <a href="<?= BASE_URL;?>/workers">
                                <i class="fa fa-eye fa-lg"></i> Workers
                            </a>
                        </li>
                        <li class="light-blue dropdown-modal">
                            <a href="<?= BASE_URL;?>/jobs">
                                <i class="fa fa-eye fa-lg"></i> JOBS
                            </a>
                        </li>
                        <li class="light-blue dropdown-modal">
                            <a href="<?= BASE_URL;?>/agents">
                                <i class="fa fa-eye fa-lg"></i> Agents
                            </a>
                        </li>

                        <li class="grey dropdown-modal">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-tasks"></i>
                                Companies
                            </a>

                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-check"></i>
                                    Comapnies
                                </li>
                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    Show Companies
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">Hardware Upgrade</span>
                                                    <span class="pull-right">35%</span>
                                                </div>

                                                <div class="progress progress-mini">
                                                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">Unit Testing</span>
                                                    <span class="pull-right">15%</span>
                                                </div>

                                                <div class="progress progress-mini">
                                                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="clearfix">
                                                    <span class="pull-left">Bug Fixes</span>
                                                    <span class="pull-right">90%</span>
                                                </div>

                                                <div class="progress progress-mini progress-striped active">
                                                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="#">
                                        See tasks with details
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="green dropdown-modal">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                                <span class="badge badge-success">5</span>
                            </a>

                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-envelope-o"></i>
                                    5 Messages
                                </li>

                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Alex:</span>
                                                        Ciao sociis natoque penatibus et auctor ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>a moment ago</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Susan:</span>
                                                        Vestibulum id ligula porta felis euismod ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>20 minutes ago</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Bob:</span>
                                                        Nullam quis risus eget urna mollis ornare ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>3:15 pm</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Kate:</span>
                                                        Ciao sociis natoque eget urna mollis ornare ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>1:33 pm</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Fred:</span>
                                                        Vestibulum id penatibus et auctor  ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>10:09 am</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="inbox.html">
                                        See all messages
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
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
                    <li class="active">
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
                            <i class="menu-icon fa fa-pencil-square-o"></i>
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

                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ul><!-- /.breadcrumb -->

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                                </span>
                            </form>
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