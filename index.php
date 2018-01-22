<?php
include "settings.php";
$dlimit = 10;
$limit = isset($_GET["limit"])?$_GET["limit"]: $dlimit;
$pg = isset($_GET["pg"])?$_GET["pg"]: 1;
$start = ($pg-1)*$limit;

$query_limit = "LIMIT $start, $limit";

$page = "front";

if(isset($_GET["page"]))
{
    $page = $_GET["page"];
}


$page_header_text = "";
$page_header_subtext = "";
$page_real = "templates/$page.php";


include "header.php";
if(is_file($page_real))
{
    include $page_real;
}else
{
    include "templates/404.php";
}
include "footer.php";