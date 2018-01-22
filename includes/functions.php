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

function select_options($name, $id=null)
{
    global $conx;
    $output = "";
    $where = "1";
    switch($name)
    {
        case "company":
            $query = $conx->query("SELECT company_id as id, company_name as name FROM company ORDER BY company_name ASC");
            break;
        case "agent":
            $query = $conx->query("SELECT agent_id as id, agent_name as name FROM agent ORDER BY agent_name ASC");
            break;
        case "jobs":
            if($id)
            {
                $where = "`company_id`='$id'";
            }
            $query = $conx->query("SELECT job_id as id, job_title as name FROM `job` WHERE $where ORDER BY job_title ASC");
            break;
    }
    if($query && $query->num_rows>0)
    {
        foreach($query->fetch_all(MYSQL_ASSOC) as $row)
        {
            $output .= "<option value='".$row["id"]."'>".$row["name"]."</option>\n";
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
            <a href="<?= $prev_class!=""?"#":"index.php?page=$page&pg=" . ($pg-1);?>" >
                <i class="ace-icon fa fa-angle-double-left"></i>
            </a>
        </li>
        <?php for($i=$s;$i<=$e;$i++):
    $active = $i==$pg?"active":"";
        ?>
        <li class="<?= $active;?>">
            <a href="index.php?page=<?= $page;?>&pg=<?= $i;?>" data-index="<?= $i;?>"><?= $i;?></a>
        </li>
        <?php endfor;?>

        <li class="<?= $next_class;?>">
            <a href="<?= $next_class!=""?"#":"index.php?page=$page&pg=" . ($pg+1);?>">
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
    
}