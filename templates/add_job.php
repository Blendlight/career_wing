<?php
$jname = "";
if(isset($_POST["add_job_submit"]))
{
    $job_title = $_POST["job_title"];
    $company_id = $_POST["company_id"];
    $query = $conx->query("INSERT INTO `job` SET `job_title`='$job_title', `company_id`='$company_id'");
    $added = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        $added = true;
    }
}
?><h1>Add Job</h1>
<?php
if(isset($_POST["add_job_submit"]))
{
    if($added){
?>
<div class="alert alert-success">Job <b><?= $job_title;?></b> Added To Database</div>
<?php
              }else
    {
?>
<div class="alert alert-success">Job <b><?= $job_title;?></b> Failed To add to Database</div>
<?php
    }
}

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title <span class='red'>*</span></label>
        <div class="col-sm-9">
            <input name="job_title" type="text" id="form-field-1" placeholder="Job Title" class="col-xs-10 col-sm-5" required>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="company_id" id="form-field-2" class="col-xs-10 col-sm-5" required>
               <option value="">--SELECT COMPANY--</option>
                <?= select_options("company");?>
            </select>
        </div>
    </div>
    
    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
           <input name="add_job_submit" type="submit" class="fa  btn btn-info" value="&#xf00c;Add">
        </div>
    </div>
</form>