<?php

session_start();/* (Returns: bool);Param: (void)*/

define("BASE_PATH", __DIR__);
define("BASE_URL", "http://localhost/zahoor/careerwing");
$path_args = [];
if(isset($_SERVER["PATH_INFO"]))
{
    $path_info = trim($_SERVER["PATH_INFO"], "/");
    $path_args = explode("/", $path_info);
}
$_GET["pg"] = 1;
if(isset($path_args[1]))
{
    $_GET["pg"] = $path_args[1];
}

$search = null;
if(isset($_GET["search"]))
{
    $search = $_GET["search"];
}


include "includes/conx.php";
include "includes/functions.php";
$dlimit = 20;
$limit = isset($_GET["limit"])?$_GET["limit"]: $dlimit;
$pg = isset($_GET["pg"])?$_GET["pg"]: 1;
$start = ($pg-1)*$limit;
$query_limit = "LIMIT $start, $limit";
$page = "front";
if(isset($path_args[0]))
{
    $page = $path_args[0];
}
$page_header_text = $search?"Search result for $search":"";
$page_header_subtext = "";
$page_real = "templates/$page.php";