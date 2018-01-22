<?php


$q = "SELECT * FROM job LEFT JOIN company ON job.company_id=company.company_id $query_limit";
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
            <td><?= $job["job_title"];?></td>
            <td><?= $job["company_name"];?></td>
            <td >
                <a href="" class=""><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="job" data-id="<?= $job["job_id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?= create_pagination($total, $limit, $pg, $page);?>