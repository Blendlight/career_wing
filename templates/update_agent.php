<?php
$error = false;
$cname = "";
if(isset($_POST["agent_name"]))
{
    $aid = $_POST["aid"];
    $cid = $_POST["company_id"];
    $aname = $_POST["agent_name"];
    $query = $conx->query("UPDATE agent set agent_name='$aname', company_id='$cid' WHERE agent_id='$aid'");
    $updated = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        header("location: agents");
    }else
    {
        $error = true;
    }
}

if(isset($_GET["aid"]))
{
    $aid = $_GET["aid"];
}else
{
    header("location: agents");
}

$query = $conx->query("SELECT * FROM agent WHERE agent_id='$aid'");
if($query && $query->num_rows>0)
{
    $agents_data = $query->fetch_all(MYSQLI_ASSOC);
    $agent_data = $agents_data[0];
}else
{

}


?><h1>Update Agent</h1>
<?php
if(isset($_POST["agent_name"]))
{
    if($updated){
?>
<div class="alert alert-success">updated</div>
<?php
    }else
    {
?>
<div class="alert alert-danger">Failed To update</div>
<?php
    }
}



if($error)
{
    echo "<div class='alert alert-danger'>Content Not found of ID='$aid'</div>";
}else
{

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST" id="company_add_form">
    <input type="hidden" name="aid" value="<?= $aid;?>">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>
        <div class="col-sm-9">
            <input value="<?= $agent_data["agent_name"];?>" name="agent_name" type="text" id="form-field-1" placeholder="Agent Name" class="col-xs-10 col-sm-5">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company <span class="red">*</span></label>
        <div class="col-sm-9">
            <select name="company_id" id="form-field-2" class="col-xs-10 col-sm-5" required>
                <option value="">--SELECT COMPANY--</option>
                <?= select_options("company", $agent_data["company_id"]);?>
            </select>
        </div>
    </div>
    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info">
                <i class="ace-icon fa fa-check bigger-110"></i>
                update
            </button>
        </div>
    </div>
</form>
<?php
}

?>