<?php

function get_header()
{
    include "header.php";
}

function get_footer()
{
    include "footer.php";
}

function get_body($page='')
{
    $page_real = "templates/$page.php";
    if(is_file($page_real))
    {
        include $page_real;
    }else
    {
        include "templates/404.php";
    }
}

function select_options($name, $id=null, $where="1=1")
{
    global $conx;
    $output = "";
    switch($name)
    {
        case "company":
            $query = $conx->query("SELECT company_id as id, company_name as name FROM company WHERE $where ORDER BY company_name ASC");
            break;
        case "agent":
            $query = $conx->query("SELECT agent_id as id, agent_name as name FROM agent WHERE $where ORDER BY agent_name ASC");
            break;
        case "jobs":
            /*if($id)
            {
                $where = "`company_id`='$id'";
            }*/
            $q = "SELECT job_id as id, job_title as name FROM `job` WHERE $where ORDER BY job_title ASC";
            $query = $conx->query($q);
            break;
    }
    if($query && $query->num_rows>0)
    {
        foreach($query->fetch_all(MYSQL_ASSOC) as $row)
        {
            $selected = "";
            
            if($id !== null && $id == $row["id"])
            {
                $selected = "selected";
            }
            
            $output .= "<option  $selected value='".$row["id"]."'>".$row["name"]."</option>\n";
        }

    }
    return $output;
}

function create_pagination($total, $limit, $pg, $page)
{
    $climit = 5;
    $mid = round($climit/2);
    $count = ceil($total / $limit);
    if(!($count>1))
    {
        return;
    }

    $s = 1;
    $e = $climit;

    if($count>$climit)
    {
        if($pg>$mid)
        {
            $s = $pg-2;
            $e = min($count, $s+$mid+1);
            if($e-$s<$climit)
            {
                $t =  $e-$s+1;
                $s -= $climit-$t;
            }
        }
    }

?>
<div>
    <ul class="pagination">
        <?php
    $prev_class=$pg>1?"":"disabled";
    $next_class=$pg==$count?"disabled":"";
        ?>
        <li class="<?= $prev_class;?>">
            <a href="<?= $prev_class!=""?"#": BASE_URL . "/$page/" . ($pg-1);?>" >
                <i class="ace-icon fa fa-angle-double-left"></i>
            </a>
        </li>
        <?php for($i=$s;$i<=$e;$i++):
    $active = $i==$pg?"active":"";
        ?>
        <li class="<?= $active;?>">
            <a href="<?= BASE_URL . "/$page/" . $i;?>" data-index="<?= $i;?>"><?= $i;?></a>
        </li>
        <?php endfor;?>

        <li class="<?= $next_class;?>">
            <a href="<?= $next_class!=""?"#": BASE_URL . "/$page/" . ($pg+1);?>">
                <i class="ace-icon fa fa-angle-double-right"></i>
            </a>
        </li>

    </ul>
</div>
<?php
}

function delete_row($id, $table)
{
    global $conx;

    switch($table)
    {
        case "job":

            $query = "DELETE FROM job WHERE job_id='$id'";
            break;
        case "company":
            $query = "DELETE FROM company WHERE company_id='$id'";
            break;
        case "worker":
            $query = "DELETE FROM `worker` WHERE worker_id='$id'";
            break;
        case "agent":
            $query = "DELETE FROM `agent` WHERE agent_id='$id'";
            break;
    }
    $result = $conx->query($query);
    if($result && $conx->affected_rows>0)
    {
        return true;
    }
    return false;
}

function is_login()
{
    if(isset($_SESSION["userid"]))
    {
        return true;
    }
    return false;
}

function create_menu_element($title, $href='', $childs=[],$icon_1="", $single = true, $icon_2="")
{
    return array("title"=>$title, "href"=>$href, "icon_1"=>$icon_1, "icon_2"=>$icon_2, "single"=>$single, "childs"=>$childs);
}

function menu_is_active($menu)
{
    if($menu["single"])
    {
        if(BASE_URL == $menu["href"])
        {
            $active = "active";
        }else{
            $active = BASE_URL."/".$page==$menu["href"]?"active": "";
        }
    }else
    {
        $active = menu_is_active();
    }

    return $active;
}

function make_search_condition($search, $fields=[])
{
    $output = "";
    foreach($fields as $field)
    {
        $output .= " `$field` LIKE '%$search%' ||";
    }
    return rtrim($output, "||");
}

function add_sterm_class($str)
{
    global $search;
    if($search)
    {
        $str = preg_replace("/($search)/i", "<span class='sterm'>$1</span>", $str);
    }
    
    return $str;
}