<?php
if($search)
{
    $squery = make_search_condition($search, ["company_name"]);
    $query_limit = "";
}else
{
    $squery = "1=1";
}

$q = "SELECT company_id as id,company_name as name  FROM `company` WHERE $squery ORDER BY company_name ASC $query_limit";

$query = $conx->query($q);
$companies = [];
if($query && $query->num_rows>0){
    $companies = $query->fetch_all(MYSQLI_ASSOC);
}

/************
* Pagination
***********/
$total = $conx->query("SELECT count(company_id) as total FROM company");
$total = $total->fetch_row();
$total = $total[0];

?><h1>Companies</h1>
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
        foreach($companies as $company):?>
        <tr>
           <td><?= $r++;?></td>
            <td><?= add_sterm_class($company["name"]);?></td>
            <td >
                <a href="<?= BASE_URL."/update_company?cid=".$company["id"];?>" class=""><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="company" data-id="<?= $company["id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php if(!$search){
    echo create_pagination($total, $limit, $pg, $page);
}?>
<?php else:?>
<h3>No companies Added</h3>
<?php endif;?>
