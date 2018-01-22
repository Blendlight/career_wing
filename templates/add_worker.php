<?php

$jname = "";
if(isset($_POST["add_worker_submit"]))
{
    $name = $_POST["name"];
    $father_name = $_POST["father_name"];
    $passport_num = $_POST["passport_num"];
    $cnic_num = $_POST["cnic_num"];
    $agent_id = $_POST["agent_id"];
    $company_id = $_POST["company_id"];
    $job_id = $_POST["job_id"];
    $fee = $_POST["fee"];
    $query = $conx->query("
                INSERT INTO `worker` 
                    SET
                    `worker_name`='$name', `worker_fname`='$father_name', 
                    `worker_passport_number`='$passport_num', `worker_cnic_number`='$cnic_num', 
                    `agent_id`='$agent_id', `company_id`='$company_id', `worker_fee`='$fee', 
                    `job_id`='$job_id', `date_added` = now()");
    $added = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        $added = true;
    }
}
?><h1>Add Job</h1>

<?php
if(isset($_POST["add_worker_submit"]))
{
    if($added){
?>
<div class="alert alert-success">Worker <b><?= $name;?></b> Added To Database <span class="close" data-dismiss='alert'>&times;</span></div>
<?php
              }else
    {
?>
<div class="alert alert-success">Worker <b><?= $name;?></b> Failed To add to Database</div>
<?php
    }
}

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="name" type="text" id="form-field-1" placeholder="Name" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Father Name <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="father_name" type="text" id="form-field-1" placeholder="Father Name" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Passport Number <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="passport_num" type="text" id="form-field-1" placeholder="Passport Number" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">CNIC Number <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="cnic_num" type="text" id="form-field-1" placeholder="CNIC Number" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Agent <span class='red'>*</span></label>
        <div class="col-sm-9">
            <select name="agent_id" id="">
                <option value="">--Agent--</option>
                <?= select_options("agent");?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="company_id"  id="add_worker-input_company" class="col-xs-10 col-sm-5" required>
                <option value="">--SELECT COMPANY--</option>
                <?= select_options("company");?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Job <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="job_id" id="add_worker-input_job" class="col-xs-10 col-sm-5" disabled required>
                <option value="">--SELECT JOB--</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fee <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="fee" type="text" id="form-field-1" placeholder="Fee" class="col-xs-10 col-sm-5" required>
        </div>
    </div>

    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <input name="add_worker_submit" type="submit" class="fa  btn btn-info" value="&#xf00c;Add">
        </div>
    </div>
</form>