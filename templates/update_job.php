<?php

$error = false;

$jname = "";
if(isset($_POST["update_job_submit"]))
{
    $jid = $_POST["jid"];
    $job_title = $_POST["job_title"];
    $company_id = $_POST["company_id"];
    $query = $conx->query("UPDATE JOB SET job_title='$job_title', company_id='$company_id' WHERE job_id='$jid'");
    $updateed = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        header("location: jobs");
    }
}


if(isset($_GET["jid"]))
{
    $jid = $_GET["jid"];
}else
{
    header("location: jobs");
}

$query = $conx->query("SELECT * FROM job WHERE job_id='$jid'");

if($query && $query->num_rows>0)
{
    $job_data = mysqli_fetch_array($query);

}else
{
    $error = true;   
}


?><h1>update Job</h1>
<?php
if(isset($_POST["update_job_submit"]))
{
    if($updateed){
?>
<div class="alert alert-success">Job <b><?= $job_title;?></b> updateed To Database</div>
<?php
                 }else
    {
?>
<div class="alert alert-danger">Job <b><?= $job_title;?></b> Failed To update to Database</div>
<?php
    }
}

if($error)
{
    echo '<div class="alert alert-danger">Job not found of ID=\''.$jid.'\'</div>';
}else
{
?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST">
    <input type="hidden" name="jid" value="<?= $jid;?>">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input value="<?= $job_data["job_title"];?>" name="job_title" type="text" id="form-field-1" placeholder="Job Title" class="col-xs-10 col-sm-5" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="company_id" id="form-field-2" class="col-xs-10 col-sm-5" required>
                <option value="">--SELECT COMPANY--</option>
                <?= select_options("company", $job_data["company_id"]);?>
            </select>
        </div>
    </div>

    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <input name="update_job_submit" type="submit" class="fa  btn btn-info" value="&#xf00c;update">
        </div>
    </div>
</form>
<?php
}

?>