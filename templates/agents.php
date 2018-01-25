<?php
if($search)
{
    $squery = make_search_condition($search, ["agent_name"]);
    $query_limit = "";
}else
{
    $squery = "1=1";
}
$q = "SELECT agent_id as id,agent_name as name, company.company_name as cname  FROM `agent` LEFT JOIN company ON agent.company_id=company.company_id WHERE $squery ORDER BY agent_name ASC $query_limit";
$query = $conx->query($q);
$agents = [];
if($query && $query->num_rows>0){
    $agents = $query->fetch_all(MYSQLI_ASSOC);
}

/************
* Pagination
***********/
$total = $conx->query("SELECT count(agent_id) as total FROM agent");
$total = $total->fetch_row();
$total = $total[0];

?><h1>agents</h1>
<div id="alerts"></div>
<?php if($total>0):?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th style="width:80%">Name</th>
            <th colspan='2'>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $r = $start+1;
        foreach($agents as $agent):?>
        <tr>
            <td><?= $r++;?></td>
            <td><?= add_sterm_class($agent["name"]);?></td>
            <td><?= add_sterm_class($agent["cname"]);?></td>
            <td>
                <a href="<?= BASE_URL."/update_agent?aid=".$agent["id"];?>"><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="agent" data-id="<?= $agent["id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php if(!$search){
    echo create_pagination($total, $limit, $pg, $page);
}?>
<?php else:?>
<h3>No agents Added</h3>
<?php endif;?>
