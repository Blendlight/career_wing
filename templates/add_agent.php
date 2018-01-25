<?php
$cname = "";
if(isset($_POST["agent_name"]))
{
    $aname = $_POST["agent_name"];
    $cid = $_POST["company_id"];
    $query = $conx->query("INSERT INTO agent set agent_name='$aname', company_id='$cid'");
    $added = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        $added = true;
    }
}
?><h1>Add Agent</h1>
<?php
if(isset($_POST["agent_name"]))
{
    if($added){
?>
<div class="alert alert-success"><b><?= $aname;?></b> Added To Database</div>
<?php
              }else
    {
?>
<div class="alert alert-success"><b><?= $aname;?></b> Failed To add to Database</div>
<?php
    }
}

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST" id="company_add_form">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>
        <div class="col-sm-9">
            <input name="agent_name" type="text" id="form-field-1" placeholder="Agent Name" class="col-xs-10 col-sm-5">
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
            <button class="btn btn-info">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Add
            </button>
        </div>
    </div>
</form>