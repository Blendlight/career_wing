<?php
if($search)
{
    $squery = make_search_condition($search, ["job_title", "company_name"]);
    $query_limit = "";
}else
{
    $squery = "1=1";
}

$q = "SELECT * FROM job LEFT JOIN company ON job.company_id=company.company_id WHERE $squery ORDER BY job_title $query_limit";
$query = $conx->query($q);
$jobs = [];
if($query && $query->num_rows>0)
{
    $jobs = $query->fetch_all(MYSQL_ASSOC);
}

/************
* Pagination
***********/
$total = $conx->query("SELECT count(job_id) as total FROM job");
$total = $total->fetch_row();
$total = $total[0];

?><h1>Jobs</h1>
<div id="alerts"></div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Company</th>
            <th colspan="2" width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $r = $start+1;
        foreach($jobs as $job):?>
        <tr>
            <td><?= $r++;?></td>
            <td><?= add_sterm_class($job["job_title"]);?></td>
            <td><?= add_sterm_class($job["company_name"]);?></td>
            <td >
                <a href="<?= BASE_URL."/update_job?jid=".$job["job_id"];?>" class=""><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="job" data-id="<?= $job["job_id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php if(!$search){
    echo create_pagination($total, $limit, $pg, $page);
}?>