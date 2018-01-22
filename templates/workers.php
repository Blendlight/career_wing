<?php
$workers = [];
$query = $conx->query("SELECT * FROM worker LEFT JOIN company on company.company_id=worker.company_id LEFT JOIN agent ON agent.agent_id=worker.agent_id LEFT JOIN job ON job.job_id=worker.job_id");

if($query && $query->num_rows>0)
{
    $workers = $query->fetch_all(MYSQL_ASSOC);
}

?><h1>Workers</h1>
<div id="alerts"></div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Father Name</th>
            <th>Passport</th>
            <th>CNIC</th>
            <th>Agent</th>
            <th>Company</th>
            <th>Job</th>
            <th>Fee</th>
            <th>Date added</th>
            <th colspan=2>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach($workers as $worker):
$worker_id = $worker["worker_id"];
$worker_name = $worker["worker_name"];
$worker_fname = $worker["worker_fname"];
$worker_passport_number = $worker["worker_passport_number"];
$worker_cnic_number = $worker["worker_cnic_number"];
$agent_id = $worker["agent_name"];
$company_id = $worker["company_name"];
$worker_fee = $worker["worker_fee"];
$job_id = $worker["job_title"];
$date_added = $worker["date_added"];
        ?>
        <tr>
            <td><?= $worker_name;?></td>
            <td><?= $worker_fname;?></td>
            <td><?= $worker_passport_number;?></td>
            <td><?= $worker_cnic_number;?></td>
            <td><?= $agent_id;?></td>
            <td><?= $company_id;?></td>
            <td><?= $job_id;?></td>
            <td><?= $worker_fee;?></td>
            <td><?= $date_added;?></td>
            <td>
                <a href="" class=""><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="worker" data-id="<?= $worker["worker_id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>