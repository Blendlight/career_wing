<?php
$error = false;
$jname = "";
if(isset($_POST["update_worker_submit"]))
{
    $name = $_POST["name"];
    $wid = $_POST["worker_id"];
    $father_name = $_POST["father_name"];
    $passport_num = $_POST["passport_num"];
    $cnic_num = $_POST["cnic_num"];
    $agent_id = $_POST["agent_id"];
    $company_id = $_POST["company_id"];
    $job_id = $_POST["job_id"];
    $fee = $_POST["fee"];
    $query = $conx->query("
                UPDATE `worker` 
                    SET
                    `worker_name`='$name', `worker_fname`='$father_name', 
                    `worker_passport_number`='$passport_num', `worker_cnic_number`='$cnic_num', 
                    `agent_id`='$agent_id', `company_id`='$company_id', `worker_fee`='$fee', 
                    `job_id`='$job_id' WHERE worker_id='$wid'");
    $updateed = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        header("location: workers");
    }
}
if(isset($_GET["wid"]))
{
    $wid = $_GET["wid"];
}else
{
    header("location: workers");
}
$query = $conx->query("SELECT * FROM worker WHERE worker_id='$wid' LIMIT 1");
if($query && $query->num_rows>0)
{
    $workers_data = $query->fetch_all(MYSQLI_ASSOC);
    $worker_data = $workers_data[0];
}else
{
    $error = true;
}
?><h1>update Job</h1>
<?php
if(isset($_POST["update_worker_submit"]))
{
    if($updateed){
?>
<div class="alert alert-success">Worker <b><?= $name;?></b> updateed To Database <span class="close" data-dismiss='alert'>&times;</span></div>
<?php
                 }else
    {
?>
<div class="alert alert-success">Worker <b><?= $name;?></b> Failed To update to Database</div>
<?php
    }
}

if($error)
{
    echo  "<div class=\"alert alert-danger\">Worker of ID='$wid' Not found</div>";
}else
{
?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST">
    <input type="hidden" name="worker_id" value="<?= $wid;?>">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="name" value="<?= $worker_data["worker_name"];?>" type="text" id="form-field-1" placeholder="Name" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Father Name <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="father_name" value="<?= $worker_data["worker_fname"];?>" type="text" id="form-field-1" placeholder="Father Name" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Passport Number <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="passport_num" value="<?= $worker_data["worker_passport_number"];?>" type="text" id="form-field-1" placeholder="Passport Number" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">CNIC Number <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="cnic_num" value="<?= $worker_data["worker_cnic_number"];?>" type="text" id="form-field-1" placeholder="CNIC Number" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="company_id"  id="add_worker-input_company" class="col-xs-10 col-sm-5" required>
                <option value="">--SELECT COMPANY--</option>
                <?= select_options("company", $worker_data["company_id"]);?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Agent <span class='red'>*</span></label>
        <div class="col-sm-9">
            <select name="agent_id" id="add_worker-input_agent" required>
                <option value="">--Agent--</option>
                <?= select_options("agent", $worker_data["agent_id"], "company_id='".$worker_data["company_id"]."'");?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Job <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="job_id" id="add_worker-input_job" class="col-xs-10 col-sm-5" required>
                <option value="">--SELECT JOB--</option>
                <?= select_options("jobs", $worker_data["job_id"], "company_id='".$worker_data["company_id"]."'");?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fee <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="fee" type="text" id="form-field-1" placeholder="Fee" class="col-xs-10 col-sm-5" value="<?= $worker_data["worker_fee"];?>" required>
        </div>
    </div>

    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <input name="update_worker_submit" type="submit" class="fa  btn btn-info" value="&#xf00c;update">
        </div>
    </div>
</form>
<?php
}

?>