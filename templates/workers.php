<?php
if($search)
{
    $squery = make_search_condition($search, ["worker_name", "worker_fname", "worker_passport_number", "worker_cnic_number", "worker_fee", "company_name", "agent_name", "job_title" ]);
    $query_limit = "";
}else
{
    $squery = "1=1";
}

$query = $conx->query("SELECT 
	worker.*,
    company.company_name,
    company.company_id AS CID,
    job.job_title,
    job.job_id as JID,
    agent.agent_name,
    agent.agent_id as AID
FROM 
	worker 
	LEFT JOIN company on company.company_id = worker.company_id 
	LEFT JOIN agent ON agent.agent_id = worker.agent_id 
	LEFT JOIN job ON job.job_id = worker.job_id WHERE $squery ORDER BY worker_name $query_limit");


$workers = [];
if($query && $query->num_rows>0)
{
    $workers = $query->fetch_all(MYSQL_ASSOC);
}


/************
* Pagination
***********/
$total = $conx->query("SELECT count(worker_id) as total FROM worker");
$total = $total->fetch_row();
$total = $total[0];

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
        $agent_id = $worker["AID"];
        $agent_name = $worker["agent_name"];
        $company_name = $worker["company_name"];
        $company_id = $worker["company_id"];
        $worker_fee = $worker["worker_fee"];
        $job_id = $worker["job_id"];
        $job_title = $worker["job_title"];
        $date_added = $worker["date_added"];

        $job_error = false;
        $agent_error = false;

        if($job_id)
        {
            $jq = "SELECT * FROM job WHERE company_id=$company_id  && job_id=$job_id";
            $job_check = $conx->query($jq);
            if( !($job_check && $job_check->num_rows>0))
            {
                $job_error = true;   
            }
        }

        if($agent_id)
        {
            $aq = "SELECT * FROM agent WHERE company_id=$company_id  && agent_id=$agent_id";
            $agent_check = $conx->query($aq);
            if( !($agent_check && $agent_check->num_rows>0))
            {
                $agent_error = true;   
            }
        }



        $job_title = add_sterm_class($job_title);
        $agent_name = add_sterm_class($agent_name);
        ?>
        <tr>
            <td><?= add_sterm_class($worker_name);?></td>
            <td><?= add_sterm_class($worker_fname);?></td>
            <td><?= add_sterm_class($worker_passport_number);?></td>
            <td><?= add_sterm_class($worker_cnic_number);?></td>
            <td><?= $agent_error?"<s>".$agent_name."</s>":$agent_name;?></td>
            <td><?= add_sterm_class($company_name);?></td>
            <td><?= $job_error?"<s>".$job_title."</s>":$job_title;?></td>
            <td><?= add_sterm_class($worker_fee);?></td>
            <td><?= add_sterm_class($date_added);?></td>
            <td>
                <a href="<?= BASE_URL."/update_worker?wid=".$worker_id;?>" class=""><i class="fa fa-pencil fa-lg"></i></a>
                <a href="#" data-table="worker" data-id="<?= $worker["worker_id"];?>" class="red btn-delete"><i class="fa fa-trash fa-lg "></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>


<?php if(!$search){
    echo create_pagination($total, $limit, $pg, $page);
}?>